<?php
require('libs/Smarty.class.php');


class futzoneView{

    function Mostrar(){
        $smarty = new Smarty();
        $smarty->display('templates/home.tpl');
    }
    function Posiciones(){
        $smarty = new Smarty();
        $smarty->display('templates/posiciones.tpl');
    }
    function Noticias(){
        $smarty = new Smarty();
        $smarty->display('templates/noticias.tpl');
    }
    function Login(){
        $smarty = new Smarty();
        $smarty->display('templates/login.tpl');
    }
    
}
?>