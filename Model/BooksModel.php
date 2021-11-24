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

    function insertBook($nombre, $sinopsis, $autor, $imagen=null){
        $pathImg = null;
        if ($imagen){
            $target = 'img/books/' . uniqid() . '.jpg';
            move_uploaded_file($imagen, $target);
            $pathImg =  $target;
        }
        $query = $this->db->prepare("INSERT INTO Libros(nombre,sinopsis,id_autor,imagen)VALUES(?,?,?,?)");
        $query ->execute(array($nombre,$sinopsis,$autor,$pathImg));
    }

    function deleteBook($id){
        $query = $this->db->prepare("DELETE FROM Libros WHERE id=?");
        $query->execute(array($id));

    }

    function updateBook($nombre,$sinopsis,$autor,$id){
        $query = $this->db->prepare("UPDATE Libros SET nombre='$nombre',sinopsis='$sinopsis', id_autor='$autor' WHERE id=?");
        $query->execute(array($id));
    }

    function insertarImagen($imagen,$id){
        $pathImg = null;
        if ($imagen){
            $target = 'img/books/' . uniqid() . '.jpg';
            $pathImg =  $target;
            var_dump($target);
        }
        $imagen= $pathImg;
        $query = $this->db->prepare("UPDATE Libros SET imagen = '$imagen' WHERE id=?");
        $query->execute(array($id));
    }

    function deleteImagen($id){
        $valorVacio='';
        $query = $this->db->prepare("UPDATE Libros SET imagen='$valorVacio' WHERE id=?");
        $query->execute(array($id));
    }
    
}

