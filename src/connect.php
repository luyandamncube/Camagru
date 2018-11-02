<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/* ABANDONED, DON'T WORK PROPERLY 
function is_empty_username($var, $post_var, $error){
    if (empty($post_var)){
        $error = "Name is required";
    }else{
        $var = test_input($post_var);
        echo "WHAT THE FUUUUCK";
    }
}
function is_empty_password($var, $post_var, $error){
    if (empty($post_var)){
        $error = "Password is required";
    }else{
        $var = test_input($post_var);
    }
}      
   
function is_valid_username($var, $error){
    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $var)){
        $error = "Username should contain English characters, be longer than 4 characters";
    }
}
*/  
Class Connection {
    //protected scope when you want to make your variable/function visible 
    //in all classes that extend current class including the parent class.
    protected  $server = "mysql:host=localhost;";
    protected  $user = "root";
    protected  $pass = "wszedxrfc";
    protected  $data = "db";
    protected $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;
    public function get_db(){
        return $this->data;
    }
    public function openConnection(){
        try{
            $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
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