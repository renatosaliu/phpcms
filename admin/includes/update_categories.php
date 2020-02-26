<?php include "../../includes/db.php"; ?>


<?php
  if(isset($_POST['update_category'])){

    $cat_id = $_POST['cat_id'];
    $the_cat_title = $_POST['cat_title'];

    $query = "UPDATE categories SET cat_title ='{$the_cat_title}' WHERE cat_id = {$cat_id} ";
    $update_query = mysqli_query($connection,$query);
    if(!$update_query){
      die("QUERY FAILED" . mysqli_error($connection));
    }
  }
header('Location: ../categories.php'); exit;
?>
