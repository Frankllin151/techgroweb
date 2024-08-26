<?php 

session_start();

class Login {
  private $daoLogin;  // Propriedade declarada com "d" minúsculo

  public function __construct(daoLogin $daoLogin)
  {
      $this->daoLogin = $daoLogin;  // Propriedade usada com "d" minúsculo
  }

  public function authenticate($email, $password) {
    $user = $this->daoLogin->login($email, $password);
    
    if ($user) {
        // Aqui você pode iniciar uma sessão ou fazer outra lógica
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
 
        return true;
    } else {
        return false;
    }
}
}