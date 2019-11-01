<?php

require_once ('libs/Smarty.class.php');

class NoticiasView{
    private $Smarty;

    function __construct()
    {
        $this->Smarty = new Smarty();
    }

    function MostrarNoticias($noticias,$ligas,$usuario){

        $this->Smarty->assign('noticias',$noticias);
        $this->Smarty->assign('ligas',$ligas);
        $this->Smarty->assign('logueado',$usuario);
        $this->Smarty->display('templates/noticias.tpl');
    }

    function MostrarEditar($noticia){

        $this->Smarty->assign('noticias',$noticia);
        $this->Smarty->display('templates/editar.tpl');
    }



}

?>
