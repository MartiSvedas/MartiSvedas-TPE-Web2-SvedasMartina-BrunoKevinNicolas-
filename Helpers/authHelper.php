<?php

class AuthHelper{

    function __construct(){

    }
  
    function checkLoggedIn(){
        if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
        if (!isset($_SESSION['USER'])) {
            header("Location: ".BASE_URL."login");
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

    


}
