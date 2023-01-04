<?php
//	session_start();
	require 'db.php';  //in config.php code to connect to the database

	





	// Remove single items from cart
	if (isset($_GET['remove'])) { //checks whether a variable is set
	  $id = $_GET['remove'];    //take the id of the product you want to remove and store it in$id

	  //execute query to delet product from database
	  $stmt = $conn->prepare('DELETE FROM orders_products WHERE P_ID=?');  //excute query using prepare statment
	 //A prepared statement is a feature used to execute the same  SQL statements
     

      $stmt->bind_param('i',$id);  //bind the id varable
	//search in the database for the product with id =$_GET['remove'];
	//binds the parameters to the SQL query and tells the database what the parameters are.
     
      $stmt->execute();//excute the query

	  $_SESSION['showAlert'] = 'block';      //display a the message box in it Item removed from the cart!
	  $_SESSION['message'] = 'Item removed from the cart!'; //the message
	  include('shoppingcart.php');
      // or  header('location:cart.php');
	}



	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM products');  //excute query using prepare statment
      //A prepared statement is a feature used to execute the same  SQL statements
      
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';           //display a the message box i
	  $_SESSION['message'] = 'All Item removed from the cart!';  //message
	  include('cart.php');
      // or  header('location:cart.php');
	}



	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];                //value came from cart.php (ajax func)
	  $pid = $_POST['pid'];               //value came from cart.php (ajax func)
	  $pprice = $_POST['pprice'];        //value came from cart.php (ajax func)

	  $tprice = $qty * $pprice;     //calculate the total price

	  $stmt = $conn->prepare('UPDATE cart SET P_Quantity=?, P_Price=? WHERE P_ID=?'); //update the values using the ID of the product
		//excute query using prepare statment
	 //A prepared statement is a feature used to execute the same  SQL statements

	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}






	
?>