<?php 

class Blog{
  private $id;
  private $title;
  private $conteudo;
  private $datetime;
   // Getters
 public function getId(): int
 {
  return $this->id;
 }
 public function getTitle(): string
 {
  return html_entity_decode($this->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
 }

 public function getConteudo(): string
 {
  return html_entity_decode($this->conteudo, ENT_QUOTES | ENT_HTML5, 'UTF-8');
 }
 public function getEditarConteudo()
 {
   // Reverter </p><p> para "/"
   $conteudoRevertido = str_replace('</p><p>', '/', $this->conteudo);
        
   // Reverter <span>texto</span> para (**texto**)
   $conteudoRevertido = preg_replace('/<span>(.*?)<\/span>/', '(**$1**)', $conteudoRevertido);
   
   // Remover tags <p> ao redor do conteúdo, se necessário
   $conteudoRevertido = preg_replace('/^<p>|<\/p>$/', '', $conteudoRevertido);

   return $conteudoRevertido;
 }
 public function getDatime(): string 
 {
  return $this->datetime;
 }
 // Setters
 public function setId(int $id): void {
  $this->id = $id;
}

public function setTitle(string $title): void
{
 $this->title = $title;
}
public function setConteudo(string $conteudo): void {
 $this->conteudo = $conteudo;
}

public function setdatetime(string $datetime): void 
{
  $this->datetime = $datetime;
}

}
interface DaoBlog{
  public function save(Blog $blog): bool;
  public function delete(int $id): bool;
  public function edit(int $id, Blog $blog): bool; // Modificar assinatura
  public function findById(int $id): ?Blog; // Modificar retorno
  public function findAll(): array;
}