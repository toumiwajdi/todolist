<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 15:18
 */

require_once $_SERVER["DOCUMENT_ROOT"].'/todoTest/Backend/RootConfig.php';
include_once path . "Model/Config.php";


class TodoController
{
    private $cnx;
    public function __construct()
    {
        $obj = new Config();
        $this->cnx = $obj->getConnexion();
    }
    public function addToDo($todo)
    {
        $query="INSERT INTO todo VALUE ('','".$todo->getTitle()."','".$todo->getDescription()."','".$todo->getDate()."','".$todo->getTodo()."')";
        $res=$this->cnx->exec($query);
        return $res;
    }
    public function updateToDoById($todo){
        $query= $query="UPDATE todo SET title='".$todo->getTitle()."' , description='".$todo->getDescription()."' , dateToDo='".$todo->getDate()."' ,'NotDone'WHERE id=$todo->getId()";;
        $res=$this->cnx->query($query);
        return $res->fetch();
    }
    public function addToDoToAnother($todo,$id){
        $this->addToDo($todo);
        $lastId = $this->cnx->lastInsertId();
        $query= $query="UPDATE todo SET todoId='".$lastId."'  WHERE id=$id";;
        $res=$this->cnx->query($query);
        return $res->fetch();
    }

    public function updateStatusById($id,$status){
        if ($status){
            $query= $query="UPDATE todo SET status='Done'  WHERE id=$id";
        }
        else{
            $query= $query="UPDATE todo SET status='NotDone'  WHERE id=$id";
        }
        $res=$this->cnx->query($query);
        return $res->fetch();

    }
    public function getUserTodoList($user){
        $query="Select * from todo WHERE  userId='".$user->getId()."'";
    }

}