<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <form action='' method='POST'>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="firstname">User First Name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" placeholder="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">User Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="lastname">
  </div>
  <div class="form-group">
    <label for="email">User Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="email">
  </div>
  <div class="form-group">
    <label for="userimage">User Image</label>
    <input type="file" class="form-control" name="userimage" id="userimage" aria-describedby="userimage" placeholder="userimage">
  </div>
  <div class="form-group">
    <select name="role" id="role">
      <option value="Admin">Admin</option>
      <option value="Subscriber" selected>Subscriber</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="randSalt">User randSalt</label>
    <input type="text" class="form-control" name="randSalt" id="randSalt" aria-describedby="role" placeholder="user randSalt">
  </div> -->

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<?php
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password']; 
    $first_name= $_POST['firstname'];
    $last_name= $_POST['lastname'];
    $email = $_POST['email'];
    $image = $_POST['userimage'];
    $role = $_POST['role'];


    $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_image, user_role ) VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$image', '$role')";

   mysqli_query($connection, $query);
} 
?>

        <?php include "includes/admin_footer.php" ?>