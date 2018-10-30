<?php
class Dbh{

    private $servername;
    private $username;
    private $password;
    private $db;

    public function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "wszedxrfc";
        $this->db = "db";

        /* msqli connection
        $servername = "localhost";
        $username = "root";
        $password = "wszedxrfc";

        // Create connection
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS db";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        //Create table
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
            login VARCHAR(8),
            pass VARCHAR(8),
            access ENUM('admin', 'user', 'other') NOT NULL,
            creation_date DATE NOT NULL
        )";
        $conn->close();
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        return $conn;
        */

        /* data source name*/
        $dsn = "mysql:host=".$this->servername.";";
        
        try{
            /* PDO connection (using data source name) */
            $pdo = new PDO($dsn, $this->username, $this->password);
            /* shows error inside of website */
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* executes an SQL statement in a single function call */
            $pdo->exec("CREATE DATABASE IF NOT EXISTS ".$this->db.";");
            $pdo->exec("USE ".$this->db);

            $pdo->exec("CREATE TABLE IF NOT EXISTS `users`(
                `id` INT(50) NOT NULL AUTO_INCREMENT,
                `login` VARCHAR(255) NOT NULL,
                `pass` VARCHAR(20) NOT NULL,
                `email` VARCHAR(100) NOT NULL,
                `access` ENUM('admin', 'user', 'other', '') NOT NULL,
                `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(`id`)
            ) ENGINE = InnoDB;");
            return $pdo;
        }
        catch (PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }
}
session_start([
    'cookie_lifetime' => 86400,
]);
?>

