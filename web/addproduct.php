<?php
    $conn = mysqli_connect('127.0.0.1', 'root','', 'metro1');
    if(mysqli_connect_errno()){
        echo 'Failed to connect';
    }
    $str = $_REQUEST["q"];
    $CID = $_REQUEST["t"];
    $checkOrderQuery = 'SELECT O_ID, O_Done FROM orders WHERE C_ID ='.$CID.' AND O_Done = 0';
    $checkOrderQuery_e = mysqli_query($conn, $checkOrderQuery);
    $checkOrderQuery_r = mysqli_fetch_assoc($checkOrderQuery_e);
    if (empty($checkOrderQuery_r)){
        $insertOrderQuery = 'INSERT INTO orders (O_Done, C_ID) VALUES (0,'.$CID.')';
        mysqli_query($conn, $insertOrderQuery);
        $checkOrderQuery = 'SELECT O_ID FROM orders WHERE C_ID = '.$CID.' AND O_Done = 0';
        $checkOrderQuery_e = mysqli_query($conn, $checkOrderQuery);
        $checkOrderQuery_r = mysqli_fetch_assoc($checkOrderQuery_e);
        $getProduct = 'SELECT P_ID, P_Quantity FROM products WHERE P_FName = "' .$str. '"';
        $getProduct_e = mysqli_query($conn, $getProduct);
        $getProduct_r = mysqli_fetch_assoc($getProduct_e);
        if ($getProduct_r['P_Quantity'] == 0){
            echo 'Sorry, Out Of Stock';
        }
        else {
        $insertProduct = 'INSERT INTO orders_products (O_ID, P_ID) VALUES ('.$checkOrderQuery_r['O_ID'].', ' .$getProduct_r['P_ID'].')';
        mysqli_query($conn, $insertProduct);
        echo 'Added to cart';
        }
    }
    else {
        $checkOrderQuery = 'SELECT O_ID FROM orders WHERE C_ID = '.$CID.' AND O_Done = 0';
        $checkOrderQuery_e = mysqli_query($conn, $checkOrderQuery);
        $checkOrderQuery_r = mysqli_fetch_assoc($checkOrderQuery_e);
        $getProduct = 'SELECT P_ID, P_Quantity FROM products WHERE P_FName = "' .$str. '"';
        $getProduct_e = mysqli_query($conn, $getProduct);
        $getProduct_r = mysqli_fetch_assoc($getProduct_e);
        if ($getProduct_r['P_Quantity'] == 0){
            echo 'Sorry Out Of Stock';
        }
        else {
        $insertProduct = 'INSERT INTO orders_products (O_ID, P_ID) VALUES ('.$checkOrderQuery_r['O_ID'].', ' .$getProduct_r['P_ID'].')';
        mysqli_query($conn, $insertProduct);
        echo 'Added to cart';
        }
    }
?>