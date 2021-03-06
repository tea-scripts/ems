<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=> 12));

        $query = "INSERT INTO users (username, user_email, user_firstname, user_lastname, user_password, user_role) VALUES ('{$username}', '{$email}', '{$firstname}', '{$lastname}', '{$password}', 'customer' )";
        $register_user_query = mysqli_query($connection, $query);
        if(!$register_user_query){
            die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }

        $message = "<p class='bg-success'>Your registration has been submitted!</p>";
    }
    else{
        $message = "Fields cannot be empty";
    }
} else {
    $message = '';
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
          <?php if(isset($_POST['register'])){
            echo "<div class='alert'><a href='index.php' class='btn btn-primary'>Login here </a></div>";
          } ?>
        <h1>Register</h1>
          <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
              <h6 class="text-center"> <?php echo $message;  ?> </h6>
              <div class="form-group">
                <label for="username" class="sr-only">username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
              </div>
              <div class="form-group">
                <label for="username" class="sr-only">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your firstname">
              </div>
              <div class="form-group">
                <label for="username" class="sr-only">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Your lastname">
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
              </div>
      
              <input type="submit" style="width: 50%; margin: 0 auto;" name="register" id="btn-login" class="btn btn-primary btn-custom btn-lg btn-block" value="Register">
          </form>
        </div>
      </div> <!-- /.col-xs-12 -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</section>


        <hr>

<div style="text-align: center;">

  <?php include "includes/footer.php";?>

</div>
