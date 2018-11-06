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
	<body>
		<div>
			<a class="links" href="#"onclick="window.history.back()"><img class="container-8" src="../resources/logo1.png"></a>

		</div>
		<div class="camera" >
				<div id="filter_overlay">
					<img id="new_filter" src="" style="width : 100%" hidden="true">
					
				</div>
				<div id="camera_overlay"> 		

					<div class="links container-10"style="opacity: 0.6; width: 100%; height: 50px;">
							<label>
									<input type="radio" name="filters" value="small" onclick="apply_filter('')"/>
									<i style= "opacity: 0.6;"class="fas fa-times-circle"></i>
							</label>
							<div>
								<a class="links"href="#">
										<input  onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0])" style="font-size : 25px; width:25px; height:25px;" type="file" name="upload_dp" style= "position: relative;"accept="image/*"
										<i style= "opacity: 0.6; ;"class="fas fa-upload"></i>
								</a>
								
							</div>
							
							<!-- 
								<div  class="container-13" style="position: absolute; width: 150px; height: 150px;border-radius: 100%;">	
									<a href="#" ><i style="font-size:150px;"class="fas fa-upload"></i></a>
									
								</div>
								<img alt="" id="blah" style="height : 150px; width : 150px;border-radius: 100%;" src="">					
							-->
					</div>
					<div style=" width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/101.png')"/>
							<img class="choice" src="../filters/01.png">
						</label>
					</div>
					<div style="width: 100%; height: 40px;">	
						<label>
								<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/102.png')"/>
								<img class="choice" src="../filters/02.png">
						</label>

					</div>
					<div style="width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/103.png')"/>
							<img class="choice" src="../filters/03.png">
						</label>
					</div>
					<div style="width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/104.png')"/>
							<img class="choice" src="../filters/04.png">
						</label>
					</div>
					<div style=" width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/105.png')"/>
							<img class="choice" src="../filters/05.png">
						</label>
					</div>
					<div style="width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/106.png')"/>
							<img class="choice" src="../filters/06.png">
						</label>
					</div>
					<div style="width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/107.png')"/>
							<img class="choice" src="../filters/07.png">
						</label>
					</div>

				</div>
				<img alt="" id="upload_2" style="height : 400px; width : 400px; position : absolute;" src="">	
				<video style="    transform: rotateY(180deg);
				-webkit-transform:rotateY(180deg);
				-moz-transform:rotateY(180deg)"id="video" width="400" height="400" src=""> </video>
				
				<a id="capture" class="links"href="#"> <div id="capture-button"class="container-4"> Capture </div>  </a>

				<canvas id="canvas" width="400" height="400"> </canvas>
			</div>

			<div id="camera_roll">
				<!--
					new DOM images go here
				-->
				<div style="width : 80px; height : 60px; background-color : beige; border-color : black;"> </div>
				
				
			</div>	
			<!--
			<div>
				<ol id="camera_roll">
					<li>
						<h4> createElement() </h4>
					</li>
					<li>
						<h4> appendChild() </h4>
					</li>
					<li>
						<h4> insertBefore() </h4>
					</li>
					<li>
						<h4> removeChild() </h4>
					</li>
				</ol>
			</div>
			-->

		</div>
		<script src="../js/camera.js"></script>
    	<a class="links"href="https://github.com/luyandamncube"><div class="footer">© lmncube 2018</div></a>
		
    </body>
    </html>