<?php 

//error_reporting(0);
//connect to server

$con = mysqli_connect("localhost", "root", "") or die("Error: cant connect to server");

//connnect to db

$db = mysqli_select_db($con, "metro1") or die("Error: cant connect to server");




$C_Name = $_POST['C_Name'];
$C_Number = $_POST['C_Number'];
$C_Email = $_POST['C_Email'];
$C_Address = $_POST['C_Address'];
$C_City = $_POST['C_City'];






session_start();


//add information from sign-up form to db
$updatetuser = "UPDATE `customers` SET `C_Name`='$C_Name',`C_Number`='$C_Number',`C_Address`='$C_Address',`C_Email`='$C_Email' WHERE C_ID=".$_SESSION['USER_ID'];
$_SESSION['USER_NAME'] = $C_Name;


$stmt = mysqli_prepare($con, $updatetuser);

$result = mysqli_stmt_execute($stmt) or die("error");
mysqli_stmt_store_result($stmt);

$count = mysqli_stmt_num_rows($stmt);

include ("update_success.php");







