<?php
session_start();
//connect to server
$con = mysqli_connect("localhost", "root", "") or die("Error: cant connect to server");

//connnect to db
$db = mysqli_select_db($con, "metro1") or die("Error: cant connect to server");


//(mysqli_real_escape_string)->bt3ml escape character 3la el qoutations ' ' 
//(mysqli_real_escape_string)to prevent sql injection attack bt3ml escape character 3la el qoutations ' ' 
//(mysqli_real_escape_string)to prevent sql injection attack


//get the data enter by the user using post method
$mail = $_POST['C_Email'];
$pwd =  $_POST['C_Password'];



//compare the data user enterd with the data in database
$login = "SELECT C_ID,C_Name, C_Email ,C_Password FROM customers WHERE  C_Email = ?"; // ? to use sql prepare statment for the sql injection attack
$stmt = mysqli_prepare($con, $login);  //sqli_prepare for execution

//binding the ? with values
mysqli_stmt_bind_param($stmt, "s", $mail);

mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

$count = mysqli_stmt_num_rows($stmt);


//if the data enterd is true
if ($count == 1) {     //count == 1 affected row only 1

    //verification for hasing to compare the enterd password with password in database

    mysqli_stmt_bind_result($stmt ,$C_ID,$C_Name , $rowEmail, $rowPassword);

    mysqli_stmt_fetch($stmt);

// if enterd password = to hase password in the database

    if (password_verify($pwd, $rowPassword)) { 
        $_SESSION['USER_ID']=$C_ID;
        $_SESSION['USER_NAME']=$C_Name;
        //open the  website
        header("Location: metro1.php");
        exit();

    }
    else{
        header("Location: sign_faild.php");
        exit();
    }
} else {
    include("sign_faild.php");
    //if data is false return to login page agin
    // include("signup.php");
}
