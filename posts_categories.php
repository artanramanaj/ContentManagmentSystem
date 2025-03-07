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

            if (isset($_GET['cat_id'])) {
                $category_id = $_GET['cat_id'];
                

                $query = "SELECT * FROM posts WHERE post_category_id = $category_id";
                $res = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    $post_title = ucfirst($row['post_title']);
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_img = $row['post_img'];
                    $post_desc = $row['post_desc'];
                    $post_content = $row['post_content'];
                    $post_category_id = $row['post_category_id'];
                    
                    // Move the if statement inside the while loop
                    if ($post_category_id == $category_id) {
                        $foundPosts = true;
                         ?>
                        <h2>
                            <a href="#">
                                <?php echo $post_title; ?>
                            </a>
                         
                        </h2>
                        <p class="lead">
                            by <a href="index.php">
                                <?php echo $post_author; ?>
                            </a>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span>
                            <?php echo $post_date; ?>
                        </p>
                        <hr>
                        <img class="img-responsive postImg" src="images/<?php echo ($post_img != null) ? $post_img : 'exist.png'; ?>" alt="">
                        <hr>
                        <p>
                            <?php echo $post_desc; ?>
                        </p>
                        <p>
                            <?php echo $post_content; ?>
                        </p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
            <?php
                    } 
                   
                    
                }
             
            }
            ?>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate
                    fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate
                    fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo.
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                            ac
                            nisi
                            vulputate fringilla. Donec lacinia congue felis in fauc ibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>
        </div><!-- End of first column -->

        <!-- Second Column -->
        <div><!-- Added a Bootstrap grid column class -->
            <?php include "includes/sidebar.php"; ?>
        </div><!-- End of second column -->

    </div><!-- End of row -->

</div><!-- End of container -->

<div class="container">
    <hr>
    <?php include "includes/footer.php"; ?>
</div>
