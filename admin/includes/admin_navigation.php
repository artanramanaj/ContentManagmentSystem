<?php
include "authentification.php";
?>

<?php 
 if(isset($_SESSION['username'])) {
 
    $username = $_SESSION['username'];
    
 } 
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li><a href="../index.php">Home Page</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username ?> <b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>


                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" ><i
                        class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="post_dropdown" >
                    <li>
                        <a href="posts.php">View all posts</a>
                    </li>
                    <li>
                        <a href="addposts.php">Add posts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-table"></i> Categories</a>
            </li>


            <li>
                <a href="comments.php"><i class="fa fa-fw fa-wrench"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" ><i class="fa fa-fw fa-arrows-v"></i>
                    Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" >
                    <li>
                        <a href="users.php">View all users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Add user</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-file"></i> Profile</a>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>