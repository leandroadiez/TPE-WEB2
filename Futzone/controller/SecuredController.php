<?php

class SecuredController
{
  function __construct(){
    session_start();
    if(isset($_SESSION["User"])){
      if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
        $this->logout(); // destruye la sesión, y vuelve al login
      }
        $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
    }else{
        header(LOGIN);
    }
  }

  function logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }

  function IsUserLogged(){
    return isset($_SESSION["User"]);
  }

}

 ?>
