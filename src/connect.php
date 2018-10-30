<?php 
Class Connection {
    private  $server = "mysql:host=localhost;";
    private  $user = "root";
    private  $pass = "wszedxrfc";
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
}
?>