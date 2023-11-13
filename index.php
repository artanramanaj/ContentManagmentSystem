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

    $query = "SELECT * FROM posts WHERE post_status = 'published'";
    $select_published_posts = mysqli_query($connection, $query);

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
            while ($post_col = mysqli_fetch_assoc($select_published_posts)) {
                $id = $post_col['id'];
                $post_title = ucfirst($post_col['post_title']);
                $post_author = $post_col['post_author'];
                $post_date = $post_col['post_date'];
                $post_img = $post_col['post_img'];
                $post_desc = $post_col['post_desc'];
                $post_status = $post_col['post_status'];

                if ($post_status == 'published') {
                    
                    ?>
                    <h2>
                        <a href="post.php?p_id=<?php echo $id ?>"><?php echo $post_title; ?></a>
                    </h2>
               
                    <p><span class="glyphicon glyphicon-time"></span>
                        <?php echo $post_date; ?>
                    </p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $id ?>">
                    <img class="img-responsive postImg" src="images/<?php echo ($post_img != null) ? $post_img : 'exist.png'; ?>"
                        alt="">
                        </a>
                    <hr>
                    <p>
                        <?php echo mb_strimwidth($post_desc, 0, 42, '...'); ?>
                    </p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                    <?php
                    } 
                }
            }
          
            ?>
        </div>
    <?php
  
    ?>

    <div>
        <?php include "includes/sidebar.php"; ?>
    </div>
</div>

<div class="container">
    <hr>
    <?php include "includes/footer.php"; ?>
</div>
