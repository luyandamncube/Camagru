<?php
	include 'apply_settings.php';
?>
<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<link rel="shortcut icon" typ="image/png" href="../resources/favicon.png"/>
		<link rel="stylesheet" type="text/css"href="../font/web-fonts-with-css/css/fontawesome-all.min.css"><!--load all styles -->
	</head>
	<title>Settings</title>
	<link rel="stylesheet" href="../css/style.css">
	<body>
		<div>
			<a class="links" href="#"onclick="window.history.back()"> <img class="container-8" src="../resources/logo1.png"></a>
			
		</div>
		<div class="container-2"><?php echo $_SESSION['username']?>'s </div>
			<div class="text2 container-3"> PROFILE </div><br>
		<div style= "display: flex; justify-content: center; "> <img style="height : 200px; width : 200px;border-radius: 100%;" src="../resources/placeholder.jpg"> </div><br>
		
		<div style= "display: flex; justify-content: center; color: white; font-size: calc(4px + 1vw + 1vh);"> 
			joined: <textarea class="textarea" disabled style="enabled: false; background-color: #1F222B;"> <?php echo $_SESSION['creation_date']?></textarea> 
			
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"name="" method="POST">
			

			<div style= "display: flex; justify-content: center; "> 
				<a href="#" class="links"onclick="clickme('change_username', ' Change username')"> <i style="font-size: calc(4px + 1vw + 1vh);"class="fas fa-edit"></i></a>
				<textarea name="new_username" class="textarea" id='change_username' disabled style="enabled: false; background-color: #1F222B;"> <?php echo $_SESSION['username']?></textarea> 
			</div>
			<div class="container-11"><?php echo $new_userErr?></div>



			<div style= "display: flex; justify-content: center; "> 
			<?php $temp_email = $_SESSION['email'];?>
				<a href="#" class="links"onclick="clickme('change_email', ' Change email')"> <i style="font-size: calc(4px + 1vw + 1vh);" class="fas fa-edit"></i></a>
				<textarea name="new_email" class="textarea" id='change_email' disabled style="enabled: false; background-color: #1F222B;"> <?php echo $_SESSION['email']?></textarea> 
			</div>
			<div class="container-11"><?php echo $new_emailErr?></div>


			<div style= "display: flex; justify-content: center; "> 
				<a href="#" class="links"onclick="clickme('change_pass', ' Change password'); "> <i style="font-size: calc(4px + 1vw + 1vh);" class="fas fa-edit"></i></a>
				<textarea name="new_password" class="textarea" id='change_pass' disabled style="enabled: false; background-color: #1F222B;"> Change password</textarea> 
			</div>
			<div class="container-11"><?php echo $new_passwordErr?></div>


			
			<div class="container-4"><input type="submit" value="Apply changes"></div>
		</form>
			<div class="container-11"><?php echo $message?></div>

		
		<a class="links"href="https://github.com/luyandamncube"><div class="footer">© lmncube 2018</div></a>

	</body>
	<script>
		function clickme($element, $value){
			$el = document.getElementById($element);
			if ($el.disabled){
				$el.disabled = false;
				$el.style.backgroundColor = "rgb(82, 88, 108)";
				$el.value = '';
				$new_pass = "yaaaay";
				if ($element == 'change_pass'){
					//document.getElementById($element).
					//$el.placeholder = "New Password";
					//echo "PASS SHOULD CHANGE";
				}
			}
				
			else{
				$el.disabled = true;
				//$el.setAttribute("background-color", "#1F222B");
				$el.style.backgroundColor = "#1F222B";
				$el.value = $value;
			}
		}

	</script>
</html>
        