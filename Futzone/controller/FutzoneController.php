<?php 

require_once "./view/futzoneView.php";
//require_once "./model/noticiasModel.php";

class FutzoneController{
    private $view;
    private $model;

    function __construct(){
        $this->view = new FutzoneView();
        //$this->model = new noticiasModel();
    }

    function Home(){
        $this->view->Mostrar();
    }

    function Posiciones(){
        $this->view->Posiciones();
    }


    function Login(){
        $this->view->Login();
    }

    /*function InsertarNoticia(){
        $titulo = $_POST["tituloForm"];
        $descripcion = $_POST["descripcionForm"];
        $this->model->InsertarNoticia($titulo, $descripcion);
        header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . "/ligas");
    }

    function BorrarTarea($param){
        $this->model->BorrarTarea($param[0]);
        header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }

    function CompletarTarea($param){
        $this->model->CompletarTarea($param[0]);
        header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }*/
    
}







?>