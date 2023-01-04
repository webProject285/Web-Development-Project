<?php
    require('db.php');

    $arr = $_GET['arr'];
    if($_GET['q'] === 'admin')
    {
        foreach($arr as $item)
        {
            $query = 'DELETE FROM products WHERE P_ID = '.$item;
            mysqli_query($conn,$query);
        }
    }
?>