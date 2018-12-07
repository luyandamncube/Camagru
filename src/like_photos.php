<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}


//echo "entered php";
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
//echo "POST success";
// var_dump($_POST);

	try{
		$database = new SQLRequest();
        $db = $database->openConnection();
		
        //var_dump($_POST);
        $stm = $db->prepare("SELECT * FROM likes WHERE pic_num=:_1 ");
		$stm->execute(array(
			'_1' => $_POST['pic_num'],
		)); 
		$user = $stm->fetch(); 
		//echo "db: " .$user['pic_num']." post: ".$_POST['pic_num'] ;
        if ($user['pic_num'] != $_POST['pic_num']){
			//Add new like if it doesn't already exist
			$stm = $db->prepare("INSERT INTO likes (username, pic_num) 
								VALUES (:_1, :_2)");
			$stm->execute(array(
				':_1' => $_SESSION['username'], 
				':_2' => $_POST['pic_num'], 
			));	

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