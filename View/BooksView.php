<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class BooksView{

    private $smarty;

    function __construct(){
        $smarty = new Smarty();
    }

    function showHome($libros,$autores,$user){
        $smarty = new Smarty();
        $smarty->assign('titulo','Libreria');
        $smarty->assign('libros',$libros);
        $smarty->assign('autores',$autores);
        $smarty->assign('user', $user);
        $smarty->display('templates/booksTable.tpl');
    }
    function showDetail($libro,$autores){
        $smarty = new Smarty();
        $smarty -> assign('titulo','Detalles del libro');
        $smarty -> assign("libro",$libro);
        $smarty->assign('autores',$autores);
        $smarty->display('templates/bookDetail.tpl');
    }
    function showEditBook($libro,$autores){
        $smarty = new Smarty();
        $smarty -> assign('titulo','Editar');
        $smarty -> assign("libro",$libro);
        $smarty->assign('autores',$autores);
        $smarty -> display('templates/editBook.tpl');
    }
   
    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");

    }
    
}
