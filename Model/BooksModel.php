<?php


class BooksModel{
    private $db;

    function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=Books;charset=utf8', 'root', '');
    }

    function getBooks(){
        $query = $this->db->prepare("select * from Libros");
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_OBJ);
    }
    
    function getBook($id){
        $query = $this->db->prepare("select * from Libros WHERE id=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertBook($nombre, $sinopsis, $autor){
        $query = $this->db->prepare("INSERT INTO Libros(nombre,sinopsis,id_autor)VALUES(?,?,?)");
        $query ->execute(array($nombre,$sinopsis,$autor));
    }

    function deleteBook($id){
        $query = $this->db->prepare("DELETE FROM Libros WHERE id=?");
        $query->execute(array($id));

    }

    function updateBook($nombre,$sinopsis,$autor,$id){
        $query = $this->db->prepare("UPDATE Libros SET nombre='$nombre',sinopsis='$sinopsis', id_autor='$autor' WHERE id=?");;
        $query->execute(array($id));
    }
    
}

