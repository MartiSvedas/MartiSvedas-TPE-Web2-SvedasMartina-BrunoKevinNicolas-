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
    function getUsers(){
        $query = $this->db->prepare("select * from user");
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_OBJ);
    }

    function registerUser($user,$password){
        $query = $this->db->prepare("INSERT INTO user(usuario,password) VALUES(?,?)");
        $query->execute(array($user,$password));
    }
    
    function deleteUser($id){
        $query = $this->db->prepare("DELETE FROM user WHERE id=?");
        $query->execute(array($id));

    }
    function updateAdmin($admin,$id){
        $query = $this->db->prepare("UPDATE user SET admin='$admin' WHERE id=?");
        $query->execute(array($id));
    }
}
?>