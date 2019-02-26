<?php

require('database.php');

$db = new Database();
$id = $_GET["id"];
$db->convertDataToJson($id);

//print_r($result);








 ?>
