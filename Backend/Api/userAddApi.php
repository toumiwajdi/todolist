<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 15:44
 */
if ($_SERVER['REQUEST_METHOD']=="POST"){
    require_once $_SERVER["DOCUMENT_ROOT"].'/todoTest/Backend/RootConfig.php';

    require_once path . 'Controllers/UserController.php';
    require_once path . 'Model/User.php';
    addUser();
}
function addUser(){
    if ($_POST["email"]){
        $res = new UserController();
        $email = $_POST["email"];
        if ($res->getUserByEmail($email)){
            $tan["error"] = "This email already exist You Can Login anyway";
            echo json_encode($tan);
        }
        else{
            $user = new User();
            $user->init('',$email);
            $res = new UserController();
            if ($res->addUser($user)){
                $resultat["res"]=$user->getEmail();
                header("Content-Type:application/json");
                echo json_encode($user->getEmail());
            }
            else{
                $tan["error"] = "We Have problem with server try again";
                echo json_encode($tan);
            }

        }
    }
    else{
        $tan["error"] = "Please add a correct input";

    }


}