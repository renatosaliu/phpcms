<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php" ?>

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">



                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

<?php
if(isset($_GET['source'])){
$source = $_GET['source'];

}else {
  $source = '';
}
switch ($source) {
  case 'add_user':
    include "includes/add_user.php";
    break;
    case 'edit_user':
      include "includes/edit_user.php";
      break;
    case 'error':
      include "includes/error.php";
      break;
    case '200':
      echo "nice 200";
      break;

  default:
    include "includes/view_all_users.php";
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

  <?php include "includes/admin_footer.php" ?>
