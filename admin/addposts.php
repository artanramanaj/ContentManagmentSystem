<?php include "includes/admin_header.php" ?>

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

                    <form action="" method="POST" enctype="multipart/form-data">

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
                            <input type="file" class="form-control" id="post_img" name="post_img"
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
                        <div class="form-group">
                            <label for="post_comment_count">Post Comment Count</label>
                            <input type="text" class="form-control" id="post_comment_count" name="post_comment_count"
                                aria-describedby="emailHelp" placeholder="Enter post_comment_count">
                        </div>
                        <div class="form-group">
                            <label for="post_status">Post Status</label>
                            <input type="text" class="form-control" id="post_status" name="post_status"
                                aria-describedby="emailHelp" placeholder="Enter post_status">
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-primary"></input>
                    </form>

                    <!-- inserting data in post table-->
                    <?php

                    if (isset($_POST['submit'])) {

                        $post_title = $_POST['post_title'];
                        $post_author = $_POST['post_author'];
                        $post_date = date('d-m-y');
                        $post_img = $_FILES['post_img']['name'];
                        $post_img_temp = $_FILES['post_img']['tmp_name'];
                        $post_desc = $_POST['post_desc'];
                        $post_tags = $_POST['post_tags'];
                        $post_comment_count = $_POST['post_comment_count'];
                        $post_status = $_POST['post_status'];

                        move_uploaded_file($post_img_temp, "../images/$post_img");

                        $query = "INSERT INTO posts (post_title, post_author, post_date, post_img, post_desc, post_tags,  post_comment_count, post_status )  VALUES ('$post_title', '$post_author',  now() , '$post_img', '$post_desc', '$post_tags', '$post_comment_count', '$post_status')";
                        $result = mysqli_query($connection, $query);

                    }

                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>