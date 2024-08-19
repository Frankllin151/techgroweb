<?php 
require "../CONFIG.PHP";

$email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  header("Location: ". CONFIG . "login.php?error=invalid_email");
  exit;
}

$password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);