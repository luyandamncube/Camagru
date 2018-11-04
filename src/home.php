<?php
    include 'session.php';
    if (!$_SESSION){
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
	<title>Home</title>
	<link rel="stylesheet" href="../css/style.css">
	<body>

            <nav>
                    <ul class="container-9">
                        <li><a class="links" href="gallery.php"><i class="fas fa-home"></i></a></li>
                        <li><a class="links" href="capture.php"><i class="fas fa-camera"></i></a></li>
                        <li><a class="links" href="settings.php"><i class="fas fa-cog"></i></a></li>
                        <li><a class="links" href="end.php"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>
            </nav>
            <div class="container-12" style="justify-content">
            <div style="width : 400px; background-color: white; height : 400px;"></div>

            </div>
            
<!--
        <div class="fling-minislide" style="height: 100%">
            <img src="../resources/placeholder.jpg" alt="Slide 4" />
            <img src="../resources/placeholder1.jpg" alt="Slide 3" />
            <img src="../resources/placeholder2.jpg" alt="Slide 2" />
            <img src="../resources/placeholder3.jpg" alt="Slide 1" />

        </div>
-->

        <a class="links"href="https://github.com/luyandamncube"><div class="footer" style="">© lmncube 2018</div></a>



    </body>
</html>
        