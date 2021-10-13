<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
 
class AuthorsView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
     
    function viewAuthors($libros,$autores, $user){
        $smarty = new Smarty();
        $smarty->assign('titulo','Autores');
        $smarty->assign('autores', $autores);
        $smarty->assign('libros', $libros);
        $smarty->assign('user', $user);
        $smarty->display('templates/authorsDetail.tpl');
    }

    function showFilter($libros,$autor){
        $smarty = new Smarty();
        $smarty->assign('titulo','Libros de');
        $smarty->assign('autor', $autor);
        $smarty->assign('libros', $libros);
        $smarty->display('templates/filterBooks.tpl');
    }

    function ShowCategoriaLocation(){
        header("Location: ".BASE_URL."categorias");

    }

    function showEditAutor($autor){
        $smarty = new Smarty();
        $smarty->assign('titulo','Editar Autor');
        $smarty->assign('autor', $autor);
        $smarty->display('templates/editAutor.tpl');

    }
}
?>


