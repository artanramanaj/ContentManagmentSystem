<?php include "../includes/db.php" ?>

<?php

function categoryInsert()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $submit = $_POST['submit'];
        $new_category = $_POST['new_category'];

        if ($new_category == "" || $new_category == null) {
            echo "<h1>The field is null, write a category name there</h1>";
        } else {
            $query = "INSERT INTO categories (cat_title) VALUES ('$new_category')";
            $add_category = mysqli_query($connection, $query);

            // Redirect after successful form submission
            header("Location: categories.php");
            exit(); // Ensure script execution stops after redirection
        }
    }
}

function updateCategory()
{
    global $connection;
    if (isset($_GET['edit'])) {
        $category_id = $_GET['edit'];
        if (isset($_POST['update_category'])) {
            $update_new_category_value = $_POST['new_category'];
            $query = "UPDATE categories SET cat_title = '$update_new_category_value' WHERE cat_id = '$category_id'";
            $resposne = mysqli_query($connection, $query);
        }

    }
}





?>