<?php 
require "../CONFIG.php";
require "../daomysql/daoBlog.php";

if(!isset($_GET["id"])){
  
}

$id = $_GET["id"];


$blog = new Blogmysql($pdo);

if($blog->delete($id)){
  header("Location: " . URL . "painel.php?comp=todosBlog&mensagem=deletado"); 
} else{
  header("Location: " . URL . "painel.php?comp=todosBlog&mensagem=erro");
}