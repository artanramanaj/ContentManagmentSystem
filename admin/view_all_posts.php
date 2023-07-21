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

            $id = $row['id'];

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