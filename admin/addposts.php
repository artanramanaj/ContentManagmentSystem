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

                    <?php

                    if (isset($_POST['submit'])) {

                        $post_title = $_POST['post_title'];
                        // $post_category_id = $POST['cat_id'];
                        $post_category_name = $_POST['post_category_name'];
                        echo $post_category_name .' '. 'testing cat id' ;
                        $post_author = $_POST['post_author'];
                        $post_date = date('d-m-y');
                        $post_img = $_FILES['post_img']['name'];
                        $post_img_temp = $_FILES['post_img']['tmp_name'];
                        $post_desc = $_POST['post_desc'];
                        $post_content = $_POST['post_content'];
                        $post_tags = $_POST['post_tags'];
                        $post_status = $_POST['post_status'];


                        move_uploaded_file($post_img_temp, "../images/$post_img");

                        $query = "INSERT INTO posts (post_title, post_category_name, post_author, post_date, post_img, post_desc, post_content, post_tags,  post_status )  VALUES ('$post_title', '$post_category_name', '$post_author',  now() , '$post_img', '$post_desc', '$post_tags','$post_content',  '$post_status')";
                        $result = mysqli_query($connection, $query);

                        $idForPost = mysqli_insert_id($connection);

                        echo "<p class='bg-success '>Post created<a href='../post.php?p_id=$idForPost'>View Post</a> or <a href='./posts.php'>edit more post</a></p>";

                    }

                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="post_title">Post Title</label>
                            <input type="text" class="form-control" id="post_title" name="post_title"
                                placeholder="Title" required>
                        </div>

                        <select name="post_category_name" id="" required>


                            <?php

                            $query = "SELECT * FROM categories";
                            $response = mysqli_query($connection, $query);



                            while ($row = mysqli_fetch_assoc($response)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                              

                                ?>
                             <option value="<?php echo $cat_title; ?>"><?php echo $cat_title; ?></option>
                            <?php } ?>
                        </select>

                        <div class="form-group">
                            <label for="post_author">Post Author</label>
                            <input type="text" class="form-control" id="post_author" name="post_author"
                                placeholder="Author" required>
                        </div>

                        <div class="form-group">
                            <label for="post_date">Post Date</label>
                            <input type="text" class="form-control" id="post_date" name="post_date" placeholder="Date"
                                required>
                        </div>

                        <div class="form-group">
                            <img src="../images/<?php echo $post_img ?>" alt="">
                            <label for="post_img">Post Img</label>
                            <input type="file" class="form-control" id="post_img" name="post_img" placeholder="Image"
                                required>

                        </div>

                        <div class="form-group">
                            <label for="post_desc">Post Description</label>
                            <input type="text" class="form-control" id="post_desc" name="post_desc"
                                placeholder="Description" required>
                        </div>

                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-control" id="post_content" name="post_content" rows="5"
                                placeholder="Content" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" class="form-control" id="post_tags" name="post_tags" placeholder="Tags">
                        </div>

                        <div class="form-group">

                            <select name="post_status" class="form-group">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-primary"></input>
                    </form>

                    <!-- inserting data in post table-->

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>