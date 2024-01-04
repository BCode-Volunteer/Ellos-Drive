<!DOCTYPE html>
<!-- Criado por Daniel Rodrigues - daniel-rodrigues.onrender.com -->
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ellos Drive - Login</title>

    <!-- CSS -->
    <link href="css/login-register.css" rel="stylesheet" type="text/css" />


    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    
    <div class="container">
      <header>Ellos Drive</header>
      @isset($errorMessage)
        <div class="error-message">
              <p>{{ $errorMessage }}</p>
        </div>
      @endisset 
      <form method="POST" action='/login'>
        @csrf
        <div class="field email-field">
          <div class="input-field">
            <input type="email" placeholder="Digite seu email" class="email" name="email"/>
          </div>
          <span class="error email-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">Por favor, insira um email válido</p>
          </span>
        </div>
        <div class="field create-password">
          <div class="input-field">
            <input
              type="password"
              placeholder="Digite sua senha"
              class="password"
              name="password"
            />
            <i class="bx bx-hide show-hide"></i>
          </div>
          <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
              Por favor, insira sua senha.
            </p>
          </span>
        </div>
        <div class="input-field button">
          <input type="submit" value="Login" />
        </div>
      </form>
    </div>

    <!-- JavaScript -->
    <script src="js/login-register.js"></script>
  </body>
</html>
