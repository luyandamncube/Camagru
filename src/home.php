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
        <link rel="stylesheet" type="text/css"
        href="../font/web-fonts-with-css/css/fontawesome-all.min.css">
	</head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/style.css">
	<body>
        <nav>
            <ul class="container-9">
                <li><a class="links" href="gallery.php"><i class="fas fa-home"></i></a></li>
                <li><a class="links" href="capture.php"><i class="fas fa-camera"></i></a></li>
                <li><a class="links" href="settings.php"><?php 
                    $image_pre = '<img style="height : 25px; width : 25px; 
                    border-radius: 100%;" src="data:image/jpg;base64,';
					echo $image_pre.$_SESSION['dp'].'"/>';?></a></li>
                <li><a class="links" href="end.php"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
            </nav>
            <div class="container-12" style="justify-content">
                <div style="width: 400px;">
                <?php include 'display_photos.php'; ?>
                </div>
            </div>
            
<!--
        <div class="fling-minislide" style="height: 100%">
            <img src="../resources/placeholder.jpg" alt="Slide 4" />
            <img src="../resources/placeholder1.jpg" alt="Slide 3" />
            <img src="../resources/placeholder2.jpg" alt="Slide 2" />
            <img src="../resources/placeholder3.jpg" alt="Slide 1" />

        </div>
-->
        <a class="links"href="https://github.com/luyandamncube">
        <div class="footer" style="">© lmncube 2018</div></a>



    </body>
</html>
        