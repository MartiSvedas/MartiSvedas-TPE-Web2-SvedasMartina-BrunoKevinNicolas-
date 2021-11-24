<?php

class AuthHelper{

    function __construct(){

    }
    function login($user){
        session_start();
        $_SESSION['ID_USER'] =$user->id;
        $_SESSION['EMAIL'] = $user->usuario;
        $_SESSION['ADMIN'] = $user->admin;
    }
    
    function checkLoggedIn(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header("Location: ".BASE_URL."login");
            die();
        }
    }
    function checkAdminLogged(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if(!isset($_SESSION['ADMIN'])){
            header("Location: ".BASE_URL."books");
            die();
        }
    }
       
    function checkUser(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if(isset($_SESSION["USER"])){
            return true;
        }else
        {
            return false;
        }
    }

    function checkAdmin(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if(isset($_SESSION["ADMIN"])){
            if(($_SESSION["ADMIN"]==0) ||$_SESSION["ADMIN"]==null){
                return false;
            }
            else{
                return true;
            }
        }

    }

    function getUserId(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if(!empty($_SESSION['ID_USER'])){
            return $_SESSION['ID_USER'];
        }
        else{
            return NULL;
        }
    }

    


}
