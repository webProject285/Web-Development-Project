<?php
    session_start();
    if(isset($_GET['q']))
    {
        $_SESSION['P_ID'] = $_GET['pid'];
    }else{
        echo $_SESSION['P_ID'];
    }
?>