<?php
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}
if (isset($_POST["user"]))
{
    $database = new SQLRequest();
    $pdo = $database->openConnection();

    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username`=:uname");
    $stmt->bindParam(":uname", trim($_POST["user"]), PDO::PARAM_STR, 255);
    $stmt->execute();

    if ($stmt->rowCount() != 1)
    {
        echo json_encode(array(
            "status" => "failure", 
            "message" => "No user found"
        ));
        exit();
    }

    $database->closeConnection();
}

?>