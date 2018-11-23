<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 15:01
 */

class Config
{
    function getConnexion()
    {   $db="mysql:host=localhost:3306;dbname=ToDoDB";
        $user="root";
        $pw="";
        $connexion=new PDO($db,$user,$pw);
        return $connexion;
    }

}