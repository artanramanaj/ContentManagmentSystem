<?php

if (isset($_GET['edit'])) {
    $editPost = $_GET['edit'];

    $query = "SELECT * FROM posts WHERE id = '$editPost'";
    $res = mysqli_query($connection, $query);


}

while ($row = mysqli_fetch_assoc($res)) {
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_img = $row['post_img'];
    $post_desc = $row['post_desc'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];


    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Just a reminder, this is to edit post</h1>
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" aria-describedby="emailHelp"
                value="<?php echo $post_title ?>">
        </div>

        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" id="post_author" name="post_author" aria-describedby="emailHelp"
                value="<?php echo $post_author ?>">
        </div>

        <div class="form-group">
            <label for="post_date">Post Date</label>
            <input type="text" class="form-control" id="post_date" name="post_date" aria-describedby="emailHelp"
                value="<?php echo $post_date ?>">
        </div>

        <div class="form-group">
            <label for="post_img">Post Img</label>
            <input type="file" class="form-control" id="post_img" name="post_img" aria-describedby="emailHelp"
                value="<?php echo $post_img ?>">
        </div>

        <div class="form-group">
            <label for="post_desc">Post Description</label>
            <input type="text" class="form-control" id="post_desc" name="post_desc" aria-describedby="emailHelp"
                value="<?php echo $post_desc ?>">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" id="post_tags" name="post_tags" aria-describedby="emailHelp"
                value="<?php echo $post_tags ?>">
        </div>
        <div class="form-group">
            <label for="post_comment_count">Post Comment Count</label>
            <input type="text" class="form-control" id="post_comment_count" name="post_comment_count"
                aria-describedby="emailHelp" value="<?php echo $post_comment_count ?>">
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" class="form-control" id="post_status" name="post_status" aria-describedby="emailHelp"
                value="<?php echo $post_status ?>">
        </div>
        <input type="submit" value="submit" name="create_post" class="btn btn-primary"></input>
    </form>
<?php } ?>

<?php

if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = $_POST['post_date'];
    $post_desc = $_POST['post_desc'];
    $post_tags = $_POST['post_tags'];
    $post_comment_count = $_POST['post_comment_count'];
    $post_status = $_POST['post_status'];

    // Handle the file upload
    $target_dir = "../images"; // Replace with the directory where you want to save uploaded images
    $post_img = $_FILES['post_img']['name'];
    $target_file = $target_dir . basename($post_img);
    move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);

    // Your database query
    $query = "UPDATE posts SET post_title='$post_title', post_author='$post_author', post_date='$post_date', post_img='$post_img', post_desc='$post_desc', post_tags='$post_tags', post_comment_count='$post_comment_count', post_status='$post_status' WHERE id='$editPost'";

    $res = mysqli_query($connection, $query);

    if ($res) {
        echo $editPost;
    } else {
        echo "data not sent";
    }
}
?>