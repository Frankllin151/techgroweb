<div class="email-panel">
  <h3>Enviar E-mails</h3>
  <form action="/action/action-crm.php" method="POST">
    <label for="emails">Lista de E-mails (separados por vírgula):</label>
    <input type="text" id="emails" name="emails" placeholder="exemplo@dominio.com, exemplo2@dominio.com" required>
    <label for="assunto">Assunto:</label>
    <input type="text" name="assunto" placeholder="assunto">

    <label for="mensagem">Mensagem:</label>
    <textarea id="mensagem" name="mensagem" rows="2" placeholder="Digite sua mensagem aqui..." required></textarea>

    <input type="submit" value="Enviar Mensagens">
  </form>
</div>