<?php 
require "../CONFIG.php";
require "../daomysql/daoBlog.php";

$titulo = filter_var($_POST["titulo"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$conteudo = filter_var($_POST["conteudo"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$date = new DateTime();

// Substituindo / por </p><p> para separar parágrafos
$conteudo = str_replace('/', '</p><p>', $conteudo);

// Substituindo (**texto**) por <span>texto</span>
$conteudo = preg_replace('/\(\*(.*?)\*\)/', '<span>$1</span>', $conteudo);
$conteudo = '<p>' . $conteudo . '</p>';


// Cria uma instância do objeto Blog
$blog = new Blog();
$blog->setTitle($titulo);
$blog->setConteudo($conteudo);
$blog->setdatetime($date->format('Y-m-d H:i:s'));

// Instancia o objeto de acesso ao banco de dados
$blogDao = new Blogmysql($pdo);

// Salva o blog no banco de dados
if($blogDao->save($blog)){
 header("Location: " . URL . "painel.php?comp=blog&mensagem=sucesso");
} 
else{
  header("Location: " . URL . "painel.php?comp=blog&mensagem=erro");
}