<?php
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
	//include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/merge.php';
	if ($_SESSION['username'] == 'guest'){
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Capture</title>
		<link rel="stylesheet" href="../css/style.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" typ="image/png" href="../resources/favicon.png"/>
		<link rel="stylesheet" type="text/css"
		href="../font/web-fonts-with-css/css/fontawesome-all.min.css">
		<script src="../js/camera.js"></script>
	</head>
	<style>
		body{
			background-color : ;/*rgb(14, 15, 17);*/
		}
	</style>
	<body>
		<div>
			<div>
				<img class="container-8" src="../resources/logo1.png" class="links" 
				href="#"onclick="window.history.back()"></a>
			</div>
				<div class="container-10"style=" margin: 0 auto; width: 400px;">
					<!-- Remove filter(s) -->
					<a id="clear_all" class="links"href="#"><i class="fas fa-times-circle"></i></a>
					<!-- Turn video on -->
					<a  id="video_click" class="links" href="#"  >
						<i id="video_button" style = "display :none;" class="fas fa-video"></i>
					</a>
					<!-- Upload picture -->
					<a id="upload_click" class="links" href="#"  >		
						<input id="upload_button" style="position: relative; font-size : 25px; 
								width:25px; height:25px;" type="file" accept="image/*" class="fas fa-upload">
					</a>
				</div>


			<div class="camera" >
				<!-- OVERLAY 1 -->
				<div style="  transform: rotateY(180deg);
    -webkit-transform:rotateY(180deg); /* Safari and Chrome */
    -moz-transform:rotateY(180deg); /* Firefox */" id="filter_overlay">
					<!-- new DOM images go here	-->
				</div>
				<!-- OVERLAY 2 -->
				<div id="camera_overlay"> 		
					
				<!-- Top buttons -->
				<div class="container-10"style=" width: 100%; height: 50px;padding-bottom: 330px">

				</div>
				<!-- Filter buttons -->
				<div class= "container-12" style="width: 100%; height: 40px;"><label>
					<!-- filter_1 -->
					<label>
						<input id="filter_1" type="checkbox" name="filters" value="small"/>
						<img id="filt_1" class="choice" src="../filters/01.png">
					</label>

					<!-- filter_2 -->
					<label>
						<input id="filter_2" type="checkbox" name="filters" value="small"/>
						<img id="filt_2" class="choice" src="../filters/02.png">
					</label>
					<!-- filter_3 -->
					<label>
						<input id="filter_3" type="checkbox" name="filters" value="small" />
						<img id="filt_3" class="choice" src="../filters/03.png">
					</label>
					<!-- filter_4 -->
					<label>
						<input id="filter_4" type="checkbox" name="filters" value="small" />
						<img id="filt_4" class="choice" src="../filters/04.png">
					</label>
					<!-- filter_5 -->
					<label>
						<input id="filter_5"type="checkbox" name="filters" value="small" />
						<img id="filt_5" class="choice" src="../filters/05.png">
					</label>
					<!-- filter_6 -->
					<label>
						<input id="filter_6"type="checkbox" name="filters" value="small" />
						<img id="filt_6" class="choice" src="../filters/06.png">
					</label>
					<!-- filter_7 -->
					<label>
						<input id="filter_7"type="checkbox" name="filters" value="small" />
						<img id="filt_7" class="choice" src="../filters/07.png">
					</label>
				</div>
			</div>

			<div style= "height : 400px;" >
				<video style=""id="video" 
						width="400" height="300" src="">
				</video>
				<img alt="" id="upload_2" style="height : 400px; 
				width : 400px; position : absolute; z-index: -20;" hidden="true"src="">
			</div>
			<!-- Bottom buttons -->
			<div class= "container-10" style="height: 40px;">
				<a id="delete" class="links"href="#"><i class="fas fa-trash"></i></a>
				<a id="capture" class="links"href="#"><i class="fas fa-camera"></i></a>
	
				<a id="save" class="links"href="#"><i class="fas fa-save"></i></a>
			</div>
			<div id="status"></div>
			<canvas id="canvas" width="400" height="300"> </canvas>

		</div>
		<div id="camera_roll">
			<!-- new DOM images go here	-->
			
		</div>
	
    	
<a class="links"href="https://github.com/luyandamncube"><div class="footer">© lmncube 2018</div></a>
		
    </body>
    </html>