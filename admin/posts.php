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

                    <table class="table table-hover ">
                        <th>
                            <tr></tr>
                            <!-- select all field names  -->
                            <?php
                            $query = "SHOW COLUMNS FROM posts";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_array($result)) {

                                ?>

                            <td>
                                <?php echo $row['Field'] ?>
                            </td>


                        <?php } ?>
                        </tr>
                        </th>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM posts";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_array($result)) {


                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_category_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_title'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_author'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_date'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['post_img']) {
                                            echo "<img width='150px' src='../images/{$row['post_img']}' />";
                                        } else {
                                            echo strtoupper("<h3 class='text-center'>There is no image in db</h3>");
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_desc'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_tags'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_comment_count'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['post_status'] == 1) {
                                            echo "the value is true" . $row['post_status'];
                                        } else {
                                            echo "the value is false 0";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>