<?php
include "includes/header.php";
include "includes/db.php";
include "includes/navigation.php";

?>
<div class="container">
    <div class="row"><!-- Added a row to wrap the grid -->

        <!-- First Column -->
        <div class="col-lg-6"><!-- Added a Bootstrap grid column class -->

            <?php
          

            if (isset($_GET['p_id'])) {
                $p_id = $_GET['p_id'];

                $query = "SELECT * FROM posts WHERE id = $p_id";
                $res = mysqli_query($connection, $query);


                while ($row = mysqli_fetch_assoc($res)) {
                    $post_id = $row['id'];
                    $post_title = ucfirst($row['post_title']);
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_img = $row['post_img'];
                    $post_desc = $row['post_desc'];
                    $post_content = $row['post_content'];
                 
                }
           

            ?>


            <h2>
                <a href="#">
                    <?php echo $post_title; ?>
                </a>
            </h2>
            <p class="lead">
                    by <a href="post_author.php?author=<?php echo $post_author?>&post_id=<?php echo $post_id ?>">
                        <?php echo $post_author; ?>
                    </a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>
                <?php echo $post_date; ?>
            </p>
            <hr>
            <img class="img-responsive postImg"
                src="images/<?php echo ($post_img != null) ? $post_img : 'exist.png'; ?>" alt="">
            <hr>
            <p>
                <?php echo $post_desc; ?>
            </p>
            <p>
                <?php echo $post_content; ?>
            </p>
            <hr>
            <?php  }?>



            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="comment_author">Enter your name</label>
                        <input type="text" class="form-control" id="comment_author" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Enter your email</label>
                        <input type="text" class="form-control" id="comment_email" name="comment_email">
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Enter your comment</label>
                        <textarea class="form-control" name="comment_content" id="comment_content" rows="4"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <?php

            if (isset($_POST['create_comment'])) {
                $comment_post_id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date ) VALUES ('$comment_post_id','$comment_author', ' $comment_email', '$comment_content','unapproved', now())";
                    $create_comment = mysqli_query($connection, $query);

                    if (!$create_comment) {
                        echo die("Error creating while making the query") . ' ' . mysqli_error($connection);
                    }

                    $query = "UPDATE posts set post_comment_count = post_comment_count + 1 WHERE id = $p_id";

                    $update_post_comment_count = mysqli_query($connection, $query);
                } else {
                    echo "<p>The fields should be filled, they cant be empty</p>";
                }


            }

            ?>

            <hr>

            <?php



            $query = "SELECT * FROM comments WHERE comment_post_id = '$p_id' AND comment_status = 'approved' ORDER BY comment_id DESC";
            $show_comments = mysqli_query($connection, $query);



            while ($row = mysqli_fetch_assoc($show_comments)) {

                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_date = $row['comment_date'];

                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php $comment_author ?>
                            <small>
                                <?php echo $comment_date ?>
                            </small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>

            <?php } ?>

        </div>


        <div>
            <?php include "includes/sidebar.php"; ?>
        </div>

    </div>
</div>

<div class="container">
    <hr>
    <?php include "includes/footer.php"; ?>
</div>