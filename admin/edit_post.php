<?php

if (isset($_GET['edit'])) {
    $editPost = $_GET['edit'];

    $query = "SELECT * FROM posts WHERE id = '$editPost'";
    $res = mysqli_query($connection, $query);


}

while ($row = mysqli_fetch_assoc($res)) {
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_img = $row['post_img'];
    $post_desc = $row['post_desc'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];

    echo "<p class='bg-success '><a href='../post.php?p_id=$editPost'>View Post</a> or <a href='./posts.php'>edit more post</a></p>";
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Just a reminder, this is to edit post</h1>
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" aria-describedby="emailHelp"
                value="<?php echo $post_title ?>">
        </div>

        <select name="post_content" id="">


            <?php

            $query = "SELECT * FROM categories";
            $response = mysqli_query($connection, $query);



            while ($row = mysqli_fetch_assoc($response)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];


                
                ?>
                <option value="<?php 
            
                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                $get_cat_id = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($get_cat_id)){
                    $categorie_title = $row['cat_title'];
           
                echo $categorie_title;
                
                ?>">
                <?php      } ?>
                    <?php echo $cat_title ?>
                </option>
            <?php } ?>
        </select>

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

            <img src="../images/<?php echo $post_img ?>" width="200" alt="">

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
<select name="post_status" id="">
    <?php
    if ($post_status == 'published') {
        echo  "<option value='published' selected>Published</option>";
        echo  "<option value='draft'>Draft</option>";
    } else {
        echo  "<option value='published'>Published</option>";
        echo  "<option value='draft' selected>Draft</option>";
    }
    ?>
</select>
        </div>

        <div class="form-group">
            <label for="post_content">Post Content  </label>
            <textarea class="form-control" id="post_content" name="post_content"
                rows="3"><?php echo $post_content ?></textarea>
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
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_comment_count = $_POST['post_comment_count'];
    $post_status = $_POST['post_status'];


    $target_dir = "../images";
    $post_img = $_FILES['post_img']['name'];
    $target_file = $target_dir . basename($post_img);
    move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);


    $query = "UPDATE posts SET post_title='$post_title', post_author='$post_author', post_date='$post_date', post_img='$post_img', post_desc='$post_desc', post_content='$post_content' ,post_tags='$post_tags', post_comment_count='$post_comment_count', post_status='$post_status' WHERE id='$editPost'";

    $res = mysqli_query($connection, $query);

        

}

?>