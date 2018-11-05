<?php
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/config/database.php';
/*
echo $DB;
echo $DB_DSN;
echo $DB_USER;
echo $DB_PASSWORD;
*/
Class Connection {
    /*
        protected scope when you want to make your variable/function visible 
        in all classes that extend current class including the parent class.
    */

    protected $server;// = "mysql:host=localhost;";
    protected $user;// = "root";
    protected $pass;// = "wszedxrfc";
    protected $data;// = "db";
    protected $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;
    public function get_db(){
        global $DB;
        $this->data = $DB;
        return $this->data;
    }
    public function openConnection(){
        try{
            global $DB_DSN;
            global $DB_USER;
            global $DB_PASSWORD;
            global $DB;
            $this->data = $DB;
            $this->user = $DB_USER;
            $this->pass = $DB_PASSWORD;
            get_class($this) == 'Connection' ? $this->server = $DB_DSN : $this->server = $DB_DSN."dbname=".$DB;
            $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
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