<?php
 
  

class AuthorsModel{
    private $db;

    function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=Books;charset=utf8', 'root', '');
    }

    function getAuthors(){
        $query= $this->db->prepare("SELECT * FROM Autores");
        $query -> execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAuthor($id){
        $query = $this->db->prepare("select * from Autores WHERE id=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function deleteAutor($id){
        $query = $this->db->prepare("DELETE FROM Autores WHERE id=?");
        $query->execute(array($id));

    }
    
    function insertAutor($nombre, $descripcion, $genero){
        $query = $this->db->prepare("INSERT INTO Autores(nombre,descripcion,genero)VALUES(?,?,?)");
        $query ->execute(array($nombre,$descripcion,$genero));
    }

    function updateAutor($nombre,$descripcion,$genero,$id){
        $query = $this->db->prepare("UPDATE Autores SET nombre='$nombre',descripcion='$descripcion', genero='$genero' WHERE id=?");;
        $query->execute(array($id));
    }

}




?>