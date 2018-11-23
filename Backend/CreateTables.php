<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/11/2018
 * Time: 15:20
 */

include_once path . "Model/Config.php";
class CreateTables
{

    private $cnx;
    public function __construct()
    {
        $obj = new Config();
        $this->cnx = $obj->getConnexion();
    }
    public function createUserTable()
    {
        $query="CREATE TABLE `tododb`.`user` ( `id` INT(6) NOT NULL AUTO_INCREMENT , `email` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $res=$this->cnx->exec($query);
        return $res;
    }
    public function createToDoTable()
    {
        $query="CREATE TABLE `tododb`.`todo` ( `id` INT(6) NULL , `title` VARCHAR(20) NOT NULL , `description` VARCHAR(20) NULL , `dateToDo` VARCHAR(20) NULL , `status` VARCHAR(10) NOT NULL DEFAULT 'NotDone' , `userId` INT(6) NOT NULL , PRIMARY KEY (`id`(6))) ENGINE = InnoDB;";
        $res=$this->cnx->exec($query);
        return $res;

    }

}