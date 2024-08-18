<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechgroWeb >> Contato</title>
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/footer.css">
  <link rel="stylesheet" href="./assets/css/pagecontato.css">
  <link rel="stylesheet" href="./assets/css/servico.css">
</head>

<body>
  <?php require "./componentes/header.php";?>
  <!---Contato Solicite--->
  <section>

    <div class="container-contato">
      <div class="text-title">
        <h3>Solicite contato</h3>
      </div>
      <div class="layout-flex">
        <div class="content-ctn">
          <div class="card-ctn">
            <div class="title-cn">
              <h5>Entre em Contato</h5>
            </div>
            <p>Deixe sua dúvida, que entraremos em contato</p>
            <div class="rede-cn">
              <span><i class="bi bi-telephone-fill"></i> ++55 (84) 986044130 </span>
              <span><i class="bi bi-envelope-fill"></i> frankllinszcontato@gmail.com</span>
            </div> <br>
            <a href="https://api.whatsapp.com/send?phone=5584986044130&text=Ol%C3%A1%2C%20Gostaria%20de%20saber%20mais%20sobre%20os%20servi%C3%A7os%20da%20TechGroWeb
" class="link-action-wtp">Chamar no Whatsapp <i class="bi bi-whatsapp"></i></a>
          </div>
        </div>
        <div class="content-ctn">
          <form class="form-contato" action="" method="post">
            <input type="text" placeholder="Nome" name="nome" id="nome">
            <input type="email" placeholder="Email" name="email" id="email">
            <input type="tel" placeholder="Telefone" name="telefone" id="telefone">
            <select name="opcao" id="opcao" placeholder="">
              <option value="d">Como prefere ser contatado?</option>
              <option value="Whatsapp">Whatsapp</option>
              <option value="Email">Email</option>
              <option value="Telefone">Telefone</option>
            </select>
            <textarea name="text" id="text"></textarea>
            <button type="submit" value="Enviar">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!---Contato Solicite end--->
  <?php require "./componentes/servico.php"; ?>

  <?php require "./componentes/footer.php"; ?>
</body>

</html>