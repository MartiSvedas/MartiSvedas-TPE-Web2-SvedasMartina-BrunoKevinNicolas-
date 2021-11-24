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
        $this->authHelper->checkLoggedIn();
            $user=$this->authHelper->checkUser();
            $admin=$this->authHelper->checkAdmin();
            $libros=$this->modelBook->getBooks();
            $autores = $this->model->getAuthors();
        if(isset($libros) && isset($autores)){
            $this->view->viewAuthors($libros, $autores,$user,$admin);   
        }
        else{
            $this->view->ShowCategoriaLocation();
        }
    }
    
    function filtrarBooks($params=null){
        $id=$params[':ID'];
        $this->authHelper->checkLoggedIn();
        $libros=$this->modelBook->getBooks();
        $autor=$this->model->getAuthor($id);
        if(isset($libros) && isset($autor)){
            $this->view->showFilter($libros,$autor);
        }
        else{
            $this->view->ShowCategoriaLocation();
        }
        
    }

    function deleteAutor($params=null){
        $id=$params[':ID'];
            $this->authHelper->checkAdminLogged();
            $this->model->deleteAutor($id);
            $this->view->ShowCategoriaLocation();
        

    }

    function createAutor(){
        $nombre=$_POST['nombre'];
        $descripcion =$_POST['descripcion'];
        $genero=$_POST['genero'];
        $this->authHelper->checkAdminLogged();
        if(!empty($nombre) && !empty($descripcion) && !empty($genero)){
            $this->model->insertAutor($nombre,$descripcion,$genero);
            $this->view->ShowCategoriaLocation();
        }else{
            $this->view->ShowCategoriaLocation();
        }
    }

    function editAutor($params=null){
        $id=$params[':ID'];
        $this->authHelper->checkAdminLogged();
        $autor= $this->model->getAuthor($id);
        if(isset($autor)){
            $this->view->showEditAutor($autor);
        }
        else{
            $this->view->ShowCategoriaLocation();
        }
    }

    function guardarEdit(){
        $nombre=$_POST['nombre'];
        $descripcion =$_POST['descripcion'];
        $genero=$_POST['genero'];
        $this->authHelper->checkAdminLogged();
        if(!empty($nombre) || !empty($descripcion) || !empty($genero)){
            $this->model->updateAutor($nombre,$descripcion,$genero,$_POST['id']);
            $this->view->ShowCategoriaLocation();
        }else{
            $this->view->ShowCategoriaLocation();
        }
    }

}
?>