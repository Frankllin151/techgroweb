<?php 

require "../CONFIG.PHP";
require "../daomysql/daoLogin.php";
require "../model/Login-m.php";

$daologin = new daoLogin($pdo);
$login = new Login($daologin);

$email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  header("Location: ". URL . "login.php?error=invalid_email");
  exit;
}
$password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($login->authenticate($email, $password)) {
 header("Location: " .URL . "painel.php");
 
 exit;
} else {
 // echo "Email ou senha incorretos.";
}