
<?php 
  include 'setup.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
        <link rel="shortcut icon" type="image/png" href="resources/favicon.png"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>   
    <title>Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
<body>
  <?php
    $object = new DBh;
    $object->connect();
  ?>
  <div class="container-2" > CAMAGRU </div>
  <div class="text2 container-3"> EDITOR </div>
  <a class="links"href="./src/signup.html"> <div class="text2 container-4"> Get started! </div>  </a>

<!-- Photo Grid -->
  <div class="row"> 
                <div class="column">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                </div>
                <div class="column">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                </div>  
                <div class="column">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                </div>
                <div class="column">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                  <img src="./resources/placeholder.jpg" style="width:100%">
                </div>
              </div>
              <a class="links"href="https://github.com/luyandamncube"><div class="footer">  © lmncube 2018</div></a>
</body>
</html>