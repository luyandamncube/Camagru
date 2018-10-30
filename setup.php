<?php
include_once './src/connect.php';

try{
    //Initial database setup using "mysql:host=localhost"
    $database = new Connection();
    $db = $database->openConnection($database->get_server());
    $sql = "CREATE DATABASE IF NOT EXISTS ".$database->get_db();
    $db->exec($sql);
    $database->closeConnection();

    //SQL using "mysql:host=localhost;dbname=db"
    $database = new SQLRequest();
    $db = $database->openConnection($database->get_server());
    $sql = "CREATE TABLE IF NOT EXISTS `users`(
                `id` INT(50) NOT NULL AUTO_INCREMENT,
                `login` VARCHAR(255) NOT NULL,
                `pass` VARCHAR(20) NOT NULL,
                `email` VARCHAR(100) NOT NULL,
                `access` ENUM('admin', 'user', 'other', '') NOT NULL,
                `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(`id`)
            ) ENGINE = InnoDB;"; 
    $db->exec($sql);
    $database->closeConnection();
}
catch (PDOException $e){
    echo "There is a problem with the connection: " . $e->getMessage();
}

?>

