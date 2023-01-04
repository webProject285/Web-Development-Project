<?php
    require('db.php');
    $search = $_GET['search'];
    
    if($_GET['q'] === 'admin')
    {
        if($search !== "")
        {
            $query = 'SELECT * FROM customers WHERE C_Email LIKE "%'.$search.'%"';
        }
        else{
            $query = 'SELECT * FROM customers';
        }
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                    <td>
                    <input class="form-check-input productsCb" type="checkbox" name="productsCb">
                    </td>
                    <td>
                    <a href="#">' . $row['C_ID'] . '</a>
                    </td>
                    <td>' . $row['C_Name'] . '</td>
                    <td>' . $row['C_Email'] . '</td>
                    <td>' . $row['C_Number'] . '</td>
                    <td>' . $row['C_Address'] . '</td>
                    </tr>';
            }
        }
    }
?>