<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/login_user.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link rel="shortcut icon" type="image/png" href="../resources/favicon.png"/>
    <link rel="stylesheet" type="text/css"href="../font/web-fonts-with-css/css/fontawesome-all.min.css"><!--load all styles -->
</head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
<body>
	<a class="links" href="signup.php"><div class="container-7"> Signup </div></a>
    
        <div class="container-1"><a class="links"href="gallery.php"><img class="logo" src="../resources/logo1.png"></div></a><br>
	<div class="container-2"> CAMAGRU </div>
        <div class="container-3"> EDITOR </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="login_form" method="POST">
            <div class ="container-5"><textarea placeholder= " Username" class="textarea" name="loginname" ></textarea></div>
            <div class="container-11"><?php echo $loginameErr;?></div>
            <div class ="container-5"><input type="password" placeholder= " Password" class="input" name="loginpass"></input></div>
            <div class="container-11"><?php echo $loginpassErr;?></div>
            <div class="container-4"><input type="submit" value="Login!"></div>
        </form> 
        
   <a class="links"href="https://github.com/luyandamncube"><div class="footer">  © lmncube 2018</div></a>

</body>
</html>
