<?php
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/store.php';
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
		<script src="../js/elements.js"></script>

	</head>

	<style>

		body{
			background-color : black;
		}
	</style>
	<body>
		<div>
			<div>
				<img class="container-8" src="../resources/logo1.png" class="links" 
				href="#"onclick="window.history.back()"></a>
			</div><br><br><br><br>

			<div class="camera" >
				<!-- OVERLAY 1 -->
				<div id="filter_overlay">
					<!-- new DOM images go here	-->
				</div>
				<!-- OVERLAY 2 -->
				<div id="camera_overlay"> 		
					<img alt="" id="upload_2" style="height : 400px; width : 400px; position : absolute;" src="">
						
						<div class="links container-10"style="opacity: 0.6; width: 100%; height: 50px;">
							<!-- Remove filter(s) -->
							<a  id="clear_all" class="links"href="#"  ><label>
								<input type="radio" name="filters" value="small"/>
								<i style= "opacity: 0.6;"class="fas fa-times-circle"></i>
							</label></a>
							<!-- Turn video on -->
							<a  id="video_click" class="links" href="#"  >
								<i id="video_button" style = "display :none;" class="fas fa-video"></i>
							</a>
							<!-- Upload picture -->
							<a id="upload_click" class="links"href="#"  ><div >		
								<input id="upload_button"    onchange="" 
								style="position: relative; font-size : 25px; width:25px; height:25px;" 
								type="file" name="upload_dp" accept="image/*" 
								id="upload_button" style= "opacity: 0.6; ;"class="fas fa-upload">
							</div></a>
						</div>

						<!-- filter_1 -->
						<div style=" width: 100%; height: 40px;"><label>
							<input id="filter_1" type="checkbox" name="filters" value="small" 
							/>
							<img class="choice" src="../filters/01.png">
						</label></div>

						<!-- filter_2 -->
						<div style="width: 100%; height: 40px;"><label>
							<input id="filter_2" type="checkbox" name="filters" value="small"/>
							<img class="choice" src="../filters/02.png">
						</label></div>

						<!-- filter_3 -->
						<div style="width: 100%; height: 40px;"><label>
							<input id="filter_3" type="checkbox" name="filters" value="small" />
							<img class="choice" src="../filters/03.png">
						</label></div>

						<!-- filter_4 -->
						<div style="width: 100%; height: 40px;"><label>
							<input id="filter_4" type="checkbox" name="filters" value="small" />
							<img class="choice" src="../filters/04.png">
						</label></div>

						<!-- filter_5 -->
						<div style=" width: 100%; height: 40px;"><label>
							<input id="filter_5"type="checkbox" name="filters" value="small" />
							<img class="choice" src="../filters/05.png">
						</label></div>

						<!-- filter_6 -->
						<div style="width: 100%; height: 40px;"><label>
							<input id="filter_6"type="checkbox" name="filters" value="small" />
							<img class="choice" src="../filters/06.png">
						</label></div>

						<!-- filter_7 -->
						<div style="width: 100%; height: 40px;"><label>
							<input id="filter_7"type="checkbox" name="filters" value="small" />
							<img class="choice" src="../filters/07.png">
						</label></div>

						</div>

						<div style= "height : 400px;" >
							<video style="    transform: rotateY(180deg);
							-webkit-transform:rotateY(180deg);
							-moz-transform:rotateY(180deg)"id="video" 
							width="400" height="400" src=""> </video>
						</div>
						<!-- Bottom buttons -->
						<div class= "container-10" style="height: 40px;">
							<a id="delete" class="links"href="#"><i class="fas fa-trash"></i></a>
							<a id="capture" class="links"href="#"> <i class="fas fa-camera"></i></a>
							<a id="save" class="links"href="#"><i class="fas fa-save"></i></a>
						</div>
						<canvas id="canvas" width="400" height="400"> </canvas>

				</div>
				
				<div id="camera_roll">
					<!-- new DOM images go here	-->
				</div>
				</form>

			</div>
    	
		<a class="links"href="https://github.com/luyandamncube"><div class="footer">© lmncube 2018</div></a>
		
    </body>
    </html>