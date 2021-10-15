<?php

require_once "./Model/BooksModel.php";
require_once "./Model/AuthorsModel.php";
require_once "./View/BooksView.php";
require_once "./Helpers/authHelper.php";

class BooksController{

    private $view;
    private $model;
    private $modelCategoria;
    private $authHelper;

    
    function __construct(){
        $this->model = new BooksModel();
        $this->view = new BooksView();
        $this->modelCategoria = new AuthorsModel();
        $this->authHelper = new authHelper();

    }

    function Home(){  
        $user=$this->authHelper->checkUser();
        $libros = $this->model->getBooks();
        $autores = $this->modelCategoria->getAuthors();
        $this->view->showHome( $libros,$autores,$user);
    }

    function detailBook($id){
        $libro=$this->model->getBook($id);
        $autores = $this->modelCategoria->getAuthors();
        $this->view->showDetail($libro,$autores);
    }

    function createBook(){
        $this->authHelper->checkLoggedIn();
        $this->model->insertBook($_POST['nombre'],$_POST['sinopsis'],$_POST['autor']);
        $this->view->ShowHomeLocation();
    }

    function deleteBook($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteBook($id);
        $this->view->ShowHomeLocation();
    }
    
    function editBook($id){   
        $this->authHelper->checkLoggedIn();
        $libro=$this->model->getBook($id);
        $autores = $this->modelCategoria->getAuthors();
        $this->view->showEditBook($libro,$autores);
    
}

    function guardarEdit(){
        $this->authHelper->checkLoggedIn();
        $this->model->updateBook($_POST['nombre'],$_POST['sinopsis'],$_POST['autor'],$_POST['id']);
        $this->view->ShowHomeLocation();
         }
       
     
    
  
}
?>