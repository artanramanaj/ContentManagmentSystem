<?php
if(isset($_POST['submit'])) {
    $check_options = $_POST['check_options'];
   
    if(isset($_POST['checkBoxArray'])){
       foreach($_POST['checkBoxArray'] as $postCheck) {
        switch($check_options) {
            case 'published':
            $query = "UPDATE posts SET post_status = 'published' where id = $postCheck";
            $change_to_published = mysqli_query($connection, $query);
                break;

            case 'draft':
            $query = "UPDATE posts SET post_status = 'draft' where id = $postCheck";
            $change_to_draft = mysqli_query($connection, $query);
                break;

            case 'delete':
            $query = "DELETE FROM posts WHERE  id = $postCheck";
            $change_to_draft = mysqli_query($connection, $query);
                break;
        }
       }
    }
}
?>

<?php



?>

<form action="" method="post">

<div id="bulkOptionContainer" class="col-xs-4">
    <select class="form-control" name="check_options" id="">
    <option value="">Select Options</option>
    <option value="published">Publish</option>
    <option value="draft">Draft</option>
    <option value="delete">Delete</option>
    </select>
</div>

<div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a href="addposts.php" class="btn btn-primary ">Add Post</a>
</div>

<table class="table table-hover ">
    <th>
        <tr>
        <td>
            <input id="selectAllBoxes" type="checkbox" />
        </td>
        <td>Id</td>
        <td>Category Id</td>
        <td>Category Name</td>
        <td>Post Title</td>
        <td>Post Author</td>
        <td>Post Date</td>
        <td>Post Image</td>
        <td>Post Description</td>
        <td>Post Tags</td>
        <td>Post Comment Count</td>
        <td>Post Status</td>
        <td></td>
        <td></td>
    </tr>
    </th>
    <tbody>

        <?php

        $query = "SELECT * FROM posts";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];
            $post_category_id = $row['post_category_id'];
            $post_category_name = $row['post_category_name'];
            echo $post_category_name;
            ?>
            <tr>
                <td>
                    <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $id ?>"  >
                </td>
                <td>
                    <?php echo $row['id'] ?>
                </td>
                <td>
                    <?php echo  $post_category_id ?>
                </td>
                <td>
                    <?php echo $row['post_category_name'] ?>
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
                
                        echo $row['post_status'];
                
                    ?>
                </td>
                <td>
                    <button class="btn btn-primary text-white linkedit">
                        <?php echo "<a  href='posts.php?source=edit_posts&edit=$id' style='color:white; text-decoration:none;'>edit post</a> " ?>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger text-white linkedit">
                        <?php echo " <a  href='posts.php?delete=$id' style='color:white; text-decoration:none;' >delete post</a> " ?>
                    </button>
                </td>
            </tr>
        <?php }
        ?>
        <!-- delete a post -->
        <?php

        if (isset($_GET['delete'])) {
            $get_post_id = $_GET['delete'];

            $query = "DELETE FROM posts  WHERE id =  $get_post_id";
            $delete_post = mysqli_query($connection, $query);

            header("Location: posts.php");
            exit;
        }
        ?>
    </tbody>
</table>
</form>