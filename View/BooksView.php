<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class BooksView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome($libros,$autores,$user){
        $this->smarty->assign('titulo','Libreria');
        $this->smarty->assign('libros',$libros);
        $this->smarty->assign('autores',$autores);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/booksTable.tpl');
    }
    function showDetail($libro,$autores){
        $this->smarty->assign('titulo','Detalles del libro');
        $this->smarty->assign("libro",$libro);
        $this->smarty->assign('autores',$autores);
        $this->smarty->display('templates/bookDetail.tpl');
    }
    function showEditBook($libro,$autores){
        $this->smarty -> assign('titulo','Editar');
        $this->smarty -> assign("libro",$libro);
        $this->smarty->assign('autores',$autores);
        $this->smarty -> display('templates/editBook.tpl');
    }
   
    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");

    }
    
}
