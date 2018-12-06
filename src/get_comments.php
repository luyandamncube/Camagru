<?php

include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/connect.php';
if (!isset($_SESSION)){
	include $_SERVER['DOCUMENT_ROOT'].'/Camagru/src/session.php';
}


//echo "entered php";
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
//echo "POST success";
	try{
        $database = new SQLRequest();
        $db = $database->openConnection();
		
        //var_dump($_POST);
        $stm = $db->prepare("SELECT * FROM comments WHERE pic_num=:_1 ");
		$stm->execute(array(
			'_1' => $_POST['pic_num'],
		)); 
        // $user = $stm->fetch();
        do {
            $user = $stm->fetch();
            // var_dump($user);
            if($user){
                echo "@".$user['username'].": ".$user['comment']. "\n";
            }

        } while ($user);
        $database->closeConnection();

    }catch (PDOException $e){
		echo "There is a problem connecting to the database: " . $e->getMessage();
    } 
}