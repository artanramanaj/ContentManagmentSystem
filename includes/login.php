<?php include "db.php" ?>
<?php session_start() ?>

<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * from users WHERE username = '$username'";
    $response = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($response)) {
        $user_id = $row['user_id'];
        $user_username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

    }
    $password = crypt($password, $user_password);

    if ($user_username === $username && $user_password === $password) {
        $_SESSION['username'] = $user_username;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['user_role'] = $user_role;
        header("location: ../admin/users.php ");
        exit;
    } else {
        header("location: ../index.php ");
        exit;
    }

}

?>