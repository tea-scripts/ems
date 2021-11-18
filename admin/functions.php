<?php

# || ESCAPE ||
function escape($string){
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}

# || CONFIRM QUERY ||
function confirm_query($result){
  global $connection;
  if(!$result){
    die("Query Failed" . mysqli_error($connection));
  }
}

# || DELETE CATEGORY ||
function delete_category(){
  global $connection;
  if(isset($_GET['delete'])){
  $cat_id =$_GET['delete'];

  $query = "DELETE FROM categories WHERE cat_id = {$cat_id} ";
  $delete_categories = mysqli_query($connection, $query);

  header("Location: categories.php");
  }
}

# || ADD CATEGORIES ||
function add_categories(){
  global $connection;
  
  if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
    if($cat_title == '' || empty($cat_title)){
      echo "This field should not be empty";
    } 
    else{
      $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}') ";
      $create_category_query = mysqli_query($connection, $query);
      
      if(!$create_category_query){
        die("Query Failed" . mysqli_error($connection));
      }
    }
  }
}

# || FIND ALL CATEGORIES ||
function find_all_categories(){
  global $connection;

  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_categories)){
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];

      echo "<tr>";
      echo "<td>{$cat_id}</td>";
      echo "<td>{$cat_title}</td>";
      echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
      echo "</tr>";
    }
}

# || DELETING POSTS ||
function delete_posts () {
  global $connection;
  if(isset($_GET['delete'])){
  $delete_post_id = $_GET['delete'];
  
  $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
  $delete_query = mysqli_query($connection, $query);

  header("Location: posts.php");
  }
}

# || DELETING BOOKINGS ||
function delete_booking () {
  global $connection;
  if(isset($_GET['delete'])){
  $booking_id = $_GET['delete'];
  
  $query = "DELETE FROM bookings WHERE booking_id = {$booking_id} ";
  $delete_query = mysqli_query($connection, $query);

  header("Location: bookings.php");
  }
}

# || DELETING USERS ||

function delete_user () {
  global $connection;
  // if(isset($_SESSION['user_role'])){

    // if($_SESSION['user_role'] == 'admin'){
    

    if(isset($_GET['delete'])){
    $delete_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
    
    $query = "DELETE FROM users WHERE user_id = {$delete_user_id} ";
    $delete_query = mysqli_query($connection, $query);
  
    header("Location: users.php");
    }
  // }
  // }
}

# || SWITCH TO ADMIN ||

function switch_to_admin () {
  global $connection;

  if(isset($_GET['switch_to_admin'])){
  $user_id = $_GET['switch_to_admin'];
  $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id ";
  $approve_query = mysqli_query($connection, $query);

  header("Location: users.php");
  }
}

# || SWITCH TO EMPLOYEE ||

function switch_to_employee () {
  global $connection;

  if(isset($_GET['switch_to_employee'])){
  $user_id = $_GET['switch_to_employee'];
  $query = "UPDATE users SET user_role = 'employee' WHERE user_id = $user_id ";
  $approve_query = mysqli_query($connection, $query);

  header("Location: users.php");
  }
}

?>