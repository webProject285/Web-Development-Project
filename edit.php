<?php
session_start();
    require('db.php');
    if(isset($_GET['q']))
    {
        $query = 'UPDATE products SET P_FName="'.$_GET['pname'].'",P_Quantity='.$_GET['pquantity'].',P_Name="'.$_GET['pbrand'].'",P_Sale='.$_GET['psale'].',P_Price='.$_GET['pprice'].',P_PriceAfter='.$_GET['ppriceafter'].',PC_ID='.$_GET['pcats'].',A_ID='.$_GET['padmins'].',P_Description="'.$_GET['pdis'].'" WHERE P_ID = '.$_SESSION['P_ID'];
        mysqli_query($conn,$query);
    }
?>