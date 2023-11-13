<?php include "includes/admin_header.php" ?>

<?php
if(isset($_GET['userid'])) {
  $userId = $_GET['userid'];
}
$query = "SELECT * FROM users WHERE user_id =  $userId ";
$result = mysqli_query($connection, $query);


while($row = mysqli_fetch_assoc($result)) {
    $username_ = $row['username'];
    $password = $row['user_password'];
    $first_name = $row['user_firstname'];
    $last_name = $row['user_lastname'];
    $email = $row['user_email'];
    $image = $row['user_image'];
    $role = $row['user_role'];

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <form action='' method='POST'>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username_ ?>" class="form-control" name="username" id="username" aria-describedby="username" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" value="<?php echo $password ?>" name="password" class="form-control" id="exampleInputPassword1" >
  </div>

  <div class="form-group">
    <label for="firstname">User First Name</label>
    <input type="text" value="<?php echo $first_name ?>" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" >
  </div>
  <div class="form-group">
    <label for="lastname">User Last Name</label>
    <input type="text" value="<?php echo $last_name ?>" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" >
  </div>
  <div class="form-group">
    <label for="email">User Email</label>
    <input type="email" value="<?php echo $email ?>" class="form-control" id="email" name="email" aria-describedby="email" >
  </div>
  <!-- <div class="form-group">
    <label for="userimage">User Image</label>
    <input type="file" class="form-control" name="userimage" id="userimage" aria-describedby="userimage" >
  </div> -->
  <div class="form-group">
    <select name="role" id="role"  value="<?php echo $role ?>">
      <option value="Admin" <?php if($role =='Admin') echo 'selected' ?>>Admin</option>
      <option value="Subscriber" <?php if($role =='Subscriber') echo 'selected' ?>>Subscriber</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="randSalt">User randSalt</label>
    <input type="text" class="form-control" name="randSalt" id="randSalt" aria-describedby="role" placeholder="user randSalt">
  </div> -->

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<?php


    $user_edit_id = $_GET["userid"];
    

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $first_name= $_POST['firstname'];
    $last_name= $_POST['lastname'];
    $email = $_POST['email'];
    // $image = $_POST['userimage'];
    $role = $_POST['role'];

    $query = "SELECT randSalt FROM users";
    $select_randSalt = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($select_randSalt);
    $salt =  $row['randSalt'];

    $password = crypt($password, $salt);


    $query = "UPDATE users SET username = '$username',  user_password = '$password',  user_firstname = '$first_name', user_lastname= '$last_name', user_email='$email', user_role = '$role' WHERE user_id = $user_edit_id";

   $res = mysqli_query($connection, $query);
   header('Location: users.php');
   exit;
} 
?>
<?php } ?>
        <?php include "includes/admin_footer.php" ?>