<?php session_start(); ?>
<?php
    

    require "./CONFIG.php"; 
    if(!isset($_SESSION['user_id'])){
      header("Location: " . URL . "login.php");
      exit;
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechgroWeb >> Painel</title>
  <link rel="stylesheet" href="./assets/css/painel.css">
</head>

<body>
  <header class="header-painel">
    <h1>TechgroWeb - Painel de Controle</h1>
  </header>

  <section>
    <div class="sidebar">
      <nav>
        <ul>
          <li><a href="painel.php">Dashboard</a></li>
          <li><a href="painel.php?comp=blog">Blog</a></li>
          <li><a href="painel.php?comp=crm">CRM</a></li>
          <li><a href="#">Portfólio</a></li>
          <li><a href="#">Configurações</a></li>
          <li><a href="#">Relatórios</a></li>
          <li><a href="#">Sair</a></li>
        </ul>
      </nav>
    </div>

    <div class="main-content">

      <h2>Bem-vindo ao Painel</h2>
      <p>Aqui você pode gerenciar todas as funcionalidades da plataforma.</p>
      <?php
      if(isset($_GET["comp"])){
        $componente = $_GET['comp'];
        if($componente === "blog"){
          require "./componentes/blog-painel.php";
        }
        if($componente === "crm"){
          require "./componentes/email-crm.php";
        }
      }
      ?>


    </div>
  </section>

  <footer class="footer-painel">
    <p>&copy; 2024 TechgroWeb. Todos os direitos reservados.</p>
  </footer>
</body>

</html>