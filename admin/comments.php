<?php include "includes/admin_header.php" ?>
<?php include "includes/functions.php" ?>
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
                        <small>Author</small>
                    </h1>

                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {

                        case 'addposts';
                            include "addposts.php";
                            break;

                        case 'edit_posts';
                            include "edit_post.php";
                            break;

                        case 'view_all_comments';
                        include "view_all_comments.php";
                            break;

                        default;
                            include "view_all_comments.php";
                            break;
                    }

                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>