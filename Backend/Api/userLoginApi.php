<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 15:57
 */
if ($_SERVER['REQUEST_METHOD']=="GET"){
    require_once $_SERVER["DOCUMENT_ROOT"].'/todoTest/Backend/RootConfig.php';
    require_once path . 'Controllers/UserController.php';
    loginUser();
}
function loginUser(){
    if ($_POST["email"]) {
        $res = new UserController();
        $email = $_POST["email"];
        if ($res->getUserByEmail($email)) {
            $tan["id"] = $res["id"];
            $tan["email"] = $res["email"];
            echo json_encode($tan);
        } else {
            $tan["error"] = "This mail dons't exist please sign up";
            echo json_encode($tan);
        }
    }
    else{
        $tan["error"] = "Please add a correct input";

    }


}