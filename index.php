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
       
            <?php
            

            }
          
            ?>

    <?php
   if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$results_per_page = 3;  
$page_first_result = ($page-1) * $results_per_page; 


$query = "SELECT * from posts";  
$result = mysqli_query($connection, $query);  
$number_of_result = mysqli_num_rows($result);  
  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  


$query = "SELECT *FROM posts LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($connection, $query);  
      
    //display the retrieved result on the webpage  
    echo "<div class='col-lg-6 paggination-div'>";
    while ($post_col = mysqli_fetch_assoc($result)) {
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


            for($page = 1; $page<= $number_of_page; $page++) {  
                if(isset($_GET["page"])) {
                   $current_active_page = $_GET["page"];
                } 
          

                echo $current_active_page == $page 
                ? '<a class="pagination-active" href="index.php?page=' . $page . '">' . $page . '</a>' 
                : '<a class="pagination" href="index.php?page=' . $page . '">' . $page . '</a>';
            
            }
               
                echo "</div>";
    ?>


    <div>
        <?php include "includes/sidebar.php"; ?>
    </div>
</div>

<div class="container">
    <hr>
    <?php include "includes/footer.php"; ?>
</div>
