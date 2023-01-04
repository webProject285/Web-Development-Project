<?php
    require('db.php');
    $query = 'SELECT A_ID,A_Name FROM admins';
    $result = mysqli_query($conn,$query);
    echo '<option value="1">None</option>';
    $i = 2;
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$i.'">'.$row['A_ID'].'</option>';
        $i++;
    }
?>