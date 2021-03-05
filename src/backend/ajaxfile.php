<?php
include "db.php";

$condition = "1";
if(isset($_GET['name'])){
   $condition = " name=".$_GET['name'];
}
$userData = mysqli_query($connection, "select * from user WHERE ".$condition);

$response = array();

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);
exit;

?>