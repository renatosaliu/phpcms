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
  case 'add_post':
    include "includes/add_post.php";
    break;
    case 'edit_post':
      include "includes/edit_post.php";
      break;
    case 'error':
      include "includes/error.php";
      break;
    // case 'add_carosel':
    //   include "includes/add_carosel.php";
    //   break;

  default:
    include "includes/view_all_posts.php";
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
