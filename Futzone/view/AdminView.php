<?php

require_once ('libs/Smarty.class.php');

class AdminView{
    private $Smarty;

    function __construct()
    {
        $this->Smarty = new Smarty();
    }

    function MostrarAdmin($ligas){
        $this->Smarty->assign('ligas',$ligas);
        $this->Smarty->display('templates/admin.tpl');
    }

}

?>
