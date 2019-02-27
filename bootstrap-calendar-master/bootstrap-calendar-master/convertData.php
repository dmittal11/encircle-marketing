<?php
require('database.php');

$db = new Database();
$id = $_GET["id"];

$result = $db->convertDataToJson($id);

if($result == 1){
  header('Location: http://localhost/bootstrap-calendar-master/bootstrap-calendar-master/');
}
else {
  echo "Unable to display content at this time!";
}

 ?>
