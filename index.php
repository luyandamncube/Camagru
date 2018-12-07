
<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/Camagru/config/setup.php';
  include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
  $_SESSION['username'] = 'guest';
  unset($_SESSION);
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
        <link rel="shortcut icon" type="image/png" href="resources/favicon.png"/>
        <link rel="stylesheet" type="text/css"href="font/web-fonts-with-css/css/fontawesome-all.min.css"><!--load all styles -->
        <script src="js/index.js"></script>
</head>   
    <title>Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
<body>
  <div class="container-2" > CAMAGRU </div>
  <div class="text2 container-3"> EDITOR </div>
  <a class="links"href="./src/signup.php"> <div class="text2 container-4"> Get started! </div>  </a>
  <br>
			<div class="container-12">
            <div style="width: 400px;"><div id="home_pics"><!-- New DOM elements go here --></div></div>
     		</div>
              <a class="links"href="https://github.com/luyandamncube"><div class="footer">  © lmncube 2018</div></a>
</body>
</html>