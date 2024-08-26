<?php
require __DIR__."/CONFIG.php";
require __DIR__."/daomysql/daoBlog.php";

if(!$_GET["id"]){
echo "id não existem";
}
$id = $_GET["id"];
$blog = new Blogmysql($pdo);

$PostUnico = $blog->findById($id);


// Supondo que $PostUnico->getDatime() retorna uma string de data no formato 'Y-m-d H:i:s'
$data = new DateTime($PostUnico->getDatime());

// Definir um array com os nomes dos meses em português
$meses = [
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
];

// Obter o dia, mês e ano
$dia = $data->format('d');
$mes = $data->format('n'); // 'n' para obter o número do mês sem zero à esquerda
$ano = $data->format('Y');

// Formatar a data
$dataFormatada = "{$dia} de {$meses[$mes]} de {$ano}";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechgroWeb >> Blog</title>
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/footer.css">
  <link rel="stylesheet" href="./assets/css/blog.css">

</head>

<body>
  <?php require "./componentes/header.php";?>
  <!---blog conteudo-->
  <section class="blog-content">
    <div class="post">
      <h1 class="post-title">
        <?= $PostUnico->getTitle(); ?>
      </h1>
      <p class="post-date">
        Publicado em:
        <?= $dataFormatada;
        ?>
      </p>
      <div class="post-image-author">

      </div>
      <div class="post-text">
        <?= $PostUnico->getConteudo(); ?>
      </div>

    </div>
    <div class="buton-whtsap-blog">
      <button><a
          href="https://api.whatsapp.com/send?phone=5584986044130&text=Ol%C3%A1%2C%20Gostaria%20de%20saber%20mais%20sobre%20os%20servi%C3%A7os%20da%20TechGroWeb">Fale
          com um especialista <i class="bi bi-whatsapp"></i></a> </button>
    </div>
  </section>

  <!---blog conteudo end-->
  <?php require "./componentes/footer.php"; ?>
</body>

</html>