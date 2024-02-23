<?php include "includes/admin_header.php" ?>
<?php include "includes/functions.php" ?>
<?php include "includes/admin_navigation.php" ?>


<div id="wrapper">

    <!-- Navigation -->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                    </h1>

                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {

                        case 'add_user';
                            include "add_user.php";
                            break;

                        case 'edit_user';
                            include "edit_user.php";
                            break;

                  

                        default;
                            include "view_all_users.php";
                            break;
                    }

                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>