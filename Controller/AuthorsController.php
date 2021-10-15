<?php
 
require_once "./Model/AuthorsModel.php";
require_once "./View/AuthorsView.php";
require_once "./Helpers/authHelper.php";

class AuthorsController{
    private $model;
    private $view;
    private $modelBook;
    private $authHelper;

    function __construct(){
        $this->model = new AuthorsModel();
        $this->view = new AuthorsView();
        $this->modelBook = new BooksModel();
        $this->authHelper = new authHelper();

    }

    function authors(){
        $user=$this->authHelper->checkUser();
        $libros=$this->modelBook->getBooks();
        $autores = $this->model->getAuthors();
        $this->view->viewAuthors($libros, $autores,$user);

    }
    
    function filtrarBooks($id){
        $libros=$this->modelBook->getBooks();
        $autor=$this->model->getAuthor($id);
        $this->view->showFilter($libros,$autor);
    }

    function deleteAutor($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteAutor($id);
        $this->view->ShowCategoriaLocation();

    }

    function createAutor(){
        $this->authHelper->checkLoggedIn();
        $this->model->insertAutor($_POST['nombre'],$_POST['descripcion'],$_POST['genero']);
        $this->view->ShowCategoriaLocation();
    }

    function editAutor($id){
        $this->authHelper->checkLoggedIn();
        $autor= $this->model->getAuthor($id);
        $this->view->showEditAutor($autor);
    }

    function guardarEdit(){
        $this->authHelper->checkLoggedIn();
        $this->model->updateAutor($_POST['nombre'],$_POST['descripcion'],$_POST['genero'],$_POST['id']);
        $this->view->ShowCategoriaLocation();
    }

}
?>