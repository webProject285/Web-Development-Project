<?php
    $conn = mysqli_connect('127.0.0.1', 'root','', 'metro1');
    if(mysqli_connect_errno()){
        echo 'Failed to connect';
    }
    $i = 0;
    if ($_REQUEST["q"] != "categoryCheck"){
        $str = $_REQUEST["t"];
        $category = 'SELECT PC_ID FROM category WHERE PC_NAME = "' .$str. '"';
        $category_e = mysqli_query($conn, $category);
        $category_r = mysqli_fetch_assoc($category_e);
        $array = array();
        $array = $_REQUEST["q"];
        $query = 'SELECT * FROM products WHERE PC_ID = '.$category_r['PC_ID'].'';
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $i++;
            if(strpos($array, $row['P_Name'])!== false){
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
            else if (strpos($array, "Sale")!== false){
                if($row['P_Sale'] == 1){
                    echo '<div class="col-md-4 p-2">';
                    echo '<div class="card rounded p-1 bg-white">';
                    echo '<div class="card-body">';
                    echo '<img src="data:P_Image/png;base64,' .base64_encode($row['P_Image']). '"class="center img-sm-fluid" width="150" height="150"/>';
                    echo '<div style = "height:70px">';
                    echo '<h5 class="card-title pt-3 pb-1 crop-text-2" id = "product'.$i.'"><a href = http://localhost/Web/productpage.php?q=' .$row['P_ID']. '>' .$row['P_FName'].'</a></h5>';
                    echo '</div>';
                    echo '<h6 class="card-title pb-3">Price: ' .$row['P_PriceAfter']. 'EGP </h6>';
                    echo '<div class="text-end">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
    }
    else {
        $str = $_REQUEST["t"];
        $category = 'SELECT PC_ID FROM category WHERE PC_NAME = "' .$str. '"';
        $category_e = mysqli_query($conn, $category);
        $category_r = mysqli_fetch_assoc($category_e);
        $array = array();
        $array = $_REQUEST["q"];
        $query = 'SELECT * FROM products WHERE PC_ID = '.$category_r['PC_ID'].'';
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
?>