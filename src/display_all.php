<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
//include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';

try{
	$database = new SQLRequest();
	$db = $database->openConnection();
	$stm = $db->prepare("SELECT * FROM images");
	//$stm->execute(array('_1' => $_SESSION['username'])); 

	do {
		$user = $stm->fetch();
		if ($user){
			echo '<img style="width : 100%;" src="data:image/png;base64,'.$user["picture"].'"/>';
		}
		
	   } while ($user);

	$database->closeConnection();
}catch (PDOException $e){
	echo "There is a problem connecting to the database: " . $e->getMessage();
}

?>