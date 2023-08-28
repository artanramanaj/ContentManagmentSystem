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
            <td></td>
            <td></td>

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

                   

                 

              

                </tr>
            <?php }
        ?>
        <!-- delete a post -->
      
    </tbody>
</table>