<?php include "includes/admin_header.php" ?>
<?php include "includes/functions.php" ?>
<?php session_start() ?>
<div id="wrapper">
<div class="container-fluid">
<div id="page-wrapper">


<?php 

$get_user_username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$get_user_username'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $password = $row['user_password'];
    $firstname = $row['user_firstname'];
    $lastname = $row['user_lastname'];
    $email = $row['user_email'];
    $image = $row['user_image'];
    $role = $row['user_role'];

?>
<h1>Edit your profile <?php echo $username ? $username : "user"; ?></h1>
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>



    <form action='' method='POST'>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username ?>" class="form-control" name="username" id="username" aria-describedby="username" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" value="<?php echo $password ?>" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="firstname">User First Name</label>
    <input type="text" value="<?php echo $firstname ?>" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" placeholder="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">User Last Name</label>
    <input type="text" value="<?php echo $lastname ?>" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="lastname">
  </div>
  <div class="form-group">
    <label for="email">User Email</label>
    <input type="email" value="<?php echo $email ?>" class="form-control" id="email" name="email" aria-describedby="email" placeholder="email">
  </div>
  <div class="form-group">
    <label for="userimage">User Image</label>
    <input type="file" value="<?php echo $image ?>"  class="form-control" name="userimage" id="userimage" aria-describedby="userimage" placeholder="userimage">
  </div>
  <div class="form-group">
    <select name="role" id="role" value="<?php echo $role ?>">
      <option value="Admin">Admin</option>
      <option value="Subscriber">Subscriber</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="randSalt">User randSalt</label>
    <input type="text" class="form-control" name="randSalt" id="randSalt" aria-describedby="role" placeholder="user randSalt">
  </div> -->

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php } ?>


<?php 

if(isset($_SESSION['username'])) {
    
  if(isset($_POST['submit'])) {
    echo "yeahahahhaha";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username ='$username', user_password ='$password', user_firstname='$firstname', user_lastname='$lastname', user_email='$email', user_role='$role'
    
    WHERE username= '$username'";

    $res = mysqli_query($connection,$query);
  }
}

?>

        </div>
          </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php" ?>