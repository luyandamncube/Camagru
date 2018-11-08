<?php
	//include 'apply_settings.php';
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/apply_settings.php';
	if ($_SESSION['username'] == 'guest'){
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Settings</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../js/elements.js"></script>
		<link rel="shortcut icon" typ="image/png" href="../resources/favicon.png"/>
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" type="text/css"
		href="../font/web-fonts-with-css/css/fontawesome-all.min.css">
	</head>

	<body>
		<div>
			<a class="links" href="home.php" > <img class="container-8" src="../resources/logo1.png"></a>
			
		</div>
		<div class="container-2"><?php echo $_SESSION['username']?>'s </div>
			<div class="text2 container-3"> PROFILE </div><br>

		<form enctype="multipart/form-data" action="
		<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"name="" method="POST">
			<!-- DISPLAY PICTURE -->
			<div style= "display: flex; justify-content: center; "> 
				<div>
					<!-- OVERLAY UPLOAD -->
					<div  class="container-13" style="position: absolute; width: 150px; height: 150px;border-radius: 100%;">
						<a href="#" ><i style="font-size:150px;"class="fas fa-upload"></i></a>
						<input  onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0])" 
						style="width:150px; position: absolute; " type="file" name="upload_dp" class= "upload_dp"accept="image/*">
					</div>
					<img alt="" id="upload_1" style="height : 150px; width : 150px;border-radius: 100%;" src="">					
					<?php 
						$image_pre = '<img style="height : 150px; width : 150px; border-radius: 100%;" src="data:image/jpg;base64,';
						echo $image_pre.$current_dp.'"/>';?>
				</div>
			</div><br>

			<!-- USER NAME -->
			<div style= "display: flex; justify-content: center;"> 
				<a href="#" class="links"onclick="clickme('change_username', '<?php echo $_SESSION['username']?>')"> 
				<i style="font-size: calc(4px + 1vw + 1vh);"class="fas fa-edit"></i></a>
				<textarea name="new_username" class="textarea" id='change_username' 
				disabled style="enabled: false; background-color: #1F222B;"> <?php echo $_SESSION['username']?></textarea> 
			</div>
			<div class="container-11"><?php echo $new_userErr?></div>

			<!-- EMAIL ADDRESS -->
			<div style= "display: flex; justify-content: center;"> 
			<?php $temp_email = $_SESSION['email'];?>
				<a href="#" class="links"onclick="clickme('change_email', '<?php echo $_SESSION['email']?>')"> 
				<i style="font-size: calc(4px + 1vw + 1vh);" class="fas fa-edit"></i></a>
				<textarea name="new_email" placeholder= "Change email" class="textarea" id='change_email' 
				disabled style="enabled: false; background-color: #1F222B;"> <?php echo $_SESSION['email']?></textarea> 
			</div>
			<div class="container-11"><?php echo $new_emailErr?></div>

			<div style= "display: flex; justify-content: center; "> 
				<a href="#" class="links"onclick="clickme('change_pass', '<?php echo $_SESSION['pass']?>'); "> 
				<i style="font-size: calc(4px + 1vw + 1vh);" class="fas fa-edit"></i></a>
				<input type ="password" placeholder= "Change Password" name="new_password" class="textarea"
				 id='change_pass' disabled style="enabled: false; background-color: #1F222B;"> </input> 
			</div>
			<div class="container-11"><?php echo $new_passwordErr?></div>

	
			<div class="container-4"><input class="submit_banner" type="submit" value="Apply changes"></div>
		</form>
			<div class="container-11"><?php echo $message?></div>

		
		<a class="links"href="https://github.com/luyandamncube"><div class="footer">© lmncube 2018</div></a>

	</body>
	
</html>
        