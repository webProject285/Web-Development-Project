<?php
    require('db.php');
    $priceMaxQuery = 'SELECT MAX(O_Price) FROM orders';

    $result = mysqli_query($conn,$priceMaxQuery);

    $priceMax = 0;

    while($row = mysqli_fetch_assoc($result))
        $priceMax = $row['MAX(O_Price)'];

    echo $priceMax;
?>