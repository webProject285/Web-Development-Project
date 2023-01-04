<?php
require('db.php');

        $query = 'SELECT * FROM products ORDER BY P_ID LIMIT 12';
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $arrayIndex=0;

        for($i=0;$i<3;$i++){
        echo '<div class="carousel-item active">';
        echo '<div class="row">';
        $x=0;

        while ( $arrayIndex<count($row) and $x<4){

            echo '<div class="col-sm-3 p-2">';
            echo '<div class="card rounded p-1 bg-white">';
            echo '<div class="card-body">';
            echo '<img src="data:P_Image/png;base64,' .base64_encode($row[$arrayIndex]['P_Image']). '"class="center img-sm-fluid" width="150" height="150"/>';
            echo '<div style = "height:70px">';
            echo '<h5 class="card-title pt-3 pb-1 crop-text-2">'.$row[$arrayIndex]['P_FName'].'</h5>';
            echo '</div>';
            echo '<h6 class="card-title pb-3">Price: ' .$row[$arrayIndex]['P_Price']. 'EGP </h6>';
            echo '<div class="text-end">';
            echo '<button type="button" class="btn buy button-h" style="font-weight:600; font-size: large;background-color: #f2e205;">+</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $arrayIndex++;
            $x++;
        }
        echo '</div>';
        echo '</div>';
        if($arrayIndex===count($row)){
            break;
        }
    }
?>