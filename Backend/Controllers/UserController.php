<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 15:03
 */
require_once $_SERVER["DOCUMENT_ROOT"].'/todoTest/Backend/RootConfig.php';
include_once path . "Model/Config.php";

class UserController

{
    private $cnx;
    public function __construct()
    {
        $obj = new Config();
        $this->cnx = $obj->getConnexion();
    }
    public function addUser($user)
    {
        $query="INSERT INTO user VALUE ('','".$user->getEmail()."')";
        $res=$this->cnx->exec($query);
        return $res;
    }
    public function getUserByEmail($email){
        $query="Select * from person WHERE email='$email'";
        $res=$this->cnx->query($query);
        return $res->fetch();
    }
    public function getUserTodoList($user){
        $query="Select * from todo WHERE  userId='".$user."'";
        $res=$this->cnx->query($query);
        return $res->fetchAll(PDO::FETCH_NAMED);
    }

}