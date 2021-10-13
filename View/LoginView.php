<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
 
class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
    
    function showLogin($message = ""){
        $smarty = new Smarty();
        $smarty->assign('titulo','Iniciar Sesion');
        $smarty->assign('message',$message);
        $smarty->display('templates/login.tpl');
    }

    function ShowRegister(){
        $smarty = new Smarty();
        $smarty->assign('titulo','Registrate');
        $smarty->display('templates/register.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}