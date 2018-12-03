<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	//echo "POST success";
	try{
		$database = new SQLRequest();
        $db = $database->openConnection();
        

        /*
        $stm = $db->prepare("SELECT * FROM images WHERE username=:_1 LIMIT 3 OFFSET ".$offset);
		$stm->execute(array(
			'_1' => $_SESSION['username'],
		)); 

		do {
			$user = $stm->fetch();
			if ($user){
				echo '<div>'; 
				echo '<img style="height : 20px; border-radius : 100%;"alt= "'.$user["username"]. '"src="data:image/png;base64,'.$_SESSION['dp'].'">';
				echo '<img class="camera_roll_pic" style="width : 100%;" src="data:image/png;base64,'.$user["picture"].'"/>';
				echo '<a onclick= "like_pic('.$user["pic_num"].')" id="'.$user["pic_num"].'"class="links" href="#" ><i style="font-size:20px;"class="fas fa-heart"></i></a>
				<a class="links" href="#" ><i style="font-size:20px;"class="fas fa-comment"></i></a>';
				echo '</div>'; 
			}
			
           } while ($user);
           */

        
        /*
        $stm = $db->prepare("INSERT INTO likes (username, likes) 
        VALUES (:_1, :_2)");
        //USE SINGLE QUOTES HERE!!!      
        //logins = logins + 1               
        $stm->execute(array(
        ':_1' => $_SESSION['username'], 
        ':_2' => $_POST['email'], 
        ));
        */
		$database->closeConnection();
	}catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
    } 
    
    ?>