<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href= https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js>
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js>

    <style>


.form-control:focus {
    box-shadow: none;
    border-color: #000;
}


.labels {
    font-size: 16px
}
.container {
            width: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }
    </style>



</head>
<form method="POST" action="edit.php">
<body class="bg-light">
    <div class="container rounded bg-white">



            <div class="border-right border-left p-3"   >
                    <div class="d-flex"  method="POST" action="edit.php">
                        <h4 class="text-right">Profile</h4>
                    </div>
            
   
                    <div class="row">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="C_Name" placeholder="first name" value=""></div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 py-3"><label class="labels">Mobile Number</label><input type="text" class="form-control"  name="C_Number" placeholder="enter phone number" value=""></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="C_Email" placeholder="enter email" value=""></div>
                        <div class="col-md-12 py-3"><label class="labels">Address</label><input type="text" class="form-control" name="C_Address" placeholder="enter address" value=""></div>
                        <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" name="C_City" placeholder="enter city" value=""></div>
                        

                    </div>
                    
                    <div class="mt-5 text-center">
                        <input a href="signup.php" class="btn btn-dark" id="save" type="submit" > </div>
                  
                </form>
            </div>
           
        </div>
    
    </div>
    </div>

</body>
</html>