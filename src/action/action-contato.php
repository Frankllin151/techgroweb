<?php 
require "../CONFIG.php";

$nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$opcao = filter_var($_POST['opcao'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$texto = filter_var($_POST['text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


 // Verificar se o email é válido
 if ($email === false) {
  echo "O endereço de email fornecido é inválido.";
  exit;
}

   // Montar o conteúdo do email
   $to = 'contato@techgroweb.shop';
   $subject = 'Novo contato através do formulário';
   $message = "Nome: $nome\n";
   $message .= "Email: $email\n";
   $message .= "Telefone: $telefone\n";
   $message .= "Opção de contato: $opcao\n";
   $message .= "Mensagem:\n$texto\n";
   $headers = "From: $email";

    // Enviar o email
    if (mail($to, $subject, $message, $headers)) {
      header("Location: " . URL . "paginacontato.php?mensagem=sucesso");
  } else {
    header("Location: " . URL . "paginacontato.php?mensagem=error");
  }