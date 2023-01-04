<?php
    require('db.php');
    if(isset($_GET['q']))
    {
        $query = 'SELECT * FROM products WHERE P_ID = '.$_GET['q'];
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row mb-3">
                    <div class="col-6">
                        <label for="pname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname" value="'.$row['P_FName'].'" placeholder="Product Name">
                    </div>
                    <div class="col-3">
                        <label for="pbrand" class="form-label">Product Brand</label>
                        <input type="text" class="form-control" id="pbrand" value="'.$row['P_Name'].'"  placeholder="Product Brand">
                    </div>
                    <div class="col-3">
                        <label for="pquantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="pquantity" value="'.$row['P_Quantity'].'" placeholder="Product Quantity">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="pdis" class="form-label">Product Description</label>
                        <input type="text" class="form-control" value="'.$row['P_Description'].'" id="pdis" placeholder="Product Description">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="pprice" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="pprice" value="'.$row['P_Price'].'" placeholder="Product Name">
                    </div>
                    <div class="col-4">
                        <label for="ppriceafter" class="form-label">Product Price After</label>
                        <input type="number" class="form-control" id="ppriceafter" value="'.$row['P_PriceAfter'].'" placeholder="Product Quantity">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example" id="cats">
                            <option value="1">None</option>';
                            $query2 = 'SELECT PC_ID FROM category';
                            $result2 = mysqli_query($conn,$query2);
                            $x = 1;
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                        echo '<option value="'.$x.'">'.$row2['PC_ID'].'</option>';
                            }
                    echo '</select>
                    </div>
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example" id="admins">
                            <option value="1">None</option>';
                            $query2 = 'SELECT A_ID FROM admins';
                            $result2 = mysqli_query($conn,$query2);
                            $x = 1;
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                        echo '<option value="'.$x.'">'.$row2['A_ID'].'</option>';
                            }
                    echo '</select>
                    </div>
                </div>';
            }
        }
    }
?>