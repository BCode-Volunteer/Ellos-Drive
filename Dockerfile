FROM ubuntu:latest AS build

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && \
    apt-get install -y php curl php-soap php-xml php-curl php-opcache php-gd && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');" && \
    apt-get install -y nodejs npm

COPY . .

EXPOSE 8000

RUN npm cache clean --force
RUN rm -rf node_modules

RUN composer install && \
    npm install && \
    php artisan key:generate && \
    php artisan jwt:secret && \
    php artisan migrate

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
