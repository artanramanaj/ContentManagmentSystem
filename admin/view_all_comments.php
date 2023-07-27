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
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];

            $query = "SELECT * FROM posts WHERE id = $comment_post_id";
            $get_posts = mysqli_query($connection, $query);

            while ($row_2 = mysqli_fetch_assoc($get_posts)) {

                $comment_post_title = $row_2['post_title'];

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
                        <a href='../post.php?p_id=<?php echo $row_2['id'] ?>'>

                            <?php echo $comment_post_title ?>

                        </a>
                    </td>

                    <td>
                        <?php echo $row['comment_date'] ?>
                    </td>

                    <td>
                        <button class="btn btn-primary text-white linkedit">
                            <?php echo "<a  href='comments.php?approve=$comment_id' style='color:white; text-decoration:none;'>Approve</a> " ?>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-primary text-white linkedit">
                            <?php echo "<a  href='comments.php?unapprove=$comment_id' style='color:white; text-decoration:none;'>Unapprove</a> " ?>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger text-white linkedit">
                            <?php echo " <a  href='comments.php?delete=$comment_id' style='color:white; text-decoration:none;' >delete post</a> " ?>
                        </button>
                    </td>
                </tr>
            <?php }
        }
        ?>
        <!-- delete a post -->
        <?php

        if (isset($_GET['approve'])) {
            $get_comment_id = $_GET['approve'];

            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $get_comment_id";
            $approve_comment = mysqli_query($connection, $query);
            header("Location: comments.php");
            exit;
        }

        if (isset($_GET['unapprove'])) {
            $get_comment_id = $_GET['unapprove'];

            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $get_comment_id";
            $unapprove_comment = mysqli_query($connection, $query);
            header("Location: comments.php");
            exit;
        }


        if (isset($_GET['delete'])) {
            $get_comment_id = $_GET['delete'];

            $query = "DELETE FROM comments WHERE comment_id = $get_comment_id";
            $delete_comment = mysqli_query($connection, $query);
            header("Location: comments.php");
            exit;
        }
        ?>
    </tbody>
</table>