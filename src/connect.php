<?php 
Class Connection {
    //protected scope when you want to make your variable/function visible 
    //in all classes that extend current class including the parent class.
    private  $server = "mysql:host=localhost;";
    protected  $user = "root";
    protected  $pass = "wszedxrfc";
    private  $data = "db";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;
    public function get_db(){
        return $this->data;
    }
    public function get_server(){
        return $this->server;
    }
    public function openConnection($server_){
        try{
            $this->con = new PDO($server_, $this->user,$this->pass,$this->options);
            //echo $this->get_server();
            return $this->con;
        }
        catch (PDOException $e){
            echo "There is a problem connecting: " . $e->getMessage();
        }
    }
    public function closeConnection() {
        $this->con = null;
    }



}

Class SQLRequest extends Connection{
    private $server = "mysql:host=localhost;dbname=db";
    public function get_server(){
        return $this->server;
    }
    //create admin user. Tests if user already exists, if so, creates new admin
    public function create_admin(){
        try{
            $database = new SQLRequest();
            $db = $database->openConnection($database->get_server());
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