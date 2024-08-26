<div class="blog-panel">
  <a class="todosblog" href="painel.php?comp=todosBlog">Ver todos blog</a> <br>
  <?php if (isset($_GET["mensagem"])): ?>
  <?php if ($_GET["mensagem"] === 'sucesso'): ?>
  <h6 class="mensagemsucesso-blog">Publicação enviada com sucesso</h6>
  <?php elseif ($_GET["mensagem"] === 'erro'): ?>
  <h6 class="mensagemerror-blog">Publicação não enviada</h6>
  <?php endif; ?>
  <?php endif; ?>
  <h3>Criar Postagem no Blog</h3>
  <form action="/action/action-blog.php" method="POST">
    <label for="titulo">Título da Postagem:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Digite o título do blog" required>

    <label for="conteudo">Conteúdo da Postagem (use "/" para separar parágrafos e
      "(**)" para destacar palavras):</label>
    <textarea id="conteudo" name="conteudo" rows="6" placeholder="Digite seu conteúdo aqui..." required></textarea>

    <input type="submit" value="Publicar Postagem">
  </form>

  <div class="preview">
    <h3>Pré-visualização:</h3>
    <div id="preview-content"></div>
  </div>
</div>