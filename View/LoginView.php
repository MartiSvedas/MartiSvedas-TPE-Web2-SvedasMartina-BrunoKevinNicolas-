<?php
require_once './libs/smarty-3.1.39/smarty/libs/Smarty.class.php';
 
class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
    
    function showLogin($message = ""){
        $this->smarty->assign('titulo','Iniciar Sesion');
        $this->smarty->assign('message',$message);
        $this->smarty->display('templates/login.tpl');
    }

    function ShowRegister(){
        $this->smarty->assign('titulo','Registrate');
        $this->smarty->display('templates/register.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."books");
    }

    function viewUsers($users){
        $this->smarty->assign('titulo','Usuarios Registrados');
        $this->smarty->assign('users',$users);
        $this->smarty->display('templates/adminView.tpl');
    }

    function ShowAdminLocation(){
        header("Location: ".BASE_URL."users");
    }
}