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
        
            $select = $db->prepare("SELECT * FROM users WHERE username=:username");
        
            // no idea what this was doing
            //$select->setFetchMode();
            $select->bindParam(':username', $loginame);
            $select->execute();
            if(password_verify($loginpass, $row['pass']) ){
        
                    //$_SESSION['email'] = $data['email'];
                   //$_SESSION['name']  = $data['name'];
                    header("location:profile.php"); 
                    exit;
                } else {
                    echo "invalid email or pass";
                }
        }
        catch (PDOException $e){
            echo "There is a problem connecting: " . $e->getMessage();
        }
    }
}



/* something like this for the hashed password...



$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute([$_POST['username']]);
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