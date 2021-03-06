  <?php

if(isset($_GET['date'])){
  $date = $_GET['date'];
}
?>

<?php include "./includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "./includes/admin_navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
  <h1 class="page-header">
    Bookings
    <small></small>
  </h1>


<?php
  if(isset($_GET['source'])){
      $source = $_GET['source'];
  } else{
    $source = '';
  }

  switch($source){
    case 'add_booking':
        include "includes/add_booking.php";
      break;

    case 'edit_booking':
      include "includes/edit_booking.php";
      break;

    default:
    include "includes/view_all_bookings.php";
    break;
    }

  ?>

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