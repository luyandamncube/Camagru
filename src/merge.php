<?php
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	//var_dump($_POST);
	//retrieve dimensions of image
	$list =getimagesize($_POST['current']);
	$w = 400;
	$h = 300;
	$image_width = $list[0];
	$image_height = $list[1];
	if(strpos($_POST['current'],"image/png")){
		$dest = imagecreatefrompng($_POST['current']);
	}
	if(strpos($_POST['current'],"image/jpeg")){
		$dest = imagecreatefromjpeg($_POST['current']);
	}
	if(strpos($_POST['current'],"image/gif")){
		$dest = imagecreatefromgif($_POST['current']);
	}
	if(strpos($_POST['current'],"image/bmp")){
		$dest = imagecreatefrombmp($_POST['current']);
	}
	if ($dest !== false) {
		for ($k = 1; $k < 8; $k++){
			$filter_name = "filter_".$k;
			if ($_POST[$filter_name]){
				$new_width = $image_width/$w * $w;
				$new_height = $image_width/$w  * $h;
				$image_1 = imagecreatefrompng($_POST[$filter_name]);
				$image_1 = imagescale($image_1, $image_width, -1);
				//($dst_image , $src_image , $dst_x , $dst_y , $src_x , $src_y , $dst_w , $dst_h , $src_w , $src_h )
				imagecopyresampled ($dest , $image_1 , 0 , 0, 0 , 0, $image_width, $image_height, $image_width  ,$image_height);

			}
		}
	}else{
		echo "error occured";
	}
	//try store in db??
	$directory = "./tester".$_SESSION["username"].".png";
	imagepng($dest, $directory);
	try{
		//$image = fopen($filePath, 'rb');
		$database = new SQLRequest();
		$db = $database->openConnection();
		//If there are no variables going to be used in the query

		$actual_file = file_get_contents($directory);
		$actual_file = base64_encode($actual_file);
		//if ($user['username'] == $user_name){
		$photo_id = $_SESSION['username']."_".$_POST['photo_id'];
		//echo $photo_id;
			$stm = $db->prepare("INSERT INTO images (pic_num, username, picture, likes) 
			VALUES (:_1, :_2, :_3, :_4)");
			//USE SINGLE QUOTES HERE!!!                    
			$stm->execute(array(
			':_1' => $photo_id,
			':_2' => $_SESSION['username'], 
			':_3' => $actual_file, 
			':_4' => 0, 
			));  
		$database->closeConnection();
		echo json_encode(array("username" => $_SESSION["username"], "status" => "success", "src" => $actual_file));
	} catch (PDOException $e){
		echo json_encode(array("username" => $_SESSION["username"], "status" => "There is a problem connecting: " . $e->getMessage()));
	}      
	unlink($directory );
}

?>
