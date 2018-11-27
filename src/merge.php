<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	$x = 400;
	$y = 400;
	var_dump($_POST);
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
				$image_1 = imagecreatefrompng($_POST[$filter_name ]);
				imagecopyresampled ($dest , $image_1 , 0 , 0, 0 , 0, 400, 400, 400 ,400);
				imagepng($dest, "tester.png");
				echo "filter ".$k." selected";
			}
		}
	}else{
		echo "error occured";
	}
}

?>
