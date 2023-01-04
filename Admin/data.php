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
                        echo '<tr>
                        <td>
                        <input class="form-check-input" type="checkbox" name="itemCb">
                        </td>
                        <td>
                        <a href="#">' . $row['P_ID'] . '</a>
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