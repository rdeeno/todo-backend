<?php
include ('db.php');
$data = json_decode(file_get_contents("php://input"));
$request = $data->request;
if($request == 1){    
    $todoitem = $data->todo;
    $date = date("Y/m/d");
    $insert = "INSERT INTO todo (task,date) VALUES ('".$todoitem."','$date')";
    $result = $connection->query($insert);
    if($result){
            $response[] = array('status'=>1);
    }else{
            $response[] = array('status'=>0);
    }
    echo json_encode($response);
    exit;
}
if($request == 2){
  $id = $data->id;
  mysqli_query($connection,"DELETE FROM todo WHERE id=".$id);
  exit;
}
if($request == 3){
$condition = "1";
if(isset($_GET['task'])){
   $condition = " task=".$_GET['task'];
}
$userData = mysqli_query($connection, "select * from todo WHERE ".$condition);

$response = array();

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);
exit;
}

?>