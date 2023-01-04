<?php
    require('db.php');

    if(isset($_POST['submit']))
    {
        $imgData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $images = 'UPDATE products SET P_Image = "'.$imgData.'" WHERE P_ID = (SELECT MAX(P_ID) FROM products)';
        mysqli_query($conn,$images);

        header("Location: adminProducts.html");
        exit();
    }  
?>