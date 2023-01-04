<?php

//connect to server

$con = mysqli_connect("localhost", "root", "") or die("Error: cant connect to server");

//connnect to db

$db = mysqli_select_db($con, "metro1") or die("Error: cant connect to server");




$username = $_POST['C_Name'];
$phone = $_POST['C_Number'];
$addressUser = $_POST['C_Address'];
$email = $_POST['C_Email'];

$password = $_POST['C_Password'];
$passwordHashed = password_hash($password, PASSWORD_DEFAULT); //hasing the password in database using passwordHashed

if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {

    include("sign_faild.php");
    exit();
}





//add information from sign-up form to db
$insertuser = "INSERT INTO customers (C_Name,C_Number,C_Address,C_Email,C_Password) value(?,?,?,?,?)";

$stmt = mysqli_prepare($con, $insertuser);
//binding the ? with values
mysqli_stmt_bind_param($stmt, "sssss", $username,$phone, $addressUser, $email, $passwordHashed);

$result = mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

$count = mysqli_stmt_num_rows($stmt);






//if user enter the information right
if ($result) {
    //user wiil add successfully
   

    include("sign_success.php"); //login success message

    
    
} else {
    //if ddata is wrong will give error
    include("sign_faild.php");
    
}
