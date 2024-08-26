<?php 
require_once __DIR__.'/../daomysql/daoBlog.php';

if(!isset($_GET["id"])){
  
  echo "Erro no sistema";

}
$id = $_GET["id"];
$blogmysql = new Blogmysql($pdo);
$post  = $blogmysql->findById($id);

?>

<div class="blog-panel">
  <a class="todosblog" href="painel.php?comp=todosBlog">Ver todos blog</a> <br>
  <?php if (isset($_GET["mensagem"])): ?>
  <?php if ($_GET["mensagem"] === 'sucesso'): ?>
  <h6 class="mensagemsucesso-blog">Publicação Atualizada</h6>
  <?php elseif ($_GET["mensagem"] === 'erro'): ?>
  <h6 class="mensagemerror-blog">Publicação não Atualizada</h6>
  <?php endif; ?>
  <?php endif; ?>
  <h3>Criar Postagem no Blog</h3>
  <form action="/action/action-blog-editar.php" method="POST">
    <input type="hidden" value="<?= $post->getId(); ?>" name="paramentroid">
    <label for="titulo">Título da Postagem:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Digite o título do blog" required
      value="<?= $post->getTitle(); ?>">

    <label for="conteudo">Conteúdo da Postagem (use "/" para separar parágrafos e
      "(**)" para destacar palavras):</label>
    <textarea id="conteudo" name="conteudo" rows="6" placeholder="Digite seu conteúdo aqui..." required>
    <?= $post->getEditarConteudo(); ?>
  </textarea>

    <input type="submit" value="Publicar Postagem">
  </form>

  <div class="preview">
    <h3>Pré-visualização:</h3>
    <div id="preview-content"></div>
  </div>
</div>