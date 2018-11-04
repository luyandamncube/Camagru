<?php
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
?>