<table class="table table-hover ">
    <thead>
        <tr>
            <td>Id</td>
            <td>username</td>
            <td>FirstName</td>
            <td>LastName</td>
            <td>Email</td>
            <td>image</td>
            <td>Role</td>
            <td>Date</td>
            <td>Delete User</td>
            <td>Role Admin</td>
            <td>Role Subscriber</td>
            <td>Edit User</td>

        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

            if(!$query) {
                die("query failed"). mysqli_error($connection);
            }
            while($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $user_password = $row['user_password'];
                ?>
                <tr>
                    <td>
                        <?php echo $row['user_id']; ?>
                    </td>
               
                    <td>
                        <?php echo $row['username'] ?>
                    </td>
                    <td>
                        <?php echo ucfirst($row['user_firstname'])  ?>
                    </td>

                    <td>
                        <?php echo ucfirst($row['user_lastname']) ?>
                    </td>
                    <td>
                        <?php echo $row['user_email'] ?>
                    </td>
                    <td>
                    </td>
                 
                    <td>
                        <?php echo $row['user_role'] ?>
                    </td>

                    <td>
                    </td>
                    <td>
                    <a class="link-secondary" href="users.php?delete_user=<?php echo $user_id ?>" >

                    <button class="btn btn-danger">
                    Delete
                </button>
            </a>

            </td>
                    <td>
                    <a class="link-dark" href="users.php?role_admin=<?php echo $user_id ?>" >

                    <button class="btn btn-primary">
                    Admin
                </button>
            </a>

            </td>
                    <td>
                    <a class="link-secondary" href="users.php?role_subscriber=<?php echo $user_id ?>" >

                    <button class="btn btn-info">
                    Subscriber
                </button>
            </a>

            </td>


            </td>
                    <td>
                    <a class="link-secondary" href="users.php?source=edit_user&userid=<?php echo $user_id?>" >

                    <button class="btn btn-warning">
                    Edit user
                </button>
            </a>

            </td>

                   

                 

              

                </tr>
            <?php }
        ?>
        <!-- delete a user -->

      <?php
      
      if(isset($_GET['delete_user'])){
        $delete_user_id = $_GET['delete_user'];
        $query = "DELETE FROM users WHERE user_id =  $delete_user_id ";
        $delete_user = mysqli_query($connection, $query);
        header('Location: users.php');
        exit;
      } 

      if(isset($_GET['role_admin'])) {
        $user_id_role = $_GET['role_admin'];
        $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id_role ";
        $result = mysqli_query($connection, $query);
        header('Location: users.php');
        exit;
      }

      if(isset($_GET['role_subscriber'])) {
        $user_id_role = $_GET['role_subscriber'];
        $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $user_id_role ";
        $result = mysqli_query($connection, $query);
        header('Location: users.php');
        exit;
      }

      ?>
    </tbody>
</table>