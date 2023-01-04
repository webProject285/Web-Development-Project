<?php 
    require('db.php');
    if(isset($_GET['p']) and $_GET['p'] == "0")
    {
      session_start();
      $_SESSION['search'] = $_GET['q'];
    }
    else if(isset($_GET['p']) and $_GET['p'] == "1")
    {
      $i = 0;
      session_start();
      $query = 'SELECT * FROM products WHERE P_FName LIKE "%'.$_SESSION['search'].'%"';
      $result = mysqli_query($conn,$query);
      while ($row = mysqli_fetch_assoc($result)){
          $i++;
          echo '<div class="col-md-4 p-2">';
          echo '<div class="card rounded p-1 bg-white">';
          echo '<div class="card-body">';
          echo '<img src="data:P_Image/png;base64,' .base64_encode($row['P_Image']). '"class="center img-sm-fluid" width="150" height="150"/>';
          echo '<div style = "height:70px">';
          echo '<h5 class="card-title pt-3 pb-1 crop-text-2" id = "product'.$i.'"><a href = http://localhost/Web/productpage.php?q=' .$row['P_ID']. '>' .$row['P_FName'].'</a></h5>';
          echo '</div>';
          if($row['P_Sale'] == 0){
            echo '<h6 class="card-title pb-3">Price: ' .$row['P_Price']. 'EGP </h6>';
          }
          else if ($row['P_Sale'] == 1){
            echo '<h6 class="card-title pb-3">Price: ' .$row['P_PriceAfter']. 'EGP </h6>';
          }                                    
          echo '<div class="text-end">';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>'; 
        }
    }
    /*
    $category = 'SELECT PC_ID FROM category WHERE PC_NAME = "' .$str. '"';
    $category_e = mysqli_query($conn, $category);
    $category_r = mysqli_fetch_assoc($category_e);
    $ids_array = array();
    $query = 'SELECT * FROM products WHERE PC_ID = '.$category_r['PC_ID'].'';
    $result = mysqli_query($conn, $query);
    }*/
?>