<?php
    require('db.php');

    if(isset($_GET['q']))
    {
        $pname = $_GET['pname'];
        $pbrand = $_GET['pbrand'];
        $pquantity = $_GET['pquantity'];
        $pprice = $_GET['pprice'];
        $ppriceafter = $_GET['ppriceafter'];
        $psale = $_GET['psale'];
        $pcats = $_GET['pcats'];
        $padmins = $_GET['padmins'];
        $pdis = $_GET['pdis'];

        $query = 'INSERT INTO products (P_FName, P_Quantity, P_Name, P_Sale, P_Price, P_PriceAfter, PC_ID, A_ID, P_Description) VALUES ("'.$pname.'",'.$pquantity.',"'.$pbrand.'",'.$psale.','.$pprice.','.$ppriceafter.','.$pcats.','.$padmins.',"'.$pdis.'")';
        mysqli_query($conn,$query);
    }  
?>