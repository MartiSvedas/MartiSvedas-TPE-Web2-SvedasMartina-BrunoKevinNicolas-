<?php

require_once "./Model/BooksModel.php";
require_once "./Model/AuthorsModel.php";
require_once "./View/BooksView.php";
require_once "./Helpers/authHelper.php";
require_once "./Model/UserModel.php";

class BooksController{

    private $view;
    private $model;
    private $modelCategoria;
    private $authHelper;

    
    function __construct(){
        $this->model = new BooksModel();
        $this->view = new BooksView();
        $this->modelUser = new UserModel();
        $this->modelCategoria = new AuthorsModel();
        $this->authHelper = new authHelper();

    }

    function Home(){  
        $this->authHelper->checkLoggedIn();
        $user=$this->authHelper->checkUser();
        $admin=$this->authHelper->checkAdmin();
        $libros = $this->model->getBooks();
        $autores = $this->modelCategoria->getAuthors();
        if(isset($libros) && isset($autores) && isset($autores)){
            $this->view->showHome( $libros,$autores,$user,$admin);}
        else{
            $this->view->ShowHomeLocation();
        }
    }


    function detailBook($params=null){
        $id_book=$params[':ID'];
        $this->authHelper->checkLoggedIn();
        $user= $this->authHelper->getUserId();
        $admin=$this->authHelper->checkAdmin();
        $libro=$this->model->getBook($id_book);
        $autores = $this->modelCategoria->getAuthors();
        if(isset($libro) && isset($autores)){
            $this->view->showDetail($libro,$autores,$user,$admin);}
        else{
            $this->view->ShowHomeLocation();
        }
        
    }

    function createBook(){
        $nombre=$_POST['nombre'];
        $sinopsis=$_POST['sinopsis'];
        $autor=$_POST['autor'];
        $imagen= $_FILES['input_image']['tmp_name'];
        $this->authHelper->checkAdminLogged();
        if(!empty($nombre) && !empty($sinopsis) && !empty($autor)){
            if($_FILES['input_image']['type'] == "image/jpg" || $_FILES['input_image']['type'] == "image/jpeg" || $_FILES['input_image']['type'] == "image/png" ) { 
                $this->model->insertBook($nombre,$sinopsis,$autor,$imagen);
                $this->view->ShowHomeLocation();}
            else{
                $this->model->insertBook($nombre,$sinopsis,$autor);
                $this->view->ShowHomeLocation();
        }
    }else{
        $this->view->ShowHomeLocation();

    }
    }

    function deleteBook($params=null){
        $id_book=$params[':ID'];
        $this->authHelper->checkAdminLogged();
        $this->model->deleteBook($id_book);
        $this->view->ShowHomeLocation();
        
    }
    
    function editBook($params=null){   
        $id_book=$params[':ID'];
        $this->authHelper->checkAdminLogged();
        $libro=$this->model->getBook($id_book);
        $autores = $this->modelCategoria->getAuthors();
        if(isset($libro)&&isset($autores)){
            $this->view->showEditBook($libro,$autores);
        }else{
            $this->view->ShowHomeLocation();
        }
    
}

    function guardarEdit(){
        $nombre=$_POST['nombre'];
        $sinopsis=$_POST['sinopsis'];
        $autor=$_POST['autor'];
        $id_book= $_POST['id'];
        $imagen= $_FILES['input_image']['tmp_name'];
        $this->authHelper->checkAdminLogged();
        if(!empty($nombre) && !empty($sinopsis) && !empty($autor)){
            if($_FILES['input_image']['type'] == "image/jpg" || $_FILES['input_image']['type'] == "image/jpeg" || $_FILES['input_image']['type'] == "image/png" ) { 
                $this->model->updateBook($nombre,$sinopsis,$autor,$id_book,$imagen);
                $this->view->ShowHomeLocation();
            }else{
                $this->model->updateBook($nombre,$sinopsis,$autor,$id_book,);
                $this->view->ShowHomeLocation();
            }
        }
        else{
            $this->view->ShowHomeLocation();
        }
    }

    function insertarImg(){
        $id_book = $_POST['id'];
        $imagen= $_FILES['input_image']['tmp_name'];
        $this->authHelper->checkAdminLogged();
        if($_FILES['input_image']['type'] == "image/jpg" || $_FILES['input_image']['type'] == "image/jpeg" || $_FILES['input_image']['type'] == "image/png" ) { 
            $this->model->insertarImagen($imagen,$id_book);
            $this->view->ShowHomeLocation();
        }
    }

    function deleteImg($params=null){
        $this->authHelper->checkAdminLogged();
        $id_book = $params[':ID'];
        $this->authHelper->checkAdminLogged();
        $this->model->deleteImagen($id_book);
        $this->view->ShowHomeLocation();
    }

    }
        
        

    
        
       
     
    
  

?>