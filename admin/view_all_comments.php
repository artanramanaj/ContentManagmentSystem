<table class="table table-hover ">
    <th>
        <tr>
        <td>Id</td>
        <td>Author</td>
        <td>Comment</td>
        <td>Email</td>
        <td>Status</td>
        <td>In Response to</td>
        <td>Date</td>
        <td>Post Description</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </th>
    <tbody>
        <?php

        $query = "SELECT * FROM comments";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {

           
          
            ?>
            <tr>
                <td>
                    <?php echo $row['comment_id'] ?>
                </td>
                <?php 
                    //   $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id'";
                    //   $select_category_id = mysqli_query($connection, $query);
  
                    //   while($secondrow = mysqli_fetch_assoc($select_category_id)){
                    //       $category_name = $secondrow['cat_title'];
  
                
                ?>

              
                <td>
                    <?php echo $row['comment_author'] ?>
                </td>
                <td>
                    <?php echo $row['comment_content'] ?>
                </td>

                <td>
                    <?php echo $row['comment_email'] ?>
                </td>
                <td>
                    <?php echo $row['comment_status'] ?>
                </td>
             
                <td>
                    <?php echo 'in response title' ?>
                </td>
              
                <td>
                    <?php echo $row['comment_date'] ?>
                </td>
               
                <td>
                    <button class="btn btn-primary text-white linkedit">
                        <?php echo "<a  href='posts.php?source=edit_posts&edit=' style='color:white; text-decoration:none;'>Approve</a> " ?>
                    </button>
                </td>
                <td>
                    <button class="btn btn-primary text-white linkedit">
                        <?php echo "<a  href='posts.php?source=edit_posts&edit=' style='color:white; text-decoration:none;'>Unapprove</a> " ?>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger text-white linkedit">
                        <?php echo " <a  href='posts.php?delete=' style='color:white; text-decoration:none;' >delete post</a> " ?>
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