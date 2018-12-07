<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';

$offset = $_POST['pages'] * 3;
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	// echo "POST success";
	// var_dump($_POST);
	try{
		$database = new SQLRequest();
		$db = $database->openConnection();
		$stm = $db->query("SELECT * FROM images LIMIT 3 OFFSET ".$offset);
		
		do {
			$image = $stm->fetch();
			if ($image){
			$stm_2 = $db->prepare("SELECT * FROM users WHERE username=:_1 ");	
			$stm_2->execute(array(
				'_1' => $image['username'],
			));	
			$users = $stm_2->fetch();
			//var_dump($users);
			$id = substr($image["pic_num"], strlen($image['username'])+1);
			$art_id = "art".$id;
			echo '<article id="'.$art_id.'">';
			echo '<img style="height : 40px; border-radius : 100%;"alt= "'.$image["username"].'"src="data:image/png;base64,'.$users['avatar'].'">';
			echo '<img class="camera_roll_pic" style="width : 100%;" src="data:image/png;base64,'.$image["picture"].'"/>';
			echo '<i id="'.$image["pic_num"].'"name= "like" style="font-size:20px; color: white"class="fas fa-heart"></i>';
			if (intval($image['likes']) > 0){
				echo '<b style = "font-size : 18px; color : white;"> '.$image['likes']. '</b>';
			}
			echo'<a class="links" href="#/" ><i id="'.$image["pic_num"].'_" name ="comment" style="font-size:20px;"class="fas fa-comment"></i></a>';
			if (intval($image['comments']) > 0){
				echo '<b style = "font-size : 18px; color : white;"> '.$image['comments']. '</b>';
			}
			echo '<textarea id="'.$image["pic_num"].'_1" name="comments" style="display: none ;height: 100px;width : 100%"class="textarea"></textarea>';
			echo "</article>";
			echo '<br>'; 
			}

			
		   } while ($image);
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
	} 
}



?>