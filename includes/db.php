<?php 

$db_host = "localhost";
$db_username ="root";
$db_password = "";
$db_name = "cms";

$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(!$connection) {
    die("database failed to connect");
} 
?>

