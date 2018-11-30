<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}
$offset = $_POST['pages'] * 3;

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	//echo "POST success";
	try{
		$database = new SQLRequest();
		$db = $database->openConnection();
		$stm = $db->prepare("SELECT * FROM images WHERE username=:_1 LIMIT 3 OFFSET ".$offset);
		$stm->execute(array(
			'_1' => $_SESSION['username'],
		)); 
	
		do {
			$user = $stm->fetch();
			if ($user){
				echo '<img class="camera_roll_pic" style="width : 100%;" src="data:image/png;base64,'.$user["picture"].'"/>';
			}
			
		   } while ($user);
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
	}
}



?>