<?php
 ini_set("display_errors", "1");
 error_reporting(E_ALL);
require_once "./Controller/BooksController.php";
require_once "./Controller/AuthorsController.php";
require_once "./Controller/UserController.php";

 define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
 
 if (!empty($_GET['action'])) {
     $action = $_GET['action'];
    } else {
        $action = 'home'; 
    }
    
    $params = explode('/', $action);

$booksController = new BooksController();
$authorsController= new AuthorsController();
$userController=new UserController();

switch ($params[0]){
    case 'login':
        $userController->login();
    break;

    case 'logout':
        $userController->logout();
    break;

    case 'verifyUser':
        $userController->verifyUser();
    break;

    case 'register':
        $userController->Register();
    break;

    case 'registerUser':
        $userController->registerUser();
    break;
    
    case 'home':
        $booksController-> Home();
    break;

    case 'createBook':
        $booksController->createBook();
    break;

    case 'showBook':
        $booksController->detailBook($params[1]);
    break;

    case 'deleteBook':
        $booksController->deleteBook($params[1]);
    break;

    case 'editBook':
        $booksController->editBook($params[1]);
    break;

    case 'updateBook':
        $booksController->guardarEdit();
    break;

    case 'categorias':
        $authorsController->authors();
    break;

    case 'filtrarBook':
        $authorsController->filtrarBooks($params[1]);
    break;

    case 'deleteAutor':
        $authorsController->deleteAutor($params[1]);
    break;

    case 'createAutor':
        $authorsController->createAutor();
    break;

    case 'editAutor':
        $authorsController->editAutor($params[1]);
    break;

    case 'updateAutor':
        $authorsController->guardarEdit($params[1]);
    break;


    default:
        echo('404 Page not found');
    break;
}

?>