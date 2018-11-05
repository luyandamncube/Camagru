<?php
//insert picture upload (to server) script here
//security to check if it is indeed a picture
//upload picture from server back to upload.html
if (!isset($_SESSION['username']){
    header("Location: ../index.php");
}
?>
