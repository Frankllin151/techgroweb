<?php

use Dotenv\Dotenv;

require __DIR__."/vendor/autoload.php";

session_status();
define("CONFIG" , "http://localhost:8080/");

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}