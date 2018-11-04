<?php
include 'Connection.class.php';
Class SQLRequest extends Connection{
    protected $server = "mysql:host=localhost;dbname=db";

    //create admin user. Tests if user already exists, if so, creates new admin
    public function create_admin(){
        try{
            $database = new SQLRequest();
            $db = $database->openConnection();
            //If there are no variables going to be used in the query
            $stm = $db->query("SELECT * FROM users WHERE access = 'admin'");
            //Get single row, param makes it store as an array
            $user = $stm->fetch(PDO::FETCH_ASSOC);
            //TEST if row was found: print_r($user);
            if (!$user){
                $stm = $db->prepare("INSERT INTO users (username, email, pass, access) 
                VALUES (:_1, :_2, :_3, :_4)");
                //USE SINGLE QUOTES HERE!!!                    
                $stm->execute(array(
                ':_1' => $this->user, 
                ':_2' => 'ADMIN', 
                ':_3' => password_hash($this->pass, PASSWORD_DEFAULT),
                ':_4' => 'admin', 
                )); 
            }
            $database->closeConnection();
        }
        catch (PDOException $e){
            echo "There is a problem connecting: " . $e->getMessage();
        }
    }
}
?>