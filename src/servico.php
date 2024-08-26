<?php
// servico.php

// Inclui o arquivo com os dados dos serviços
include './data.php';

// Verifica se o parâmetro 'typeservice' foi passado na URL
if (isset($_GET['typeservice'])) {
    $typeService = $_GET['typeservice'];

    // Verifica se o serviço existe no array de serviços
    if (array_key_exists($typeService, $services)) {
        $service = $services[$typeService];
    } else {
        // Serviço não encontrado, exibe uma mensagem de erro
        $service = [
            'title' => 'Serviço não encontrado',
            'content' => 'O serviço solicitado não foi encontrado. Por favor, verifique o URL e tente novamente.'
        ];
    }
} else {
    // Nenhum serviço especificado, exibe uma mensagem padrão
    $service = [
        'title' => 'Serviço',
        'content' => 'Por favor, selecione um serviço para visualizar mais detalhes.'
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechgroWeb >> <?php echo $service['title']; ?></title>
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/footer.css">
  <link rel="stylesheet" href="./assets/css/servico.css">
</head>

<body>
  <?php require "./componentes/header.php";?>
  <!---conteudo serviço -->
  <section>
    <div class="conteudo-sv-pg">
      <div class="centro-sv">
        <h3><?php echo $service['title']; ?></h3>
      </div>
      <div class="text-cont-sv">
        <p><?php echo $service['content']; ?></p>
      </div>
      <div class="buton-whtsap-sv-cn">
        <button><a
            href="https://api.whatsapp.com/send?phone=5584986044130&text=Ol%C3%A1%2C%20Gostaria%20de%20saber%20mais%20sobre%20os%20servi%C3%A7os%20da%20TechGroWeb">Fale
            com um especialista <i class="bi bi-whatsapp"></i></a> </button>
      </div>
    </div>

  </section>
  <!---conteudo serviço end-->
  <?php require "./componentes/footer.php"; ?>
</body>

</html>