<div class="container d-flex">
    <?php
    include "includes/header.php";
    include "includes/db.php";
    include "includes/navigation.php";

    $search = '';
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
    }

    $search_post = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = mysqli_query($connection, $search_post);

    if (!$search_query) {
        die("query failed" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($search_query);

    if ($count == 0) {
        echo "No results";
    } else {
        ?>
        <div class="col-lg-6">
            <?php
            while ($post_col = mysqli_fetch_assoc($search_query)) {
                $id = $post_col['id'];
                $post_title = ucfirst($post_col['post_title']);
                $post_author = $post_col['post_author'];
                $post_date = $post_col['post_date'];
                $post_img = $post_col['post_img'];
                $post_desc = $post_col['post_desc'];
                ?>
                <h2>


                    <a href="post.php?p_id=<?php echo $id ?>"><?php echo $post_title; ?></a>

                </h2>
                <p class="lead">
                    by <a href="index.php">
                        <?php echo $post_author; ?>
                    </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>
                    <?php echo $post_date; ?>
                </p>
                <hr>
                <img class="img-responsive postImg" src="images/<?php echo ($post_img != null) ? $post_img : 'exist.png'; ?>"
                    alt="">
                <hr>
                <p>
                    <?php echo $post_desc; ?>
                </p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>

    <div>
        <?php include "includes/sidebar.php"; ?>
    </div>


</div>

<div class="container">
    <hr>
    <?php include "includes/footer.php"; ?>
</div>