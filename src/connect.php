<?php 
Class Connection {
    private  $server = "mysql:host=localhost;";
    private  $user = "root";
    private  $pass = "wszedxrfc";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;

    public function openConnection($server_){
        try{
            $this->con = new PDO($server_, $this->user,$this->pass,$this->options);
            //echo $this->get_server();
            return $this->con;
        }
        catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
    public function closeConnection() {
        $this->con = null;
    }
}
?>