<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}

// echo "entered php";
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	// echo "POST success";
	//
	$comment = $_POST['comment'];
	$pic_num = $_POST['pic_num'];
	$len = strlen($pic_num);
	var_dump($_POST);
	//echo $_POST['username'];
	
	if (substr_count($pic_num, '_') > 1) {
		$pic_num =substr($pic_num, 0, $len -1);
	}
	
	try{
		$database = new SQLRequest();
        $db = $database->openConnection();
 
		$stm = $db->prepare("INSERT INTO comments (pic_num, username, comment) 
								VALUES (:_1, :_2, :_3)");
		$stm->execute(array(
			':_1' => $pic_num , 
			':_2' => $_SESSION['username'], 
			':_3' => $_POST['comment'], 
		));	

		$stm = $db->prepare("UPDATE images
							SET comments = comments + 1 
							WHERE pic_num = :_1");
		$stm->execute(array(
			':_1' => $pic_num, 
		));	
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
	}
}

?>