<?php include "includes/admin_header.php" ?>
<?php session_start() ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <?php 
                            if(isset($_SESSION['username'])) {
                                echo '<small>' . $_SESSION['username'] . '</small>';
                            } 
                            ?>
                        </h1>
                     
                          <?php 
                          
                          if(isset($_SESSION['user_role'])) {
                            if($_SESSION['user_role'] !== "Admin") {
                                header("location: ../index.php");
                            } 
                          }

                          ?>
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
       
                <!-- /.row -->

                <?php
           
                
                            $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                            $response = mysqli_query($connection, $query);

                            $post_count =  mysqli_num_rows($response);


                            $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                            $response = mysqli_query($connection, $query);

                            $comment_count = mysqli_num_rows($response);

                         
                           
                            $query = "SELECT * FROM users WHERE user_role = 'Admin'";
                            $response = mysqli_query($connection, $query);

                            $users_count = mysqli_num_rows($response);


                            $query = "SELECT * FROM categories";
                            $response = mysqli_query($connection, $query);

                            $categories_count = mysqli_num_rows($response);

                ?>
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php   echo $post_count; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php    echo  $comment_count ; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php  echo $users_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php  echo  $categories_count ;  ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


<?php
           
                
           $query = "SELECT * FROM posts WHERE post_status = 'draft'";
           $response = mysqli_query($connection, $query);
           $draft_posts = mysqli_num_rows($response);

         



           $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
           $response = mysqli_query($connection, $query);

           $unapprroved_comments  = mysqli_num_rows($response);

        

        
          
           $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
           $response = mysqli_query($connection, $query);

           $subscriber_users = mysqli_num_rows($response);


           $query = "SELECT * FROM categories";
           $response = mysqli_query($connection, $query);

           $categories_count = mysqli_num_rows($response);

?>



                <!-- /.row -->

                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Information', 'Count', 'Count'],

          <?php 
          $elements = ['Published&Draft Posts', 'Approved&Unapproved Comments', 'Admin&Subscriber Users', 'Categories'];
          $counts = [$post_count, $comment_count, $users_count, $categories_count];
          $extra_info = [$draft_posts, $unapprroved_comments, $subscriber_users, 0];

          for($i = 0; $i < count($elements) ; $i++) {
            echo "['{$elements[$i]}'" ." ," . "{$counts[$i]}" . " ," . "{$extra_info[$i]}], ";
          }

          ?>
          
      
      
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<div id="columnchart_material" style="width: 100%; height: 500px;"></div>

        </div>
        <!-- /#page-wrapper -->

        

<?php include "includes/admin_footer.php" ?>
