
<?php

require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/authHelper.php";



class UserController{

private $view;
private $model;
private $authHelper;


function __construct(){
    $this->model = new UserModel();
    $this->view = new LoginView();
    $this->authHelper = new AuthHelper();


}

function login(){
    $this->view->showLogin();   
}

function Register(){
    $this->view->ShowRegister();
}

function registerUser(){
    $user = $_POST["user"];
    $hash = $_POST["password"];
    if (!(empty($user)) && !(empty($hash))) {
        $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $this->model->registerUser($user,$hash);
        $this->view->ShowLogin("Cuenta creada con éxito");

    }else
        $this->view->showLogin("Faltan datos");
} 


function verifyUser(){
    $user = $_POST['user'];
    $password = $_POST['password'];
    if (!empty($user) && !empty($password)) {
 
        $userFromDB = $this->model->getUser($user);

        if ($userFromDB && password_verify($password, $userFromDB->password)) {

        session_start();
        $_SESSION["USER"] = $userFromDB->usuario; 

            $this->view->ShowHomeLocation();

        } else {
            $this->view->showLogin("Acceso denegado");
        }
    }
}

function logout(){
    session_start();
    session_destroy();
    $this->view->showLogin("Cerraste sesion");

}
 

}


?>