<?php

    if(isset($_GET['edit_user']))
    {
        $the_edit_user_id = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id = $the_edit_user_id";
        $select_all_users_data = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_all_users_data)) 
        {
           $user_id         = $row['user_id'];
           $username        = $row['username'];
           $password        = $row['password'];
           $user_firstname  = $row['user_firstname'];
           $user_lastname   = $row['user_lastname'];
           $user_email      = $row['user_email'];
           $user_image      = $row['user_image'];
           $user_role       = $row['user_role'];
        }
    }

    // if(isset($_POST['create_user']))
    // {
    //    $username            = mysqli_real_escape_string($connection, trim($_POST['username']));
    //    $password            = mysqli_real_escape_string($connection, trim($_POST['password']));
    //    $user_firstname      = mysqli_real_escape_string($connection, trim($_POST['user_firstname']));
    //    $user_lastname       = mysqli_real_escape_string($connection, trim($_POST['user_lastname']));
    //    $user_email          = mysqli_real_escape_string($connection, trim($_POST['user_email']));

    //    $user_image          = $_FILES['user_image']['name'];
    //    $user_image_tmp      = $_FILES['user_image']['tmp_name'];
    //    $user_role           = $_POST['user_role'];

       
       

    //    move_uploaded_file($user_image_tmp, "../images/$user_image");

    //    $query = "INSERT INTO users(username, password, user_firstname, user_lastname, user_email, 
    //                 user_image, user_role) VALUES('$username', '$password', '$user_firstname', '$user_lastname', 
    //                 '$user_email', '$user_image', '$user_role')";

    //     $create_user = mysqli_query($connection, $query);

    //     confirmQuery($create_user);

    // }

?>


<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
    </div>

    <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_image">Image</label>
        <img class="img-responsive" width="200" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" name="user_image" class="form-control">
    </div>

    <div class="form-group">
        <select name="user_role" class="form-control">
            <option value="Subscriber">Select User Role</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>

    </div>

    <div class="form-group">
        <input type="submit" value="Edit User" name="edit_user" class="btn btn-primary">
    </div>

</form>