# Ellos Drive

Sistema de login.

### Pré-requisitos:

- [PHP 8.1](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/)
- [NPM](https://www.npmjs.com/)

### Configuração:

1. Clone o repositório

```bash
git clone https://github.com/BCode-Volunteer/Ellos-Drive
```

2. Instale as dependências do PHP

```bash
    composer install
```

3. Instale as dependências do Node.js

```bash
    npm install
```

4. Copie o arquivo .env.example para .env

```bash
    cp .env.example .env
```

5. Gere uma nova chave para a aplicação

```bash
    php artisan key:generate
```

6. Gerar chave para JWT

```bash
    php artisan jwt:secret
```

8. Crie o banco de dados

```bash
    php artisan migrate
```

7. Inicie o servidor

```bash
    php artisan serve
```
