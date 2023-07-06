<?php 
include "includes/header.php";
?>
<?php 

include "includes/db.php";

$GETPOSTS = "SELECT * FROM posts";

$results_post = mysqli_query($connection, $GETPOSTS);
?>
    <!-- Navigation -->
  
  <?php 
include "includes/navigation.php"; 

?>
<div class="col-lg-6">
<?php
while ($post_col = mysqli_fetch_assoc($results_post)) {
    $post_title = $post_col['post_title'];
    $post_author = $post_col['post_author'];
    $post_date = $post_col['post_date'];
    $post_img = $post_col['post_img'];
    $post_desc = $post_col['post_desc'];


    ?>

    <h2>
        <a href="#"><?php echo $post_title; ?></a>
    </h2>
    <p class="lead">
        by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
    <hr>
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
    <hr>
    <p><?php echo $post_desc; ?></p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    <hr>
    <?php
}

?>
</div>
           
            <?php 
include "includes/sidebar.php";
?>
        </div>

        <hr>
<?php 
include "includes/footer.php";
?>

