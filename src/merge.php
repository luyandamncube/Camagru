<?php
/*
$image_1 = imagecreatefrompng('image_1.png');
$image_2 = imagecreatefrompng('image_2.png');
imagealphablending($image_1, true);
imagesavealpha($image_1, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 100, 100);
imagepng($image_1, 'image_3.png');
*/
//var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] === 'POST'){

	//echo '<img src="'.$im.'"/>';
    var_dump($_POST);
        //if (strpos($_POST['current'], "base64"))
    $data = explode( ',', $_POST['current']);

    $new = preg_replace('/\s+/', '', $data[1]);
    // echo $new;
    file_put_contents('temp.png', base64_decode($new));
	///header('Content-Type: image/png');
    //$temp = base64_decode($new);
    // $newer = imagecreatefromstring($temp);
    //imagepng("./tester.png", $newer);
        //imagealphablending($im, true);
        //imagesavealpha($im, true);
        //imagepng("./tester.png", $im);

/*
	if ($test !== false) {
		//header('Content-Type: image/png');
		//imagepng($im);
	   // echo '<img src="data:image/png;base64, '.$im.'"/>';

	   //MERGE
	   $x = 400;
	   $y = 400;
	   $final_img = imagecreate($x, $y); // where x and y are the dimensions of the final image
	   //imagecopy($data, $final_img, 0, 0, 0, 0, $x, $y);
	   if ($_POST['filter_1']){
		   $image_1 = imagecreatefrompng($_POST['filter_1']);
		   imagecopy($image_1, $final_img, 0, 0, 0, 0, $x, $y);
		   echo "filter 1 selected";
		}
		if ($_POST['filter_2']){
		$image_2 = imagecreatefrompng($_POST['filter_2']);
		imagecopy($image_2, $final_img, 0, 0, 0, 0, $x, $y);
		echo "filter 2 selected";
		}
		if ($_POST['filter_3']){
			$image_3 = imagecreatefrompng($_POST['filter_3']);
			imagecopy($image_3, $final_img, 0, 0, 0, 0, $x, $y);
			echo "filter 3 selected";
		}
		if ($_POST['filter_4']){
			$image_4 = imagecreatefrompng($_POST['filter_4']);
			imagecopy($image_4, $final_img, 0, 0, 0, 0, $x, $y);
			echo "filter 4 selected";
		}
		if ($_POST['filter_5']){
			$image_5 = imagecreatefrompng($_POST['filter_5']);
			imagecopy($image_5, $final_img, 0, 0, 0, 0, $x, $y);
			echo "filter 5 selected";
		}
		if ($_POST['filter_6']){
			$image_6 = imagecreatefrompng($_POST['filter_6']);
			imagecopy($image_6, $final_img, 0, 0, 0, 0, $x, $y);
			echo "filter 6 selected";
		}
		if ($_POST['filter_7']){
			$image_7 = imagecreatefrompng($_POST['filter_7']);
			imagecopy($image_7, $final_img, 0, 0, 0, 0, $x, $y);
			echo "filter 7 selected";
		}

	   imagealphablending($final_img, false);
	   imagesavealpha($final_img, true);

	   //header('Content-Type: image/png');
	   //imagepng($final_img);
	   //echo '<img src="'.$final_img.'"/>';
		//imagedestroy($im);
	}else{
		echo "error occured";
	}
	//echo '<img src="data:image/png;base64, '.$im.'/>';

&*/

}

?>
