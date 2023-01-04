<?php
    require('db.php');

    $arr = $_GET['arr'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];
    $search = $_GET['search'];

    if($_GET['q'] === 'admin')
    {
        foreach($arr as $category)
        {
            if($category === 'all')
            {
                if($search !== "")
                {
                    $query = 'SELECT * FROM products WHERE (P_PriceAfter BETWEEN ' .$minPrice. ' AND ' .$maxPrice.') AND P_FNAME LIKE "%'.$search.'%"';
                }
                else{
                    $query = 'SELECT * FROM products WHERE P_PriceAfter BETWEEN ' .$minPrice. ' AND ' .$maxPrice;
                }
            }
            else{
                $query = 'SELECT * FROM products WHERE PC_ID = (SELECT PC_ID FROM category where PC_Name = "'.$category.'") AND P_PriceAfter BETWEEN ' .$minPrice. ' AND ' 
                .$maxPrice;
            }
            
            $result = mysqli_query($conn,$query);
            $x = 1;
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    //if($x % 6 != 0){
                        $categoryName = "";
                        $subQuery = 'SELECT PC_Name FROM category WHERE PC_ID = ' . $row['PC_ID'];
                        $subResult = mysqli_query($conn,$subQuery);
                        while($subRow = mysqli_fetch_assoc($subResult)){
                            $categoryName = $subRow['PC_Name'];
                        }
                        // <td>
                        // <a href="#" class="ano">' . $row['P_ID'] . '</a>
                        // </td>
                        echo '<tr>
                        <td>
                        <input class="form-check-input productsCb" type="checkbox" name="productsCb">
                        <label class="form-check-label" for="productsCb">' . $row['P_ID'] .'</label>
                        </td>
                        <td>
                        <a href="#">
                        <img src="data:image;base64,'.base64_encode($row['P_Image']).'"
                        class="rounded border border-secondary" width="40" height="40" alt="...">
                        </a>
                        </td>
                        <td>' . $row['P_FName'] . '</td>
                        <td class="text-success">'. $row['P_Quantity'] . '</td>
                        <td>' . $categoryName . '</td>
                        <td>' . $row['P_Name'] . '</td>
                        <td>$' . $row['P_Price'] . '</td>
                        <td>$' . $row['P_PriceAfter'] . '</td>
                        <td>' . $row['A_ID'] . '</td>
                        </tr>';
                        $x++;
                    /*}
                    else if($_GET['page'] === 2)
                    {
                        $x = 0;
                    }*/
                }
            }
        }
    }
?>