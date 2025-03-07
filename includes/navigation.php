<?php include "includes/db.php" ?>
<?php session_start() ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS FRONT</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Service</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="registration.php">Register</a>
                </li>
                <?php
                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
                    echo "<li> <a href='./admin/index.php'>Admin</a></li>";
                } else {
                    echo "<li> <a href='./index.php'>Admin</a></li>";
                }
                ?>
                <!-- <li>
                    <a href='includes/login.php'>Admin</a>
                </li> -->
                <?php
                if (isset($_SESSION['username']) && isset($_GET['p_id'])) {
                    $postid = $_GET['p_id'];
                    ?>
                    <li>
                        <a href='admin/posts.php?source=edit_posts&edit=<?php echo $postid ?>'>Edit POST</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>