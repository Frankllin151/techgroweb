<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esqueci Minha Senha >> TechgroWeb</title>
  <link rel="stylesheet" href="./assets/css/base.css">
  <style>
  body {
    background: var(--gradient);
    color: var(--blue-darklight);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .forgot-password-container {
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
  }

  .forgot-password-container h1 {
    margin-bottom: 20px;
    color: var(--blue-dark);
  }

  .forgot-password-container p {
    margin-bottom: 20px;
    color: var(--blue-darklight);
  }

  .forgot-password-container form label {
    display: block;
    text-align: left;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .forgot-password-container form input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid var(--blue-lightA);
    border-radius: 5px;
    font-size: 14px;
    color: var(--blue-darklight);
  }

  .forgot-password-container form button {
    width: 100%;
    padding: 10px;
    background: var(--green);
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

  .forgot-password-container form button:hover {
    background: var(--green);
  }

  .back-to-login {
    margin-top: 15px;
    display: block;
    color: var(--blue-secondary);
  }

  .back-to-login:hover {
    text-decoration: underline;
  }
  </style>
</head>

<body>
  <div class="forgot-password-container">
    <h1>Esqueci Minha Senha</h1>
    <p>Por favor, insira seu e-mail para redefinir sua senha.</p>
    <form action="reset-password.html" method="POST">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

      <button type="submit">Redefinir Senha</button>
    </form>
    <a href="login.html" class="back-to-login">Voltar para o login</a>
  </div>
</body>

</html>