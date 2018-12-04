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
				$stm_2 = $db->prepare("SELECT * FROM likes WHERE username=:_1 AND pic_num=:_2 ");
				$stm_2->execute(array(
					'_1' => $_SESSION['username'],
					'_2' => $user['pic_num'],
				)); 
				$colors = $stm_2->fetch();
				$icon_color = $colors ? "pink": "white" ;
				//echo '<div>'; 
				echo '<img style="height : 25px; border-radius : 100%;"alt= "'.$user["username"]. '"src="data:image/png;base64,'.$_SESSION['dp'].'">';
				echo '<img class="camera_roll_pic" style="width : 100%;" src="data:image/png;base64,'.$user["picture"].'"/>';
				echo '<a class="links" href="#" ><i name= "like" id="'.$user["pic_num"].'"style="font-size:30px; color:'.$icon_color.'"class="fas fa-heart"></i></a>
				<a class="links" href="#" ><i name ="comment" style="font-size:30px;"class="fas fa-comment"></i></a>';
				echo '<textarea  class="textarea" style="float: right; background-color: rgb(82, 88, 108); width: 70%;"> </textarea>' ;
				echo '<br>'; 
			}
			
		   } while ($user);
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
	} 
}



?>