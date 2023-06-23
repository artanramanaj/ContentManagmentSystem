<?php 

$db_host = "localhost";
$db_username ="root";
$db_password = "";
$db_name = "cms";

$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(!$connection) {
    die("database failed to connect");
} 

$query = "SELECT * FROM category";

$result = mysqli_query($connection, $query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

while($row = mysqli_fetch_assoc($result)) {
    echo $row['cat_id'] . " " . $row['cat_title'];
    echo "<br>";
}

    ?>
</body>
</html>