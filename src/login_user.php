<?php
include_once 'connect.php';
include 'session.php';

$loginame = $loginpass = "";
$loginameErr = $loginpassErr = "";
    /*var_dump($_POST);*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validate username
    
    if (empty($_POST["loginame"])) {
        $loginameErr = "Name is required";
    } else {
        $loginame = test_input($_POST["loginame"]);
    }
    
    //FIX MEEEEEE
    //is_empty_username($loginame, $_POST['loginname'], $loginameErr);
    //echo $loginameErr;
    //validate password
    
    if (empty($_POST["loginpass"])) {
        $loginpassErr = "Password is required";
    } else{
        $loginpass = test_input($_POST["loginpass"]);
    }
    
    //$loginpass = is_empty_password($_POST['loginname'], $loginpassErr);
    if ($_POST["loginname"] and $_POST["loginpass"]){
        try{
            $database = new SQLRequest();
            $db = $database->openConnection();
        
            // select a particular user by id
            $stm = $db->prepare("SELECT * FROM users WHERE username=:_1");
            $stm->execute(array('_1' => $_POST['loginname'])); 
            $user = $stm->fetch();
            //TEST if row was found: print_r($user);
            //echo $user['pass'];
            if (!$user){
                $loginameErr = "User does not exist";
                //echo "user exists!\n";  
                //print_r($user);
            }
           if ($user and password_verify($_POST['loginpass'], $user['pass'])){
               if ($user['access'] == 'admin'){
                   header('Location: http://localhost:8080/phpmyadmin');
               }else{
                    header('Location: home.php');
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['creation_date'] = $user['creation_date'];
                    $_SESSION['pass'] = $user['pass'];
                    //$_SESSION['dp'] = $user['dp'];


                    //echo $_SESSION['user'] ;
               }
           } else{
                $loginameErr = "Login incorrect";
           }           
        $database->closeConnection();
        }
        catch (PDOException $e){
            echo "There is a problem connecting: " . $e->getMessage();
        }
    }
}
?>