<?php
require_once __DIR__.'/../daomysql/daoBlog.php';
$dao = new Blogmysql($pdo); 
$blogs = $dao->findAll();
?>
<style>
table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  background-color: #ffffff;
}

table th,
table td {
  padding: 12px 15px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: left;
}

table th {
  background-color: var(--blue-primary);
  color: #ffffff;
}

table td {
  color: var(--blue-darklight);
}

.action-icons {
  display: flex;
  gap: 10px;
}

.action-icons i {
  cursor: pointer;
  font-size: 1.2em;
}



.edit-icon {
  color: var(--blue-secondary);
}

.delete-icon {
  color: red;
}
</style>
<?php if (isset($_GET["mensagem"])): ?>
<?php if ($_GET["mensagem"] === 'deletado'): ?>
<h6 class="mensagemsucesso-blog">Deletado com sucesso</h6>
<?php elseif ($_GET["mensagem"] === 'erro'): ?>
<h6 class="mensagemerror-blog">Não Deletado</h6>
<?php endif; ?>
<?php endif; ?>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Data e Hora</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blogs as $blog): ?>
    <tr>
      <td><?php echo htmlspecialchars($blog->getId()); ?></td>
      <td><?php echo htmlspecialchars($blog->getTitle()); ?></td>
      <td><?php echo date('d/m/Y H:i', strtotime($blog->getDatime())); ?></td>
      <td>
        <div class="action-icons">
          <a href="painel.php?comp=edita-blog&id=<?= $blog->getId(); ?>"> <i
              class="bi bi-pencil-square edit-icon"></i></a>
          <a href="/action/action-delete-blog.php?id=<?= $blog->getId(); ?>"> <i
              class="bi bi-x-circle delete-icon"></i></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>