<?php
 ini_set("display_errors", "1");
 error_reporting(E_ALL);

require_once './libs/smarty-3.1.39/Router.php';
require_once './Controller/BooksController.php';
require_once './Controller/AuthorsController.php';
require_once './Controller/UserController.php';

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$r= new Router;

$r ->addRoute("books","GET","BooksController","Home");
$r->addRoute("authors", "GET", "AuthorsController", "authors");

$r ->addRoute("showBook/:ID","GET","BooksController","detailBook");

$r ->addRoute("deleteBook/:ID", "GET" , "BooksController","deleteBook");
$r ->addRoute("deleteAutor/:ID", "GET","AuthorsController","deleteAutor");
$r->addRoute("deleteImg/:ID", "GET", "BooksController","deleteImg");

$r->addRoute("createBook", "POST", "BooksController", "createBook");
$r->addRoute("createAutor", "POST", "AuthorsController", "createAutor");

$r->addRoute("editBook/:ID","GET","BooksController","editBook");
$r->addRoute("editAutor/:ID","GET","AuthorsController","editAutor");

$r->addRoute("updateAutor","POST","AuthorsController","guardarEdit");
$r->addRoute("updateBook","POST","BooksController","guardarEdit");

$r->addRoute("filtrarBook/:ID","GET","AuthorsController","filtrarBooks");

$r->addRoute("verifyUser", "POST", "UserController", "verifyUser");
$r->addRoute("login", "GET", "UserController", "login");
$r->addRoute("logout", "GET", "UserController", "logout");
$r->addRoute("register", "GET", "UserController", "register");
$r->addRoute("registerUser", "POST", "UserController", "registerUser");

$r->addRoute("users", "GET", "UserController", "showUsers");
$r->addRoute("deleteUser/:ID","GET","UserController","deleteUser");
$r->addRoute("addAdmin","POST","UserController","editAdmin");
$r->addRoute("submitAdmin","POST","UserController","editAdmin");

$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>