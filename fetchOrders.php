<?php
    require('db.php');
    $search = $_GET['search'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];
    
    if($_GET['q'] === 'admin')
    {
        if($search !== "")
        {
            $query = 'SELECT * FROM orders WHERE (O_ID BETWEEN ' .$minPrice. ' AND ' .$maxPrice.') AND P_FNAME LIKE "%'.$search.'%"';
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
                    <td class="text-end">
                    <div class="dropdown text-center">
                    <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                    <a href="test.html" class="dropdown-item">Edit</a>
                    <a href="#" class="dropdown-item">Delete</a>
                    <a href="#" class="dropdown-item">Something else here</a>
                    </div>
                    </div>
                    </td>
                    </tr>';
            }
        }
    }
?>