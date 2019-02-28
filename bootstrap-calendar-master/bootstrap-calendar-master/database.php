<?php

class Database{

  // Connect to the database


public function __construct(){


  $servername = "localhost";
  $username = "root";
  $password = "";
  $myDB = "encircle-marketing";

  try{
    $this->connection = new PDO("mysql:host=$servername;dbname=$myDB",$username,$password);
    // set the PDO error mode to Exception
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo Connected Successfully
    return $this->connection;
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
}


  public function convertDataToJson($id){

    // Allow JSON to be formed

    $file = 'events.json.php';
    // Open the file to get existing content
    $data = '{
      "success": 1,
      "result": [';

    // Write the contents back to file



    //Retrieve data from the database
  //  $id = $_GET['id'];
    //$id = 1;

    $query= "SELECT * FROM user_timesheets WHERE `user_id` = $id AND `status` = 'completed'";

    $rows = $this->getData($query);

    $rowCount = sizeof($rows);

    $n=1;

     foreach($rows as $row){
       $myData = new stdClass();
       $myData->class = 'event-important';
       $myData->start = $this->convertDateToTimeStamp($row["start_date"], $row["start_time"]);
       $myData->end = $this->convertDateToTimeStamp($row["start_date"], $row["end_time"]);

       $myJSON = json_encode($myData);

       $data .= $myJSON;

       if(!($n == $rowCount)){



       $data .= ',';

     }

       $n++;
    }

    $data .=']}';

    $path = "C:/xampp/htdocs/bootstrap-calendar-master/bootstrap-calendar-master/events.json.php";

    if(unlink($path)){
      if(file_put_contents($file, $data)){
        return true;
      }
    }

    return false;

  }


  public function getData($query)
  {
    $result = $this->connection->prepare($query);
    $result->execute();

    return($result->fetchAll(PDO::FETCH_ASSOC));
  }


  public function convertDateToTimeStamp($Date, $Time){
    return strtotime($Date . ' ' . $Time . '+ 1 hour') . '000';
  }
}









 ?>
