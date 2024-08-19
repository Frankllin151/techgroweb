<?php 
print_r($_POST);

$titulo = filter_var($_POST["titulo"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$conteudo = filter_var($_POST["conteudo"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);