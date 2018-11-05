<?php
$database = new SQLRequest();
$db = $database->openConnection();
$database->get_dp($_SESSION['username']);
$database->closeConnection();

?>