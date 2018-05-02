<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
 
 if(isset($_POST['submit']))
 {
    $username       = mysqli_real_escape_string($connection, trim($_POST['username']));
    $email          = mysqli_real_escape_string($connection, trim($_POST['email']));
    $password       = mysqli_real_escape_string($connection, trim($_POST['password']));

    if(!empty($username) && !empty($email) && !empty($password))
    {
        $query = "SELECT randSalt FROM users";
        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            die("Query failed " . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($result))
        {
            $randSalt = $row['randSalt'];
        }

        $password = crypt($password, $randSalt);

        $query = "INSERT INTO users (username, password, user_email, user_role) VALUES('$username', '$password', '$email', 'subscriber')";
        $user_registration_query = mysqli_query($connection, $query);

        if(!$user_registration_query)
        {
            die("Query failed " . mysqli_error($connection));
        }
        else
        {
            echo "<h2 class='text-center text-success'>Your registration has been submitted</h2>";
        }
    }
    else
    {
        echo "<script>alert('Fields cannot be empty')</script>";
    }
 }
 
 
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
