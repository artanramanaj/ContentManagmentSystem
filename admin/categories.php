<?php

include "includes/admin_header.php" ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <?php
            if (isset($_POST['submit'])) {
                $submit = $_POST['submit'];
                $new_category = $_POST['new_category'];

                if ($new_category == "" || $new_category == null) {
                    echo "<h1>The field is null, write a category name there</h1>";
                } else {
                    $add_category = "INSERT INTO categories (cat_title) VALUES ('$new_category')";
                    $query = mysqli_query($connection, $add_category);

                    // Redirect after successful form submission
                    header("Location: categories.php");
                    exit(); // Ensure script execution stops after redirection
                }
            }
            ?>

            <div class="col-lg-6">
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="category">Add Category</label>
                        <input type="text" class="form-control" name="new_category" id="category"
                            placeholder="Enter category name">
                    </div>

                    <div class="form-group">

                        <input class="btn btn-success" type="submit" name="submit" class="form-control" id="submit"
                            value="submit">
                    </div>
                </form>

                <!-- Geting all categoires and showing them in category page  -->
                <?php

                $query = "SELECT * FROM categories";
                $response = mysqli_query($connection, $query);


                ?>

            </div>

            <!-- deleting the category -->
            <?php

            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $delete_category = "DELETE FROM categories WHERE (cat_id) = $id";
                $query = mysqli_query($connection, $delete_category);

                header("Location: categories.php");

            } else {
                echo "it does not exist";
            }

            ?>
            <!-- finished deleting the category -->
            <div class="d-flex flex-row justify-content-end col-lg-6">

                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category title</th>
                        </tr>
                    </thead>
                    <?php

                    while ($row = mysqli_fetch_assoc($response)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        ?>

                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $cat_id ?>
                                </td>
                                <td>
                                    <?php echo $cat_title ?>
                                </td>
                                <td>
                                    <a href="categories.php?delete=<?php echo $cat_id ?>"><button
                                            class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        </tbody>

                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>