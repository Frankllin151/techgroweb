<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/base.css">
  <title>Login >> TechgroWeb</title>
  <style>
  body {
    background: var(--gradient);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .login-container {
    background: #fff;
    padding: 40px;
    margin: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
  }

  .login-container h1 {
    margin-bottom: 20px;
    color: var(--blue-dark);
  }

  .login-container form label {
    display: block;
    text-align: left;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .login-container form input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid var(--blue-lightA);
    border-radius: 5px;
    font-size: 14px;
    color: var(--blue-darklight);
  }

  .login-container form button {
    width: 100%;
    padding: 10px;
    background: var(--green);
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

  .login-container form button:hover {
    background: var(--green);
  }

  .forgot-password {
    margin-top: 15px;
    display: block;
    color: var(--blue-secondary);
  }

  .forgot-password:hover {
    text-decoration: underline;
  }
  </style>
</head>

<body>
  <div class="login-container">
    <h1>Login</h1>
    <form action="dashboard.html" method="POST">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" placeholder="Digite sua senha" required>

      <button type="submit">Entrar</button>
    </form>
    <a href="esqueci-minha-senha.html" class="forgot-password">Esqueci minha senha</a>
  </div>
</body>

</html>