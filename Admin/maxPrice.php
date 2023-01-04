<?php
    require('db.php');
    $priceMaxQuery = 'SELECT MAX(P_PriceAfter) FROM products';

    $result = mysqli_query($conn,$priceMaxQuery);

    $priceMax = 0;

    while($row = mysqli_fetch_assoc($result))
        $priceMax = $row['MAX(P_PriceAfter)'];

    echo $priceMax;
?>