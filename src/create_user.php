<?php
    require_once('../setup.php');
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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
            if((mb_strlen($password) <= 8))
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
        $url = './create_success.php';
        if ($_POST["username"] and $_POST["email"] and $_POST["password"] and $_POST["confirmpassword"]) 
        {
            class Newdbh extends Dbh {
                public function create_user(){//CHANGE TO PRIVATE!!!!!!
                    $this->servername = "localhost";
                    $this->username = "root";
                    $this->password = "wszedxrfc";
                    $this->db = "db";

                    $dsn = "mysql:host=".$this->servername.";dbname=".$this->db;
                    try{
                        /* PDO connection (using data source name) */
                        $pdo = new PDO($dsn, $this->username, $this->password);
                        /* shows error inside of website */
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                        /* executes an SQL statement in a single function call */
                        $sql = "INSERT INTO users (login, pass, email)
                        VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."')";
                        if ($pdo->query($sql)) {
                            echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
                        }
                        else{
                            echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                        }
                    //header( "Location: $url" );
                    //var_dump($_POST);
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                    }
                    $pdo = null; 
                }  
            }
        }
            
            
    }
?>