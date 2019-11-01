<?php

require_once  "./view/NoticiasView.php";
require_once  "./model/NoticiasModel.php";
require_once  "./model/LigasModel.php";

class NoticiasController{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new NoticiasView();
        $this->modelNoticias = new NoticiasModel();
        $this->modelLigas = new LigasModel();
    }

    function IsUserLogged(){
        session_start();
        return isset($_SESSION["User"]);
    }

    function MostrarNoticias(){
        $noticias = $this->modelNoticias->GetNoticias();
        $ligas = $this->modelLigas->GetLigas();
        $usuario = $this->IsUserLogged();
        $this->view->MostrarNoticias($noticias,$ligas,$usuario);
    }

    function AddNoticia(){
        $titulo = $_POST["tituloId"];
        $descripcion = $_POST["descripcionId"];
        $fecha = $_POST["fechaId"];
        $liga = $_POST["ligaId"];

        $this->modelNoticias->AddNoticia($titulo,$descripcion,$fecha,$liga);
        $this->MostrarNoticias();
    }

    function BorrarNoticia($idnoticia){
        $this->modelNoticias->BorrarNoticia($idnoticia);
        $this->MostrarNoticias();
    }

    function MostrarEditar($idnoticia){
        $noticia = $this->modelNoticias->GetNoticia($idnoticia);
        $this->view->MostrarEditar($noticia);
    }

    function EditarNoticia(){
        $titulo = $_POST["tituloId"];
        $descripcion = $_POST["descripcionId"];
        $fecha = $_POST["fechaId"];
        $liga = $_POST["ligaId"];
        $idnoticia = $_POST["Id"];
    
        $this->modelNoticias->EditarNoticia($titulo,$descripcion,$fecha,$liga,$idnoticia);
        $this->MostrarNoticias();
    }

}
?>