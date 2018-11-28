<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

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

				//225/400 * (400)
								//($dst_image , $src_image , $dst_x , $dst_y , $src_x , $src_y , $dst_w , $dst_h , $src_w , $src_h )
				imagecopyresampled ($dest , $image_1 , 0 , 0, 0 , 0, $image_width, $image_height, $image_width  ,$image_height);
				imagepng($dest, "tester.png");
				//echo "filter ".$k." selected";
			}
		}
	}else{
		echo "error occured";
	}
}

?>
