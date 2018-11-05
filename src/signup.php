<?php

    include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/create_user.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link rel="shortcut icon" type="image/png" href="../resources/favicon.png"/>
    <link rel="stylesheet" type="text/css"href="../font/web-fonts-with-css/css/fontawesome-all.min.css"><!--load all styles -->
</head>
    <title>Signup</title>
    <link rel="stylesheet" href="../css/style.css">
<body>
	<a class="links" href="login.php"><div class="container-6"> Login </div></a>
    
        <div class="container-1">
           <a class="links"href="gallery.php"><img class="logo" src="../resources/logo1.png"></a>
        </div><br>
	    <div class="container-2"> CAMAGRU </div>
        <div class="container-3"> EDITOR </div>
       
        <!-- 
            $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script
            htmlspecialchars() function converts special characters to HTML entities. Also voids an XSS attack
        -->
        
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="create_user_form" method="POST">

            <div class ="container-5"><textarea placeholder= " Username" class="textarea" name="username"></textarea></div>
            <div class="container-11"><?php echo $usernameErr;?></div>


            <div class ="container-5"><textarea placeholder= " Email" class="textarea" name="email" value=""></textarea></div>
            <div class="container-11"> <?php echo $emailErr;?></div>

            <div class ="container-5"><input type="password" placeholder= " Password" class="input" name="password"></input></div>
            <div class="container-11"><?php echo $passwordErr;?></div>

            <div class ="container-5"><input type="password" placeholder= " Confirm Password" class="input" name="confirmpassword"></input></div>
            <div class="container-11"><?php echo $confirmpasswordErr;?></div>
            <br>
            <div class="container-4"><input type="submit" value="Sign me up!"></div>
        </form>     
   <a class="links"href="https://github.com/luyandamncube"><div class="footer">  © lmncube 2018</div></a>

   
</body>
</html>
