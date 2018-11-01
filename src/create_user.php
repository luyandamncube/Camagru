<?php
    include_once 'connect.php';
    $username = $email = $password = $confirmpassword = "";
    $usernameErr = $emailErr = $passwordErr = $confirmpasswordErr = "";
    /*var_dump($_POST);*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //validate username
        if (empty($_POST["username"])) {
            $usernameErr = "Name is required";
          } else {
            $username = test_input($_POST["username"]);
            if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
                $usernameErr = "Username should contain English characters, be longer than 4 characters"; 
            }
        }

        //validate email  
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            }
        }

        //validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else{
            $password = test_input($_POST["password"]);
            if((mb_strlen($password) <= 7))
            {
                $passwordErr = "Password must be 8 characters or more";
            }
            if (!preg_match('/[^0-9A-Za-z]/', $password))
            {
                $passwordErr = "Password must contain one uppercase character and at least one number" ;
            }
            if (strpos($password, $username))
                $passwordErr = "Password should not contain username";
        }

        //validate confirm password
        if (empty($_POST["confirmpassword"])) {
            $confirmpasswordErr = "Retype password";
        } else{
            $confirmpassword = test_input($_POST["confirmpassword"]);
            if ($password != $confirmpassword)
            {
                $confirmpasswordErr = "Passowrds must match";
            }
        }
        
        if ($_POST["username"] and $_POST["email"] and $_POST["password"] and $_POST["confirmpassword"]) {
           // var_dump($_POST);
            
            try{
                $database = new SQLRequest();
                $db = $database->openConnection();
                // Validate unique username
                $stm = $db->prepare("SELECT * FROM users WHERE username=:_1");
                $stm->execute(array('_1' => $_POST['username'])); 
                $user = $stm->fetch();
                if ($user['username'] == $_POST['username'])
                {
                    $usernameErr = "Username already exists";
                    
                }

                // Validate unique email
                $stm = $db->prepare("SELECT * FROM users WHERE email=:_1");
                $stm->execute(array('_1' => $_POST['email'])); 
                $user = $stm->fetch();
                if ($user['email'] == $_POST['email'])
                {
                    $emailErr = "Email already in use";
                    
                }
                $database->closeConnection();
            }
            catch (PDOException $e){
                echo "There is a problem connecting: " . $e->getMessage();
            }
        
        } 
        if(!$usernameErr and !$emailErr and !$passwordErr and !$confirmpasswordErr){
            try{
                $stm = $db->prepare("INSERT INTO users (username, email, pass) 
                VALUES (:_1, :_2, :_3)");
                //USE SINGLE QUOTES HERE!!!                    
                $stm->execute(array(
                ':_1' => $_POST['username'], 
                ':_2' => $_POST['email'], 
                ':_3' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ));
                header('Location: ./create_success.php'); 
            }
            catch (PDOException $e){
                echo "There is a problem connecting: " . $e->getMessage();
            }
        }
    }
?>