<?php

require_once  "./view/LoginView.php";
require_once  "./model/UsuarioModel.php";

class LoginController{

    private $view;
    private $model;

    function __construct()
    {
      $this->view = new LoginView();
      $this->model = new UsuarioModel();
    }

    function MostrarLogin(){
        //$hash = password_hash('contraseña2', PASSWORD_DEFAULT);
        $this->view->MostrarLogin();
    }

    function Logout(){
      session_start();
      session_destroy();
      header(LOGIN);
    }
  
    function VerificarLogin(){
        $usuario = $_POST["usuarioId"];
        $pass = $_POST["passwordId"];
        
        $dbUsuario = $this->model->GetUsuario($usuario);

        if($dbUsuario != null){
            if (password_verify($pass, $dbUsuario[0]["clave"])){
                session_start();
                $_SESSION["User"] = $usuario;
                header(NOTICIAS);
            }else{
                $this->view->MostrarLogin("Contraseña incorrecta");
            }
        }else{
            $this->view->MostrarLogin("No existe el usario");
        }
    }

    function VerificarLoginAdmin(){
        $usuario = $_POST["usuarioId"];
        $pass = $_POST["passwordId"];
        
        $dbUsuario = $this->model->GetUsuario($usuario);
            
        if($dbUsuario != null){
            if (password_verify($pass, $dbUsuario[0]["clave"])){
                if($dbUsuario[0]["admin"] != null){
                    session_start();
                    $_SESSION["User"] = $usuario;
                    header(ADMIN);
                }else{
                    $this->view->MostrarLogin("No eres administrador");
                }
            }else{
                $this->view->MostrarLogin("Contraseña incorrecta");
            }
        }else{
            $this->view->MostrarLogin("No existe el usario");
        }
        

    }
    
    function AddUsuario(){
        $usuario = $_POST["usuarioId"];
        $email = $_POST["emailId"];
        $pass = $_POST["passwordId"];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $this->model->AddUsuario($usuario,$email,$hash);
        $this->view->MostrarLogin("Cargado correctamente");
    }

    function MostrarRegistro(){
        $this->view->MostrarRegistro();
    }
  
}

?>