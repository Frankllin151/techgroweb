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
  return $this->title;
 }

 public function getConteudo(): string
 {
  return $this->conteudo;
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