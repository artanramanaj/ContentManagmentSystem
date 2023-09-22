<?php include "includes/admin_header.php" ?>
<?php include "includes/functions.php" ?>
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
            categoryInsert();
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


                <form action="" method="POST">

                    <div class="form-group">
                        <label for="edit_category">Edit Category</label>
                        <!-- reading the data first before trying to Edit -->
                        <?php
                        $res = null;
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            $query = "SELECT * FROM categories WHERE cat_id = '{$cat_id}'";
                            $res= mysqli_query($connection, $query);

                        } 

                        ?>

                        <?php
                   
                        if (isset($_GET['edit'])) {
                            while ($row = mysqli_fetch_assoc($res)) {

                                $cat_title = $row['cat_title'];
                            }

                            ?>

                        <?php } else {
                            $cat_title = "select the categorie you want to edit";
                        }

                        ?>
                        <input type="text" class="form-control" name="new_category" id="edit_category" value="<?php if (isset($cat_title)) {
                            echo strtoupper($cat_title);
                        } ?>">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">

                        <!-- edit the value and send data to server using post method -->
                        <?php updateCategory(); ?>

                        <input class="btn btn-info" type="submit" name="update_category" class="form-control"
                            id="update_category" value="edit">
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
                $query = "DELETE FROM categories WHERE (cat_id) = $id";
                $delete_category = mysqli_query($connection, $query);

                header("Location: categories.php");

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
                                    <?php echo strtoupper($cat_title) ?>
                                </td>
                                <td>
                                    <a href="categories.php?delete=<?php echo $cat_id ?>"><button
                                            class="btn btn-danger">Delete</button></a>
                                </td>
                                <td>
                                    <a href="categories.php?edit=<?php echo $cat_id ?>"><button
                                            class="btn btn-info">Edit</button></a>
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