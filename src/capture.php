<?php
	include '../setup.php';
?>
<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<link rel="shortcut icon" typ="image/png" href="../resources/favicon.png"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><!--load all styles -->
	</head>
	<title>Capture</title>
	<link rel="stylesheet" href="../css/style.css">
	<body>
		<div>
			<a class="links" href="#"onclick="window.history.back()"><img class="container-8" src="../resources/logo1.png"></a>

		</div>
		<div class="camera" >
				<div id="filter_overlay">
					<img id="new_filter" src="" style="width : 35%" hidden="true">
				</div>
				<div id="camera_overlay"> 		
					<div style="width: 100%; height: 40px;">	
						<div style="color: white; font-size : 25px; text-align: center" > Click on a picture to save it </div>
					</div>
					<div class="container-10"style="background-color:orange; opacity: 0.6; width: 100%; height: 40px;">
							<label>
									<input type="radio" name="filters" value="small" onclick="apply_filter('')"/>
									<i class="fas fa-times-circle"></i>
							</label>
							<a class="links"href="#" onclick="upload.php"><i class="fas fa-upload"></i> </a>
					</div>
					<div style="background-color:purple; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/01.png')"/>
							<img class="choice" src="../filters/01.png">
						</label>
					</div>
					<div style="background-color:green; opacity: 0.6; width: 100%; height: 40px;">	
						<label>
								<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/02.png')"/>
								<img class="choice" src="../filters/02.png">
						</label>

					</div>
					<div style="background-color:aqua; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/03.png')"/>
							<img class="choice" src="../filters/03.png">
						</label>
					</div>
					<div style="background-color:orange; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/04.png')"/>
							<img class="choice" src="../filters/04.png">
						</label>
					</div>
					<div style="background-color:purple; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/05.png')"/>
							<img class="choice" src="../filters/05.png">
						</label>
					</div>
					<div style="background-color:green; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/06.png')"/>
							<img class="choice" src="../filters/06.png">
						</label>
					</div>
					<div style="background-color:aqua; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/07.png')"/>
							<img class="choice" src="../filters/07.png">
						</label>
					</div>
					<div style="background-color:orange; opacity: 0.6; width: 100%; height: 40px;">
						<label>
							<input type="radio" name="filters" value="small" onclick="apply_filter('../filters/08.png')"/>
							<img class="choice" src="../filters/08.png">
						</label>
					</div>
				</div>
				<video style="    transform: rotateY(180deg);
				-webkit-transform:rotateY(180deg);
				-moz-transform:rotateY(180deg)"id="video" width="400" height="400" src=""> </video>
				<a id="capture" class="links"href="#"> <div id="capture-button"class="text2 container-4"> Capture </div>  </a>

				<canvas id="canvas" width="400" height="400"> </canvas>
			</div>

			<div id="camera_roll">
				<!--
					new DOM images go here
				-->
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