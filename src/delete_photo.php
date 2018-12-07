<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}

// echo "entered php";
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
// echo "POST success";
	try{
        $database = new SQLRequest();
        $db = $database->openConnection();
		
        //delete image from images table
        $stm = $db->prepare("DELETE FROM images WHERE pic_num=:_1 ");
		$stm->execute(array(
			'_1' => $_POST["pic_num"],
        ));
         
        //delete likes from likes table
        $stm = $db->prepare("DELETE FROM likes WHERE pic_num=:_1 ");
        $stm->execute(array(
            '_1' => $_POST["pic_num"],
        )); 
        //delete comments from comments table
        $stm = $db->prepare("DELETE FROM likes WHERE pic_num=:_1 ");
        $stm->execute(array(
            '_1' => $_POST["pic_num"],
        )); 
        // $user = $stm->fetch();
      
        $database->closeConnection();

    }catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
    } 
}