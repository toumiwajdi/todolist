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
    updateToDo();
}
function updateToDo(){
    if ($_POST["id"]){
        $res = new TodoController();
        $id = $_POST['id'];
        $title = $_POST["title"];
        $todo = new ToDO();
        $todo->setId($id);
        $todo->setTitle($title);
        if ($_POST["description"]){
            $desc = $_POST["description"];
            $todo->setDescription($desc);
        }
        if ($_POST["date"]){
            $date = $_POST["date"];
            $todo->setDate($date);
        }
        if ($_POST["status"]){
            $status = $_POST["status"];
            if ($status=="Done"){
                $res->updateStatusById($todo,true);
            }
            else{
                $res->updateStatusById($todo,true);
            }
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