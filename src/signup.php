<?php
    include '../setup.php';
    include 'create_user.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link rel="shortcut icon" type="image/png" href="../resources/favicon.png"/>
</head>
    <title>Signup</title>
    <link rel="stylesheet" href="../css/style.css">
<body>
	<a class="links" href="login.php"><div class="container-6"> Login </div></a>
    
        <div class="container-1">
            <a class="links"href="gallery.php"><img class="logo" src="../resources/logo1.png"></div></a><br>
	<div class="container-2"> CAMAGRU </div>
        <div class="container-3"> EDITOR </div>
       
        <!-- 
            $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script
            htmlspecialchars() function converts special characters to HTML entities. Also voids an XSS attack
        -->
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="create_user_form" method="POST">

            <div class ="container-5"><textarea placeholder= " Username" class="textarea" name="username"></textarea></div>
            <div class="container-11"><span > <?php echo $usernameErr;?></span></div>

            <div class ="container-5"><textarea placeholder= " Email" class="textarea" name="email"></textarea></div>
            <div class="container-11"><span> <?php echo $emailErr;?></span></div>

            <div class ="container-5"><textarea placeholder= " Password" class="textarea" name="password"></textarea></div>
            <div class="container-11"><span> <?php echo $passwordErr;?></span></div>

            <div class ="container-5"><textarea placeholder= " Confirm Password" class="textarea" name="confirmpassword"></textarea></div>
            <div class="container-11"><span > <?php echo $confirmpasswordErr;?></span></div>
            

            <br>
            <div class="container-4"><input type="submit" value="Sign me up!"></div>
            
        </form>     
   <a class="links"href="https://github.com/luyandamncube"><div class="footer">  © lmncube 2018</div></a>

   
</body>
</html>
