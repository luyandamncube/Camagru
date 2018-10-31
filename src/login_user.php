<?php
include_once 'connect.php';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
    //validate password
    if (empty($_POST["loginpass"])) {
        $loginpassErr = "Password is required";
    } else{
        $loginpass = test_input($_POST["loginpass"]);
    }
    if ($_POST["loginname"] and $_POST["loginpass"]){
        try{
            $database = new SQLRequest();
            $db = $database->openConnection($database->get_server());
        
            // select a particular user by id
            $stm = $db->prepare("SELECT * FROM users WHERE username=:_1");
            $stm->execute(array('_1' => $_POST['loginname'])); 
            $user = $stm->fetch();
            //TEST if row was found: print_r($user);
           //echo $user['pass'];
           if ($user)
           {
            echo "user exists!\n";  
            //print_r($user);
           }
           if ($user['access'] == 'admin')
           {
                echo "user is admin\n";
        
            }
           if($_POST['loginpass'])
           {
               echo "password:".$_POST['loginpass'];
           }
           if (password_verify($_POST['loginpass'], $user['pass']))
           {
               echo "valid!";
           } else {
               echo "invalid";
           }
           
            $database->closeConnection();
        }
        catch (PDOException $e){
            echo "There is a problem connecting: " . $e->getMessage();
        }
    }
}



/* something like this for the hashed password...



$sql = "SELECT * FROM users WHERE username = ?";
$stm = $dbh->prepare($sql);
$result = $stm->execute([$_POST['username']]);
$users = $result->fetchAll();
if (isset($users[0]) {
    if (password_verify($_POST['password'], $users[0]->password) {
        // valid login
    } else {
        // invalid password
    }
} else {
    // invalid username
}
*/
?>