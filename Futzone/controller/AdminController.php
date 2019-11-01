<?php

require_once  "./view/AdminView.php";
require_once  "./model/LigasModel.php";
require_once  "./model/NoticiasModel.php";
require_once  "./controller/SecuredController.php";
//require_once  "SecuredController.php";

class AdminController extends SecuredController
{
  
private $view;
private $model;

function __construct()
{
    parent::__construct();

    $this->view = new AdminView();
    $this->modelLigas = new LigasModel();
    $this->modelNoticias = new NoticiasModel();
}

function MostrarAdmin(){
    $ligas = $this->modelLigas->GetLigas(); 
    $this->view->MostrarAdmin($ligas);
}

function AgregarLiga(){
    $liga = $_POST["ligaId"];
    $pais = $_POST["paisId"];
    $this->modelLigas->AgregarLiga($liga,$pais);
    $this->MostrarAdmin();
}
  
/*function EditarLiga(){
    $nombre = $_POST["nombreId"];
    $pais = $_POST["paisId"];
    $idliga = $_POST["Id"];

    $this->modelLigas->EditarLiga($nombre,$pais,$idliga);
    $this->MostrarAdmin();
}*/
}

 ?>