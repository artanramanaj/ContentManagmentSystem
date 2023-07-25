<?php
include "includes/db.php";

$get_categories = "SELECT * FROM categories";
$response = mysqli_query($connection, $get_categories);
?>

<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default"  name="submit" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        </form>

    </div>




    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php 
                    while ($row = mysqli_fetch_assoc($response)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        ?>
                        <li><a href="./posts_categories.php?cat_id=<?php echo $cat_id ?>"><?php echo $cat_title; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>