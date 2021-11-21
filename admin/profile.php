<?php include "./includes/admin_header.php"; ?>

<?php

  if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];
    $query = "SELECT* FROM users WHERE username = '{$username}' ";
    $select_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_profile_query)){

      $user_id = $row['user_id'];
      $username= $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_role = $row['user_role'];
    }
  }
?>

<?php

  if(isset($_POST['edit_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$username}' ";

    $edit_profile_query  = mysqli_query($connection, $query);
    confirm_query($edit_profile_query);
  }

?>

  <div id="wrapper">

<!-- Navigation -->
<?php include "./includes/admin_navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
  <h1 class="page-header">
    Welcome to Admin
    <small>Author</small>
  </h1>

  <form action="" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control">
  </div>

  <!-- <div class="form-group">
    <select name="user_role" id="">
      <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

    <?php

      // if($user_role == 'admin'){
      //   echo "<option value='employee'>Employee</option>";
      // } else {
      //   echo "<option value='admin'>Admin</option>";
      // }

    ?>

      
    </select>
  </div> -->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username; ?>" name="username" class="form-control">
  </div>

  <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" name="user_email" class="form-control" cols="30" rows="10">
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" autocomplete="off" name="user_password" class="form-control">
  </div>

    <div class="form-group">
      <input type="submit" name="edit_user" class="btn btn-primary" value="Update Profile">
    </div>
  </div>


</form>


</div>
</div>






</div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "./includes/admin_footer.php" ?>