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

                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="post_title">Post Title</label>
                            <input type="text" class="form-control" id="post_title" name="post_title"
                                aria-describedby="emailHelp" placeholder="Enter post_title">
                        </div>

                        <div class="form-group">
                            <label for="post_author">Post Author</label>
                            <input type="text" class="form-control" id="post_author" name="post_author"
                                aria-describedby="emailHelp" placeholder="Enter post_author">
                        </div>

                        <div class="form-group">
                            <label for="post_date">Post Date</label>
                            <input type="text" class="form-control" id="post_date" name="post_date"
                                aria-describedby="emailHelp" placeholder="Enter post_date">
                        </div>

                        <div class="form-group">
                            <label for="post_img">Post Img</label>
                            <input type="text" class="form-control" id="post_img" name="post_img"
                                aria-describedby="emailHelp" placeholder="Enter post_img">
                        </div>

                        <div class="form-group">
                            <label for="post_desc">Post Description</label>
                            <input type="text" class="form-control" id="post_desc" name="post_desc"
                                aria-describedby="emailHelp" placeholder="Enter post_desc">
                        </div>

                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" class="form-control" id="post_tags" name="post_tags"
                                aria-describedby="emailHelp" placeholder="Enter post_tags">
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-primary"></input>
                    </form>

                    <!-- inserting data in post table-->
                    <?php

                    if (isset($_POST['submit'])) {

                        $post_title = $_POST['post_title'];
                        $post_author = $_POST['post_author'];
                        $post_date = $_POST['post_date'];
                        $post_img = $_POST['post_img'];
                        $post_desc = $_POST['post_desc'];
                        $post_tags = $_POST['post_tags'];


                        $query = "INSERT INTO posts (post_title, post_author, post_date, post_img, post_desc, post_tags)  VALUES ('$post_title', '$post_author',  '$post_date' , '$post_img', '$post_desc', '$post_tags')";
                        $result = mysqli_query($connection, $query);

                    }

                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>