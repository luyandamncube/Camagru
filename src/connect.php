<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//include 'Connection.class.php';
include 'SQLRequest.class.php';
/* ABANDONED, DOESN'T WORK PROPERLY 
function is_empty_username($var, $post_var, $error){
    if (empty($post_var)){
        $error = "Name is required";
    }else{
        $var = test_input($post_var);
        echo "WHAT THE FUUUUCK";
    }
}
function is_empty_password($var, $post_var, $error){
    if (empty($post_var)){
        $error = "Password is required";
    }else{
        $var = test_input($post_var);
    }
}      
   
function is_valid_username($var, $error){
    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $var)){
        $error = "Username should contain English characters, be longer than 4 characters";
    }
}
*/  

?>