<?php


class CommentsModel{

    private $db;

    function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=Books;charset=utf8', 'root', '');
    }

    function getComments(){
        $query = $this->db->prepare("select * from comentarios");
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_OBJ);
    }

    function getComment($id){
        $query = $this->db->prepare("select * from comentarios WHERE id=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getCommentsByBook($id){
        $query = $this->db->prepare("select * from comentarios WHERE id_libro=?");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertComment( $comentario,$puntaje,$libro,$user){
        $query = $this->db->prepare("INSERT into comentarios(comentario,puntaje,id_libro,id_user) VALUES (?,?,?,?)");
        $query->execute(array($comentario,$puntaje,$libro,$user));
        return $this->db->lastInsertId();
    }

    function deleteComment($id){
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $query->execute(array($id));
    }
    

}
 
?>