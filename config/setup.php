<?php
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';

try{
    //Initial database setup using "mysql:host=localhost"
    $database = new Connection();
    $db = $database->openConnection();
    $sql = "CREATE DATABASE IF NOT EXISTS ".$database->get_db();
    $db->exec($sql);
    $stm = $db->query("SELECT IF(EXISTS (SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'users'), 'No','Yes');");
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    $keys = array_keys($result);
    $database->closeConnection();
    
    echo $result[$keys[0]];
    //if ($result[$keys[0]] == 'No'){

  //  }
    /*
        SELECT IF(EXISTS (SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'users'), 'Yes','No');
        $stm = $db->query("SELECT IF(EXISTS (SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'users'), 'Yes','No');");
        $result = $stm->fetch(PDO::FETCH_ASSOC);
    */
    //SQL using "mysql:host=localhost;dbname=db"
    $database = new SQLRequest();
    /*
    if (!$_SESSION['db'] )
    {
        //Create users table
        $db = $database->openConnection();
        $sql = "CREATE TABLE IF NOT EXISTS `users`(
                    `id` INT(50) NOT NULL AUTO_INCREMENT UNIQUE,
                    `username` VARCHAR(255) NOT NULL,
                    `pass` VARCHAR(255) NOT NULL,
                    `email` VARCHAR(100) NOT NULL,
                    `access` ENUM('admin', 'user', 'other', '')  NOT NULL  DEFAULT 'user' ,
                    `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `avatar` LONGBLOB,
                    PRIMARY KEY(`username`)
                ) ENGINE = InnoDB;"; 
        $db->exec($sql);

        //Create images table
        $sql = "CREATE TABLE IF NOT EXISTS `db`.`images` ( 
            `pic_num` INT NOT NULL , 
            `username` VARCHAR(255) NOT NULL , 
            `picture` LONGBLOB NOT NULL , 
            `likes` INT NOT NULL , 
            PRIMARY KEY (`username`)
            ) ENGINE = InnoDB;";
        $db->exec($sql);

        //Add foreign Key to images table
        $sql = "ALTER TABLE `images` 
        ADD CONSTRAINT uploadedby_FK 
        FOREIGN KEY (`username`) 
        REFERENCES `users` (`username`);";
        $db->exec($sql);

        $_SESSION['db'] = $database->get_db();
    }
*/
    //Create admin user
    $database->create_admin();
    $database->update_dp('root', $_SERVER['DOCUMENT_ROOT'].'/Camagru/resources/user.png');
    $database->closeConnection();
}
catch (PDOException $e){
    echo "There is a problem with the connection: " . $e->getMessage();
}
?>

