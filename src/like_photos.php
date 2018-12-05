<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}

//echo "entered php";
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
//echo "POST success";
	try{
		$database = new SQLRequest();
        $db = $database->openConnection();
		
        var_dump($_POST);
        $stm = $db->prepare("SELECT * FROM likes WHERE username=:_1 ");
		$stm->execute(array(
			'_1' => $_SESSION['username'],
		)); 
		$user = $stm->fetch(); 
        if ($user['pic_num'] != $_POST['pic_num']){
			//Add new like if it doesn't already exist
			$stm = $db->prepare("INSERT INTO likes (username, pic_num) 
								VALUES (:_1, :_2)");
			$stm->execute(array(
				':_1' => $_SESSION['username'], 
				':_2' => $_POST['pic_num'], 
			));	
			/*
				UPDATE mytable 
				SET logins = logins + 1 
				WHERE id = 12
			*/
			$stm = $db->prepare("UPDATE images
								SET likes = likes + 1 
								WHERE pic_num = :_1");
			$stm->execute(array(
			':_1' => $_POST['pic_num'], 
			));	
		}
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
    } 
}

?>