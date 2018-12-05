<?php
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';

try{
    //Initial database setup using "mysql:host=localhost"
    $database = new Connection();
    $db = $database->openConnection();
    $sql = "CREATE DATABASE IF NOT EXISTS ".$database->get_db();
    $db->exec($sql);

    //should contain a result if the table 'users' exists
    $stm = $db->query("SELECT * 
                        FROM information_schema.tables
                        WHERE table_schema = 'db' 
                        AND table_name = 'users'
                        LIMIT 1;");
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    $database->closeConnection();

    if (!$result){
        
        //Create users table
        $database = new SQLRequest();
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
        $database->closeConnection();

        //Create images table
        //SQL using "mysql:host=localhost;dbname=db"
        $sql = "CREATE TABLE IF NOT EXISTS `db`.`images` ( 
            `pic_num` VARCHAR(255) NOT NULL , 
            `username` VARCHAR(255) NOT NULL , 
            `picture` LONGBLOB NOT NULL , 
            `likes` INT NOT NULL , 
            `comments` INT NOT NULL , 
            PRIMARY KEY (`pic_num`)
            ) ENGINE = InnoDB;";
        $db->exec($sql);

        //Add foreign Key to images table
        $sql = "ALTER TABLE `images` 
        ADD CONSTRAINT uploadedby_FK 
        FOREIGN KEY (`username`) 
        REFERENCES `users` (`username`);";
        $db->exec($sql);

        //Create likes table 
        $sql = "CREATE TABLE IF NOT EXISTS `db`.`likes` ( 
            `like_num` INT(50) NOT NULL AUTO_INCREMENT UNIQUE,
            `username` VARCHAR(255) NOT NULL ,
            `pic_num` VARCHAR(255) NOT NULL , 
            PRIMARY KEY (`like_num`)
            ) ENGINE = InnoDB;";
        $db->exec($sql);
        //Create comments table 
        $sql = "CREATE TABLE IF NOT EXISTS `db`.`comments` ( 
            `comment_num` INT(50) NOT NULL AUTO_INCREMENT UNIQUE, 
            `username` VARCHAR(255) NOT NULL , 
            `comment` VARCHAR(255) NOT NULL , 
            PRIMARY KEY (`comment_num`)
            ) ENGINE = InnoDB;";
        $db->exec($sql);
        //Add foreign Key to images table
        $sql = "ALTER TABLE `likes` 
        ADD CONSTRAINT likedby_FK 
        FOREIGN KEY (`username`) 
        REFERENCES `users` (`username`);";
        $db->exec($sql);

        //Create admin user
        $database->create_admin();
        $database->update_dp('root', $_SERVER['DOCUMENT_ROOT'].'/Camagru/resources/user.png');
        $database->closeConnection();
    }
} catch (PDOException $e){
    echo "There is a problem with the connection: " . $e->getMessage();
}
?>

