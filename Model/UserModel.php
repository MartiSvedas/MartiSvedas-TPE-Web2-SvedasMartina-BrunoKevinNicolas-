<?php
class UserModel{
    private $db;

    function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=Books;charset=utf8', 'root', '');
    }

    function getUser($user){
        $query = $this->db->prepare('SELECT * FROM user WHERE usuario = ?');
        $query->execute([$user]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function registerUser($user,$password){
        $query = $this->db->prepare("INSERT INTO user(usuario,password) VALUES(?,?)");
        $query->execute(array($user,$password));
    }
}
?>