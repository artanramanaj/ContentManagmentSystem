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

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>
