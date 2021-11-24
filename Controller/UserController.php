
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

function register(){
    $this->view->ShowRegister();
}

function registerUser(){
    $user = $_POST["user"];
    $hash = $_POST["password"];
    if (!(empty($user)) && !(empty($hash))) {
        $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $this->model->registerUser($user,$hash);
        $this->view->ShowHomeLocation();
        $userFromDB = $this->model->getUser($user);
        $this->authHelper->login($userFromDB);

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
        $_SESSION["ID_USER"] = $userFromDB->id;
        $_SESSION["ADMIN"] = $userFromDB->admin;

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

function showUsers(){
    $this->authHelper->checkAdminLogged();
    $users=$this->model->getUsers();
    $this->view->viewUsers($users);

}

function deleteUser($params=''){
    $this->authHelper->checkAdminLogged();
    $id_user = $params[':ID'];
    $this->model->deleteUser($id_user);
    $this->view->ShowAdminLocation();

}

function editAdmin(){
    $this->authHelper->checkAdminLogged();
    $admin = $_POST['input_admin'];
    $id = $_POST['input_id'];
    $this->model->updateAdmin($admin,$id);
    $this->view->ShowAdminLocation();
}
 

}


?>