<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 16:00
 */
if ($_SERVER['REQUEST_METHOD']=="POST"){
    require_once $_SERVER["DOCUMENT_ROOT"].'/todoTest/Backend/RootConfig.php';
    require_once path . 'Controllers/TodoController.php';
    require_once path . 'Model/ToDO.php';
    addToDo();
}
function addToDo(){
    if ($_POST["title"]){
        $res = new TodoController();
        $title = $_POST["title"];
        $todo = new ToDO();
        $todo->setTitle($title);
        if ($_POST["description"]){
            $desc =  $_POST["description"];
            $todo->setDescription($desc);
        }
        if ($_POST["date"]){
            $date = $_POST["date"];
            $todo->setDate($date);
        }
        if ($res->updateToDoById($todo)){
            $resultat["res"]=$todo;
            header("Content-Type:application/json");
            echo json_encode($resultat);
        }
        else{
            $tan["error"] = "We Have problem with server try again";
            echo json_encode($tan);
        }
    }
    else{
        $tan["error"] = "Please add a correct input";
    }

}