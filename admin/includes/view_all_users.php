<table class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Admin</th>
    <th>Employee</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>

<?php

  $query = "SELECT * FROM users ";
  $select_users = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  
  
  echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>";
    echo "<td>$user_email</td>";
    echo "<td>$user_role</td>";
    
# || ACTION BUTTONS ||
  echo "<td><a href='users.php?switch_to_admin={$user_id}'>Admin</a></td>";
  echo "<td><a href='users.php?switch_to_employee={$user_id}'>Employee</a></td>";
  echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
  // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='users.php?delete={$user_id}'>Delete</a></td>";
  echo "<td><a rel='$user_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
  echo "</tr>";
  }
?>

</tr>
</tbody>
</table>
<!-- || DELETE MODAL || -->
<?php include "delete_modal.php"; ?>

<!-- || SWITCH TO ADMIN || -->
<?php switch_to_admin(); ?>

<!--  || SWITCH TO EMPLOYEE || -->
<?php switch_to_employee(); ?>

<!-- || DELETE USER || -->
<?php delete_user(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $('.delete_link').on('click', function(){
      var id = $(this).attr("rel");
      var delete_url = 'users.php?delete=' + id + '';
      $('.modal_delete_link').attr("href", delete_url);
      $("#myModal").modal('show');
    })
  });
</script>