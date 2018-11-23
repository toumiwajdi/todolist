<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 16:55
 */
if ($_SERVER['REQUEST_METHOD']=="POST"){
    require_once $_SERVER["DOCUMENT_ROOT"].'/todoTest/Backend/RootConfig.php';

    require_once path . 'Controllers/UserController.php';
    require_once path . 'Model/ToDO.php';
    getAllTodos();
}
function getAllTodos(){
    $res=new UserController();
    $userId = $_POST["id"];
    if ($userId){
        $tab=$res->getUserTodoList($userId);
        $i=0;
        if (!empty($tab)) {
            header("Content-Type:application/json");
            foreach ($tab as $todo){
                $resultat[$i]["id"]=$todo["id"];
                $resultat[$i]["description"]=$todo["description"];
                $resultat[$i]["title"]=$todo["title"];
                $resultat[$i]["date"]=$todo["date"];
                $resultat[$i]["status"]=$todo["status"];
                $resultat[$i]["userId"]=$todo["userId"];
                $i++;
            }
            echo json_encode($resultat);
        }
        else{
            $err["empty"]="There is todo no in progress todo thank you";
            header("Content-Type:application/json");
            echo json_encode($err);
        }
    }


}
