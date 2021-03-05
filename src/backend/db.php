<?php

$servername = "localhost";
$username = 'denis143_den';
$password = 'todo123';
$dbname = 'denis143_todo';


$connection = new mysqli($servername,$username,$password,$dbname);

if($connection->connect_error){
    die ("Connection failed: " . $connection->connect_error);
}
// echo "Connected successfully"

?>