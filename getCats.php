<?php
    require('db.php');
    $query = 'SELECT PC_ID,PC_Name FROM category';
    $result = mysqli_query($conn,$query);
    echo '<option value="1">None</option>';
    $i = 2;
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$i.'">'.$row['PC_ID'].'</option>';
        $i++;
    }
?>