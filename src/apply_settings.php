<?php
include_once 'connect.php';
include 'session.php';

$new_user = $new_email = $new_password = "";
$new_userErr = $new_emailErr = $new_passwordErr = "";
$message = ""; //Changes applied successfully message
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //validate username
    if (!isset($_POST["new_username"])){
        $new_user = $_SESSION['username'];
    }
    $new_user = test_input($_POST["new_username"]);
    if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $new_user)) {
        $new_userErr = "Username should contain English characters, be longer than 4 characters"; 
    }

    //validate email
    if (!isset($_POST["new_email"])){
        $new_user = $_SESSION['email'];
    }
    $new_email = test_input($_POST["new_email"]);
    // check if e-mail address is well-formed
    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
    $new_emailErr = "Invalid email format"; 
    }

    //validate password
    if (!isset($_POST["new_password"])){
        $new_user = $_SESSION['pass'];
    }
    $new_password = test_input($_POST["new_password"]);
    if((mb_strlen($new_password) <= 7)){
        $new_passwordErr = "Password must be 8 characters or more";
        }
    if (!preg_match('/[^0-9A-Za-z]/', $new_password)){
        $new_passwordErr = "Password must contain one uppercase character and at least one number" ;
    }
    if (strpos($new_password, $new_user))
        $new_passwordErr = "Password should not contain username";
    
    
    if ($_POST["new_username"] and $_POST["new_email"] and $_POST["new_password"]) {
    // var_dump($_POST); 
        try{
            $database = new SQLRequest();
            $db = $database->openConnection();
            // Validate unique username
            $stm = $db->prepare("SELECT * FROM users WHERE username=:_1");
            $stm->execute(array('_1' => $_POST['new_username'])); 
            $new_user = $stm->fetch();
            if ($new_user['new_username'] == $_POST['new_username']) {
                $new_userErr = "Username already exists";           
            }
            
            // Validate unique email
            $stm = $db->prepare("SELECT * FROM users WHERE email=:_1");
            $stm->execute(array('_1' => $_POST['new_email'])); 
            $new_user = $stm->fetch();
            if ($new_user['new_email'] == $_POST['new_email']){
                $new_emailErr = "Email already in use";
            }
            $database->closeConnection();
            }
            catch (PDOException $e){
                echo "There is a problem connecting: " . $e->getMessage();
            }        
    } 
    if(!$new_userErr and !$new_emailErr  and !$new_passwordErr 
        and $new_user != 'Change username'
    ){
        try{
            //$stm = $db->prepare("INSERT INTO users (username, email, pass) 
            $stm = $db->prepare("UPDATE users 
            SET username =  :_1, email = :_2, pass = :_3 
            WHERE username = :_1;");
            //UPDATE users SET username = 'qwerty', email = 'qwerty@qwerty.com', pass = 'bwertR!!' WHERE username = 'qwert'
            //USE SINGLE QUOTES HERE!!!                    
            $stm->execute(array(
            ':_1' => $_POST['new_username'], 
            ':_2' => $_POST['new_email'], 
            ':_3' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
            ));
            $message = "Changes applied successfully";
            //header('Location: ./create_success.php'); 
        }
        catch (PDOException $e){
            echo "There is a problem connecting: " . $e->getMessage();
        }
    }
    
}

?>