<?php
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
	if ($_SESSION['username'] == 'guest'){
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<link rel="shortcut icon" typ="image/png" href="../resources/favicon.png"/>
		<link rel="stylesheet" type="text/css"href="../font/web-fonts-with-css/css/fontawesome-all.min.css"><!--load all styles -->
	</head>
	<title>Capture</title>
	<link rel="stylesheet" href="../css/style.css">
	<style>
		body{
			background-color : black;
		}
	</style>
	<body>


		<div>
			<div>
				
				<img class="container-8" src="../resources/logo1.png" class="links" href="#"onclick="window.history.back()"></a>

			</div><br><br><br><br>

			<div class="camera" >
					<div id="filter_overlay">
						<img id="new_filter" src="" style="width : 100%" hidden="true">
						
					</div>
					<div id="camera_overlay"> 		

						<div class="links container-10"style="opacity: 0.6; width: 100%; height: 50px;">
							<a class="links"href="#" onclick="" ><label>
								<input type="radio" name="filters" value="small" onclick="apply_filter('')"/>
								
								<i style= "opacity: 0.6;"class="fas fa-times-circle"></i>
								</label></a>
								<a class="links" href="#" onclick="" ><div>
									<i id="video_button" style = "display :none;" class="fas fa-video"></i>
								</div></a>
								
								<a id="upload_button" class="links"href="#" onclick="" ><div>
									
											<input  onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0])" 
											style="position: relative; font-size : 25px; width:25px; height:25px;" 
											type="file" name="upload_dp" accept="image/*" 
											id="upload_button" style= "opacity: 0.6; ;"class="fas fa-upload">
									
									
								</div></a>
						</div>
						<div style=" width: 100%; height: 40px;">
							<label>
								<input id="filter_1" type="radio" name="filters" value="small" onclick="apply_filter('../filters/101.png')"/>
								<img class="choice" src="../filters/01.png">
							</label>
						</div>
						<div style="width: 100%; height: 40px;">	
							<label>
									<input id="filter_2" type="radio" name="filters" value="small" onclick="apply_filter('../filters/102.png')"/>
									<img class="choice" src="../filters/02.png">
							</label>

						</div>
						<div style="width: 100%; height: 40px;">
							<label>
								<input id="filter_3" type="radio" name="filters" value="small" onclick="apply_filter('../filters/103.png')"/>
								<img class="choice" src="../filters/03.png">
							</label>
						</div>
						<div style="width: 100%; height: 40px;">
							<label>
								<input id="filter_4" type="radio" name="filters" value="small" onclick="apply_filter('../filters/104.png')"/>
								<img class="choice" src="../filters/04.png">
							</label>
						</div>
						<div style=" width: 100%; height: 40px;">
							<label>
								<input id="filter_5"type="radio" name="filters" value="small" onclick="apply_filter('../filters/105.png')"/>
								<img class="choice" src="../filters/05.png">
							</label>
						</div>
						<div style="width: 100%; height: 40px;">
							<label>
								<input id="filter_6"type="radio" name="filters" value="small" onclick="apply_filter('../filters/106.png')"/>
								<img class="choice" src="../filters/06.png">
							</label>
						</div>
						<div style="width: 100%; height: 40px;">
							<label>
								<input id="filter_7"type="radio" name="filters" value="small" onclick="apply_filter('../filters/107.png')"/>
								<img class="choice" src="../filters/07.png">
							</label>
						</div>

					</div>
					<img alt="" id="upload_2" style="height : 400px; width : 400px; position : absolute;" src="">	


					<div style= "height : 400px;" >
						<video style="    transform: rotateY(180deg);
						-webkit-transform:rotateY(180deg);
						-moz-transform:rotateY(180deg)"id="video" width="400" height="400" src=""> </video>
					</div>

					<div class= "container-10" style="height: 40px;">
						
						<a id="delete" class="links"href="#"><i class="fas fa-trash"></i></a>
						<a id="capture" class="links"href="#"> <i class="fas fa-camera"></i></a>
						<a id="save" class="links"href="#"><i class="fas fa-save"></i></a>
					</div>
					<canvas id="canvas" width="400" height="400"> </canvas>
				</div>

				<div id="camera_roll">
					<!--
						new DOM images go here
					-->
				</div>	

			</div>
		

		<script src="../js/camera.js"></script>
		<script src="../js/elements.js"></script>
    	<a class="links"href="https://github.com/luyandamncube"><div class="footer">© lmncube 2018</div></a>
		
    </body>
    </html>