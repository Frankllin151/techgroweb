<?php 
require "../CONFIG.PHP";

class daoLogin{
  private $pdo;
  
  public function __construct($pdo)
  {
     $this->pdo = $pdo;
  }
  public function login($email,$password)
  {
    $query = "SELECT * FROM admin WHERE email = :email LIMIT 1";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user["password"])){
      return $user;
    }
    else{
      return false;
    }
  }
}