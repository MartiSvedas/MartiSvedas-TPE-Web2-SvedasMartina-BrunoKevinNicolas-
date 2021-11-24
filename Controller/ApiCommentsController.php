<?php
require_once "./Model/CommentsModel.php";
require_once "./View/ApiView.php";
require_once "./Helpers/authHelper.php";


class ApiCommentsController{
    private $AuthHelper;
    private $view;
    private $model;

    function __construct()
    {
        $this->model= new CommentsModel();
        $this->view = new ApiView();
        $this->AuthHelper = new AuthHelper();
    }

    function getComments(){
        $comentarios= $this->model->getComments();
        if($comentarios){
        return $this->view->response($comentarios, 200);
        }
        else{
            $this->view->response("El libro no tiene comentarios",404);
        }
    }
    
    function getCommentsByBook($params=null){
        $idBook = $params[':ID'];
        $comment = $this->model->getCommentsByBook($idBook);
        if($comment){
            return $this->view->response($comment, 200);
        }
        else{
            $this->view->response("El libro no tiene comentarios",404);
        }
        

    }

    function deleteComment($params = null){
    $this->AuthHelper->checkAdminLogged();
        $id = $params[':ID'];
        $comment  = $this->model->getComment($id);
    if($comment){
        $this->model->deleteComment($id);
        $this->view->response("El comentario con el id: $id fue eliminado",200);
    }
    else{    
        $this->view->response("El comentario no se pudo eliminar",404);}
    }
    
    function insertComment(){
    $this->AuthHelper->checkLoggedIn();
    $body = $this->getBody();
    $comment = $this->model->insertComment($body->comentario,$body->puntaje,$body->id_libro,$body->id_user);
        if(!empty($comment)){
             $this->view->response($this->model->getComment($comment),200);
        }
        else{
            $this->view->response("El comentario no se pudo agregar", 500);
        }
    

    }
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}