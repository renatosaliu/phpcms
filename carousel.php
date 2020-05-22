<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
$query = "SELECT * FROM carousel" ;
$result = mysqli_query($connection,$query);


if( $result ){ ?>

  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:600px;" >

    <ol class="carousel-indicators">
<?php
  foreach ($result as $index => $item){
    if( $index == 0 ){
      $active_class = 'active';
    }else{
      $active_class = '';
    }

  ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $index; ?>" class="<?php echo $active_class; ?>"></li>
  <?php
  }
  ?>
</ol>
  <div class="carousel-inner">
    <?php


    foreach ($result as $index => $item ){
      //$item=mysqli_fetch_assoc($result);

      $image = $item['image'];

      if( $index == 0 ){
        $active_class = 'active';
      }else{
        $active_class = '';
      }
      ?>
      <div class="item <?php echo $active_class; ?>">
        <img src="images/<?php echo $image ?>" alt="" >
      </div>
      <?php

    }

    ?>
  </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>

<?php
}



 ?>
