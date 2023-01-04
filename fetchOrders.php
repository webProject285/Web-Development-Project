<?php
    require('db.php');
    $search = $_GET['search'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];
    
    if($_GET['q'] === 'admin')
    {
        if($search !== "")
        {
            $query = 'SELECT * FROM orders WHERE (O_Price BETWEEN ' .$minPrice. ' AND ' .$maxPrice.') AND O_ID LIKE "%'.$search.'%"';
        }
        else{
            $query = 'SELECT * FROM orders WHERE (O_Price BETWEEN ' .$minPrice. ' AND ' .$maxPrice.')';
        }
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                    $customerName = "";
                    $subQuery = 'SELECT C_Name FROM customers WHERE C_ID = ' . $row['C_ID'];
                    $subResult = mysqli_query($conn,$subQuery);
                    while($subRow = mysqli_fetch_assoc($subResult)){
                        $customerName = $subRow['C_Name'];
                    }
                    echo '<tr>
                    <td>
                    <input class="form-check-input productsCb" type="checkbox" name="productsCb">
                    </td>
                    <td>
                    <a href="#">' . $row['O_ID'] . '</a>
                    </td>
                    <td>
                    <a href="#">' . $row['C_ID'] . '</a>
                    </td>
                    <td>' . $customerName . '</td>
                    <td>' . $row['O_Date'] . '</td>
                    <td>' . $row['O_Done'] . '</td>
                    <td>$' . $row['O_Price'] . '</td>
                    <td>' . $row['A_ID'] . '</td>
                    </tr>';
            }
        }
    }
?>