<?php
require('db.php');

        $query = 'SELECT * FROM products WHERE P_Sale=1 ORDER BY P_ID LIMIT 12';
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $arrayIndex=0;
        $j = 0;
        for($i=0;$i<3;$i++){
        echo '<div class="carousel-item ';
        if($i===0){
            echo'active">';
     
        }
        else{
            echo'">';
        }
        echo '<div class="row">';
        $x=0;
        
        while ( $arrayIndex<count($row) and $x<4 ){
            $j++;
            
            echo '<div class="col-sm-3 p-2">';
            echo '<div class="card rounded p-1 bg-white">';
            echo '<div class="card-body">';
            echo '<img src="data:P_Image/png;base64,' .base64_encode($row[$arrayIndex]['P_Image']). '"class="center img-sm-fluid" width="150" height="150"/>';
            echo '<div style = "height:70px">';
            echo '<h5 class="card-title pt-3 pb-1 crop-text-2" id = "product'.$i.'"><a href = http://localhost/Web/productpage.php?q=' .$row[$arrayIndex]['P_ID']. '>' .$row[$arrayIndex]['P_FName'].'</a></h5>';
            echo '</div>';
            echo '<h6 class="mt-3 mb-3">';
            echo '<span class="card-title " style="color:#ff0000 ">Price: ' .$row[$arrayIndex]['P_PriceAfter'].' EGP</span>';
            echo '<span class="card-title "style="text-decoration:line-through;">' .$row[$arrayIndex]['P_Price'].' EGP</span>';
            echo '</h6>';
            echo '<div class="text-end">';                            
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