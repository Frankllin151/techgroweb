<?php 
require __DIR__."/../model/Blog-m.php";

class Blogmysql implements DaoBlog {
  private $pdo;

  // Constructor to initialize the PDO connection
  public function __construct(PDO $pdo) {
      $this->pdo = $pdo;
  }

  public function save(Blog $blog): bool {
    $sql = "INSERT INTO blog (titulo, conteudo, datetime) VALUES (:titulo, :conteudo, :datetime)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':titulo', $blog->getTitle());   // Corrigido de :title para :titulo
    $stmt->bindValue(':conteudo', $blog->getConteudo());
    $stmt->bindValue(':datetime', $blog->getDatime());
    return $stmt->execute();
}

  public function delete(int $id): bool {
      $sql = "DELETE FROM blog WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      return $stmt->execute();
  }

  public function edit(int $id, Blog $blog): bool {
      $sql = "UPDATE blog SET title = :title, conteudo = :conteudo, datetime = :datetime WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':title', $blog->getTitle());
      $stmt->bindValue(':conteudo', $blog->getConteudo());
      $stmt->bindValue(':datetime', $blog->getDatime());
      $stmt->bindValue(':id', $id);
      return $stmt->execute();
  }

  public function findById(int $id): ?Blog {
      $sql = "SELECT * FROM blog WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if ($result) {
          $blog = new Blog();
          $blog->setTitle($result['title']);
          $blog->setConteudo($result['conteudo']);
          $blog->setDatetime($result['datetime']);
          return $blog;
      }
      return null;
  }

  public function findAll(): array {
      $sql = "SELECT * FROM blog";
      $stmt = $this->pdo->query($sql);
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $blogs = [];

      foreach ($results as $row) {
          $blog = new Blog();
          $blog->setTitle($row['titulo']);
          $blog->setConteudo($row['conteudo']);
          $blog->setDatetime($row['datetime']);
          $blog->setId($row["id"]);
          $blogs[] = $blog;
      }

      return $blogs;
  }
}