
<?php
include "includes/functions.php";
if(!isset($_GET['p_id'])){
header('Location:posts.php?source=error');
exit;
}

$the_post_id = $_GET['p_id'];

//$query = 'Select * FROM posts WHERE post_id = '.$the_post_id;
$query = "Select * FROM posts WHERE post_id = {$the_post_id}";
$select_posts_by_id = mysqli_query($connection,$query);


if( ! mysqli_num_rows($select_posts_by_id) ){
  header('Location:posts.php?source=error');
  exit;
}

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
$post_tags = $row['post_tags'];
$post_comments_count = $row['post_comments_count'];
$post_date = $row['post_date'];

}
if(isset($_POST['update_post'])){


$post_author = $_POST['post_author'];
$post_title = $_POST['post_title'];
$post_category_id = $_POST['post_category'];
$post_status = $_POST['post_status'];
$post_image = $_FILES['image']['name'];
$post_image_temp = $_FILES['image']['tmp_name'];
$post_content = $_POST['post_content'];
$post_tags = $_POST['post_tags'];

move_uploaded_file($post_image_temp, "../images/$post_image");

  if(empty($post_image)){
    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_image = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_image)){
      $post_image = $row['post_image'];

    }

  }


    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$the_post_id}' ";

    $update_post = mysqli_query($connection,$query);

    confirmQuery($update_post);
}

 ?>

<form  action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" class = "form-control" name="post_title">
  </div>

  <div class="form-group">

    <?php
     $query = "SELECT * FROM categories";
     $select_categories = mysqli_query($connection,$query);

    confirmQuery($select_categories);
     ?>
     <label for="post_category_id">Post category</label>
     <br>
    <select name="post_category" id="post_category">

      <?php
      while($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value = '{$cat_id}'>{$cat_title}</option>";

      }
      ?>


    </select>
    <br>

    <!-- <input value="<?php echo $post_category_id; ?>" type="text" class = "form-control" name="post_category_id"> -->
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" class = "form-control" name="post_author">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post_status; ?>" type="text" class = "form-control" name="post_status">
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <br>
    <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
    <br> <br>

    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" class = "form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class = "form-control" name="post_content" id="bodyyy" cols="30" rows="10"><?php echo $post_content; ?>

    </textarea>
  </div>


  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
  </div>

</form>
