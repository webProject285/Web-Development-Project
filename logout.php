<?php
session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
//open the  website
header("Location: metro1.php");
die();
?>