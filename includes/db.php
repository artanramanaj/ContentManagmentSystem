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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> db php </title>

</head>
<body>

</body>
</html>