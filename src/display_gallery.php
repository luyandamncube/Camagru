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
		$stm = $db->prepare("SELECT * FROM images LIMIT 3 OFFSET ".$offset);
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

				$id = substr($user["pic_num"], strlen($_SESSION['username'])+1);
				$art_id = "art".$id;				echo '<article id="'.$art_id.'">';
				echo '<img style="height : 40px; width : 40px; border-radius : 100%;"alt= "'.$user["username"]. '"src="data:image/png;base64,'.$_SESSION['dp'].'">';
				//echo '<text style = "color : white; font-size : 10px"> @'.$_SESSION['username'].'</text>';
				echo'<a style="vertical-align: bottom; float: right; "class="links" href="#/" ><i name ="delete" style="font-size:20px;"class="fas fa-times"></i></a>';
				echo '<img class="camera_roll_pic" style="width : 100%;" src="data:image/png;base64,'.$user["picture"].'"/>';
				
				//echo '<div style="width:100px ; ">';
				echo '<a class="links" href="#/" ><i id="'.$user["pic_num"].'"name= "like" style="font-size:20px; color:'.$icon_color.'"class="fas fa-heart"></i></a>';
				if (intval($user['likes']) > 0){
					echo '<b style = "font-size : 18px; color : white;"> '.$user['likes']. '</b>';
				}
				//id="'.$user["pic_num"].'"
				echo'<a class="links" href="#/" ><i id="'.$user["pic_num"].'_" name ="comment" style="font-size:20px;"class="fas fa-comment"></i></a>';
				if (intval($user['comments']) > 0){
					echo '<b style = "font-size : 18px; color : white;"> '.$user['comments']. '</b>';
				}
				//echo '</div>';
				echo '<textarea id="'.$user["pic_num"].'_1" name="comments" style="display: none ;height: 100px;width : 100%"class="textarea"></textarea>';
				echo '<input id="'.$id.'" style= "border-radius: 10px; color: white; font-color: white; border-width:0px; border:none; background-color: rgb(82, 88, 108); height: 22px; width: 200px;" placeholder=" Write a comment">  </input>' ;
				echo '<a class= "links" href="#/"> <b name="post_comment" style = "font-size : 20px; color : white;"> post </b> </a>';
				echo "</article>";
				echo '<br>'; 
			}
			
		   } while ($user);
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
	} 
}



?>