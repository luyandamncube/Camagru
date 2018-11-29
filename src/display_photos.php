<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';

try{
	$database = new SQLRequest();
	$db = $database->openConnection();
	$stm = $db->prepare("SELECT * FROM images WHERE username=:_1");
	$stm->execute(array('_1' => $_SESSION['username'])); 

	do {
		$user = $stm->fetch();
		if ($user){
			echo '<img src="data:image/png;base64,'.$user["picture"].'"/>';
		}
		
	   } while ($user);
	
	
//	echo '<img src="data:image/png;base64,'.base64_encode($user["picture"]).'"/>';

	/*
	while ($user){
		$user = $stm->fetch();
		echo '<img src="data:image/png;base64,'.base64_encode($user["picture"]).'"/>';
	}*/

	//while ($user){
	//	$user = $stm->fetch();
	//}
	//$num_photos ;
	$database->closeConnection();
}catch (PDOException $e){
	echo "There is a problem connecting to the database: " . $e->getMessage();
}

?>