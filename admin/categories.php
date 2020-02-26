<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php" ?>

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mireserdhet te paneli i Adminit !
                            <small>Admini</small>
                        </h1>

                        <div class="col-xs-6">


                          <?php
                          if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];

                              $query = "INSERT INTO categories(cat_title)";
                              $query .= "VALUE('{$cat_title}')";
                              $create_category_query = mysqli_query($connection,$query);
                              if(!$create_category_query){
                                die('QUERY FAILED') . mysqli_error($connection);
                              }
                            }

                           ?>



                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                          <div class="form-group">
                            <label for="cat-title">Shto Kategori</label>
                            <input class="form-control" type="text" required <?php if(!isset($_GET['edit'])){ echo 'autofocus'; } ?> name="cat_title">
                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Shto Kategori">
                          </div>

                        </form>





                  <?php

                  if(isset($_GET['edit'])){?>

                                            <form action="includes/update_categories.php" method="post">
                                              <div class="form-group">
                                                <label for="cat-title">Edito Kategori</label>

                    <?php
                             $cat_id = $_GET['edit'];





                            $query = "SELECT * FROM categories  WHERE cat_id = $cat_id ";
                            $select_categories_id = mysqli_query($connection,$query);


                            while ($row=mysqli_fetch_assoc($select_categories_id)) {
                              $cat_id = $row['cat_id'];
                              $cat_title = $row['cat_title'];



                       ?>
                       <input value="<?php if (isset($cat_id)){echo $cat_id;}?>" class="form-control" type="hidden" name="cat_id">

<input value="<?php if (isset($cat_title)){echo $cat_title;} ?>" class="form-control edit_field" type="text" required autofocus name="cat_title">


<?php } ?>


                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_category" value="Edito Kategori">
                          </div>

                        </form>
                        <script>
                          var input = document.querySelector('.edit_field');
                          var len = input.value.length;
                          input.focus();
                          input.setSelectionRange(len, len);

                        </script>
<?php }  ?>








                      </div><!--Add Category Form-->

                      <div class="col-lg-6">
                        <table class="table table-bordered table-hover" id="sortable">
                          <thead>
                            <tr>
                            <th>Id</th>
                            <th>Titulli i Kategorise</th>
                            <th>Fshi</th>
                            <th>Ndrysho</th>
                          </tr>
                        </thead>
                        <tbody>


                          <?php //find all categories query

                          $query = "SELECT * FROM categories";
                          $select_categories = mysqli_query($connection,$query);


                          while ($row=mysqli_fetch_assoc($select_categories)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<tr>";
                            echo "<td>{$cat_id}</td> ";
                            echo "<td>{$cat_title}</td> ";

                            echo "<td><a href= 'categories.php?delete= {$cat_id}'> Fshi </a> </td> ";
                                   echo "<td><a href= 'categories.php?edit= {$cat_id}'> Ndrysho </a> </td> ";



                            echo "</tr>";
                          }

                          ?>

      <?php //DELETE QUERY

 if(isset($_GET['delete'])){
      $the_cat_id = $_GET['delete'];
       $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
      $delete_query = mysqli_query($connection,$query);
      header("Location: categories.php");

 }


        ?>



                        </tbody>
                      </table>




                    </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php" ?>
