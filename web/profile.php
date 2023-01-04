<?php
require_once('config2.php');
session_start();
$query = "SELECT * FROM  customers Where C_ID = ". $_SESSION['USER_ID'];
$result = mysqli_query($con,$query);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js>
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .container {
            width: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }
    </style>
    <script>
        $(document).ready(function(){         //when page is ready   
            $("#outBtn").click(function(){     //if click on logout button
              $.get("logout.php",          //go to logout.php
              function (data, status) {
                window.location.href = "metro1.php"   //open the main page after finish
              });
            });
        });
    </script>
</head>

<body class="bg-light">
    
    <div class="container p-3 rounded bg-white" method ="POST" action="edit.php">
        
        <h3 class="text-center">Profile</h3>
        <div class="card" style="width: 30rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6>Name</h6>
                        </div>
                        <div class="col-6">
                            <?php
                            $result = mysqli_query($con,$query);    //SELECT * FROM  customers Where C_ID = ". $_SESSION['USER_ID']
                            while($row = mysqli_fetch_assoc($result))   //loop to search the the customer name
                            {
                                ?>

                               <?php echo $row['C_Name'];?>     
                              

                               
                               <? endwhile;?>
                            
                         <?php  
                            }
                         
                          
                          ?>

                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6>Number</h6>
                        </div>
                        <div class="col-6">
                      
                        <?php
                        $result = mysqli_query($con,$query);  //  execute the query store it in result (SELECT * FROM  customers Where C_ID = ". $_SESSION['USER_ID']
                            while($row  = mysqli_fetch_assoc($result)) //loop to search the the customer number in database
                            {
                                ?>

                               <?php echo $row ['C_Number'];?>
                               
                            
                         <?php  
                            }
                         
                          
                          ?>




                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6>Email</h6>
                        </div>
                        <div class="col-6">
                       
                        <?php 
                        $result = mysqli_query($con,$query);  // execute the query store it in result SELECT * FROM  customers Where C_ID = ". $_SESSION['USER_ID']
                            while($row  = mysqli_fetch_assoc($result))  //loop to search the the customer email in database
                            {
                                ?>

                               <?php echo $row ['C_Email'];?>
                            
                         <?php  
                            }
                         
                          
                          ?>




                        </div>
                    </div>
                </li>
              
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6>Address</h6>
                        </div>
                        <div class="col-6">
                        <?php
                        $result = mysqli_query($con,$query);         //  execute the query store it in result  SELECT * FROM  customers Where C_ID = ". $_SESSION['USER_ID']
                            while($row = mysqli_fetch_assoc($result))   //loop to search the the customer address
                            {
                                ?>

                               <?php echo $row['C_Address'];?>
                            
                         <?php  
                            }
                         
                          
                          ?>

                        </div>
                    </div>
                </li>
            </ul>   
        </div>
        <button type="button" class="mt-3 btn btn-dark border-0" style="width: 100%;" id="outBtn"> Log out</button>

        <button type="button" class="mt-3 btn btn-dark border-0" style="width: 100%;" name = "edit" onclick="location.href='editProfile.php'"> Edit</button>
    </div>

    </div>
    </div>

</body>

</html>