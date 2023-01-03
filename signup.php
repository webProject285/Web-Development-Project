<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <link rel="stylesheet" href="style.css">
    <link rel="" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Sign in</title>



    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F2F2F2;
        }

        .container {
            position: relative;
            max-width: 430px;
            width: 100%;
            background: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 20px;
        }

        .container .forms {
            display: flex;
            align-items: center;
            height: 440px;
            width: 200%;
            transition: height 0.2s ease;
        }


        .container .form {
            width: 50%;
            padding: 30px;
            background-color: rgb(255, 255, 255);
            transition: margin-left 0.18s ease;
        }

        .container.active .login {
            margin-left: -50%;
            opacity: 0;
            transition: margin-left 0.18s ease, opacity 0.15s ease;
        }

        .container .signup {
            opacity: 0;
            transition: opacity 0.09s ease;
        }

        .container.active .signup {
            opacity: 1;
            transition: opacity 0.2s ease;
        }

        .container.active .forms {
            height: 650px;
        }

        .container .form .title {
            position: relative;
            font-size: 27px;
            font-weight: 600;
        }

        .form .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 25px;
        }

        .form .input-field {
            position: relative;
            height: 50px;
            width: 100%;
            margin-top: 30px;
        }

        .input-field input {
            position: absolute;
            height: 100%;
            width: 100%;
            padding: 0 35px;
            border: none;
            outline: none;
            font-size: 16px;
            border-bottom: 2px solid #ccc;
            border-top: 2px solid transparent;
            transition: all 0.2s ease;
        }

        /* when click on email nd password */
        .input-field input:is(:focus, :valid) {
            border-bottom-color: #000000;
        }

        .input-field i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 23px;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid)~i {
            color: #000000;
        }

        .input-field i.icon {
            left: 0;
            color: #000000;
        }

        /* show password or hide */
        .input-field i.showHidePw {
            right: 0;
            cursor: pointer;
            padding: 10px;
        }

        .form .checkbox-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .checkbox-text .checkbox-content {
            display: flex;
            align-items: center;
        }

        .checkbox-content input {
            margin-right: 10px;
            accent-color: #4070f4;
        }

        .form .text {
            color: #333;
            font-size: 14px;
        }

        .form a.text {
            color: #4070f4;
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .form .button {
            margin-top: 35px;
        }

        .form .button input {
            border: none;
            color: rgb(0, 0, 0);
            font-size: 17px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 6px;
            background-color: #f2e205;
            cursor: pointer;
            transition: all 0.3s ease;
        }


        .form .login-signup {
            margin-top: 30px;
            text-align: center;
        }
    </style>

</head>

<body>




    <div class="container" id="frm">
        <form onsubmit="return validation()" method="POST" action="login_handler.php">
            <div class="forms">
                <div class="form login">
                    <span class="title">Login</span>

                    <form action="#">
                        <div class="input-field">
                            <input type="text" name="C_Email" placeholder="Enter your email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="C_Password" class="password" placeholder="Enter your password" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck">
                                <label for="logCheck" class="text">Remember me</label>
                            </div>

                            <a href="#" class="text">Forgot password?</a>
                        </div>

                        <div class="input-field button">
                            <input type="submit" name="submit" id="btn" value="Login">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Do not have account?
                            <a href="#" class="text signup-link">Sign up Now</a>
                        </span>
                    </div>
                </div>




                <div class="form signup">
                    <span class="title">Registration</span>

                    <form id="form" method="POST" action="process.php" onsubmit="return validation()" onkeydown="validation()" name="regForm">
                        <div class="input-field">
                            <input type="text" name="C_Name" placeholder="Enter your name" required>
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" id="email" name="C_Email" onkeydown="validation()" placeholder="Enter your email" required>
                            <i class="uil uil-envelope icon"></i>
                            <span id="text"></span>
                        </div>


                        <div class="input-field">
                            <input type="number" name="C_Number" placeholder="Enter your number" required>
                            <i class="uil uil-user"></i>
                        </div>


                        <div class="input-field">
                            <input type="text" name="C_Address" class="address" placeholder="Enter Address" required>
                            <i class="bi bi-geo-alt"></i>

                        

                        </div>


                        <div class="input-field">
                            <input type="password" name="C_Password" class="password" placeholder="Create a password" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>


                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="termCon">
                                <label for="termCon" class="text">I accepted all terms and conditions</label>
                            </div>
                        </div>

                        <div class="input-field button">
                            <input type="submit" name="singup-submit" value="Signup">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Already a member?
                            <a href="#" class="text login-link">Login Now</a>
                        </span>
                    </div>
                </div>
            </div>




        </form>
    </div>


    <script>
        const container = document.querySelector(".container"),
            pwShowHide = document.querySelectorAll(".showHidePw"),
            pwFields = document.querySelectorAll(".password"),
            signUp = document.querySelector(".signup-link"),
            login = document.querySelector(".login-link");

        //   show/hide password and change icon
        pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                pwFields.forEach(pwField => {
                    if (pwField.type === "password") {
                        pwField.type = "text"; //if pwField.type is type password (*) change it to text

                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye-slash", "uil-eye"); //change eye icon from eye slash o open eye
                        })
                    } else { //if pwField.type is not password change it to password
                        pwField.type = "password"; //if user click on the icon and it was text it will change to password(*)

                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye", "uil-eye-slash"); //change eye icon from open eye to slash eye
                        })
                    }
                })
            })
        })

        //  appear signup and login form
        signUp.addEventListener("click", () => {
            container.classList.add("active"); //will make the container for login page active
        });
        login.addEventListener("click", () => {
            container.classList.remove("active"); //will make the container for login page active
        });
    </script>

    

</body>

</html>