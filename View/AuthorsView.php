<?php
require_once './libs/smarty-3.1.39/smarty/libs/Smarty.class.php';
 
class AuthorsView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
     
    function viewAuthors($libros,$autores, $user,$admin){
        $this->smarty->assign('titulo','Autores');
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('templates/authorsDetail.tpl');
    }

    function showFilter($libros,$autor){
        $this->smarty->assign('titulo','Libros de');
        $this->smarty->assign('autor', $autor);
        $this->smarty->assign('libros', $libros);
        $this->smarty->display('templates/filterBooks.tpl');
    }

    function ShowCategoriaLocation(){
        header("Location: ".BASE_URL."authors");

    }

    function showEditAutor($autor){
        $this->smarty->assign('titulo','Editar Autor');
        $this->smarty->assign('autor', $autor);
        $this->smarty->display('templates/editAutor.tpl');


    }
}
?>


