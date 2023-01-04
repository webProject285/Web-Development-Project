<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>metro1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style>
    @media screen and (max-width: 1113px) {
      .button-text {
        display: none;
      }
    }

    html,
    body {
      height: 100%;
    }

    a:hover {
      color: #ffffff;
    }

    .flex-fill {
      flex: 1 1 auto;
    }

    .nav-pills .nav-link {
      background: 0 0;
      border: 0;
      border-radius: 0;
    }

    .tt {
      color: #454545;
      background-color: #f8f9fa;
      padding-left: 15px;
      padding-right: 10px;
      position: relative;
      float: left;
      overflow: hidden;
      width: 72px;
      transition-duration: 0.2s;
      transition-property: width;
    }

    .tt:hover {
      color: #8c8c8c;
      text-align: left;
      width: 230px;
      border-start-end-radius: 20px;
      border-end-end-radius: 20px;
    }

    .sideText {
      display: block;
      white-space: nowrap;
    }

    .text {
      padding-left: 20px;
      color: #454545;
    }

    body {
      padding-top: 71px;
    }


    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }

    h6 {

      font-weight: 600;
    }

    h5 {

      margin-bottom: 20px;
      font-weight: 600;
    }

    h4 {

      margin-bottom: 20px;
      font-weight: 600;
    }

    h2 {

      font-weight: 600;
    }

    li {
      font-size: medium;
    }

    * {

      font-family: Arial, Helvetica, sans-serif;

      margin: 0;

      padding: 0;

      box-sizing: border-box;


    }

    .carousel-control-prev-icon {
      position: absolute;
      left: -20px;
    }


    .carousel-control-next-icon {
      position: absolute;
      right: -20px;
    }
  </style>
  <script>
    $(document).ready(function () {
      $.get("onthego.php",
        {
          q:"client"
        },
        function (data, status) {
          $("#OnTheGo").append(data);
        });
    });
    $(document).ready(function () {
      $.get("sale.php",
        {
          q:"client"
        },
        function (data, status) {
          $("#Sale").append(data);
        });
    });


    $(document).ready(function () {
      $.get("iflogin.php",
        {
          q:"client"
        },
        function (data, status) {
          $("#signinbutton").html(data);

          console.log($("#profile").text());
        });
    });
    function buttonfunction(){
      if($("#profile").text()!=='Sign in'){
        window.location.href="profile.php";
      }
      else{
        window.location.href="signup.php";
      }
    }
    $("#signinbutton").click(function(){
  
      if($("#profile").text()!=='Sign in'){
        window.location.href="profile.php";
      }
      else{
        window.location.href="signup.php";
      }
    });
    /*function addCart(id){
        var i = id.slice(-1);
        var str = document.getElementById(`product${i}`).innerHTML;
        console.log(str);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText);
        }
        };

        xmlhttp.open("GET",`addproduct.php?q=${str}`,true);
        xmlhttp.send();
        xmlhttp.open("GET",`addproduct.php?q=${str}`,true);
        xmlhttp.send();
      }*/
      $(document).ready(function(){
        $("#searchBtn").click(function(){
            //sear = $("#searchText").val();
           // window.location.href="Search.php";          
            if($("#searchTextt").val() != "")
            {
              $.get("Search.php",
              {
                p:0,
                q:$("#searchTextt").val()
              },
              function (data, status) {
                //console.log(data);
                window.location.href = "Search.html";
              });
            }
        });

      });
      
  </script>



</head>

<body class="bg-light text-dark">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-dark fixed-top ">
    <div class="container-xxl">
      <!-- navbar brand / title -->
      <a class="navbar-brand" href="metro1.php">
        <img src="logo.png" alt="Metro 1" style="float:right;width:120px;height:44px;">
      </a>

      <!-- toggle button for mobile nav -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navbar links -->
      <div class="collapse navbar-collapse " id="main-nav">
        <div class="input-group mx-auto" style="max-width:600px;">
          <!--search-->
          <input id="searchTextt" type="search" class="form-control mr-sm-2" placeholder="Search" />
          <button id="searchBtn" type="button" class="btn search-button" style="background-color: #f2e205 ">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>

        <!--Sign in-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link">
              <button id="signinbutton" type="button" class="btn btn-dark" onclick="buttonfunction()">
                
              </button>
            </a>
          </li>

          <!--Cart-->
          <li class="nav-item">
            <a class="nav-link" href="shoppingcart.php">
              <button id="cart-button"  type="button" class="btn btn-dark">
                <i class="bi bi-cart4 fa-lg"></i>
                <span class="button-text">Cart</span>
              </button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="h-100" style="position: fixed;z-index: 2;">
    <div class="d-flex align-items-center" style="min-height:90vh">
      <!--List-->
      <ul class="nav flex-column text-center">
        <!--Fresh Food-->
        <li>
          <a href="Freshfood.php" class="nav-link py-3 border-bottom tt shadow-lg" aria-current="page" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-carrot" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                  d="M3 21s9.834 -3.489 12.684 -6.34a4.487 4.487 0 0 0 .005 -6.344a4.483 4.483 0 0 0 -6.342 -.005c-2.86 2.861 -6.347 12.689 -6.347 12.689z">
                </path>
                <path d="M9 13l-1.5 -1.5"></path>
                <path d="M16 14l-2 -2"></path>
                <path d="M22 8s-1.14 -2 -3 -2c-1.406 0 -3 2 -3 2s1.14 2 3 2s3 -2 3 -2z"></path>
                <path d="M16 2s-2 1.14 -2 3s2 3 2 3s2 -1.577 2 -3c0 -1.86 -2 -3 -2 -3z"></path>
              </svg>
              <span class="text">Fresh Food</span>
            </span>
          </a>
        </li>
        <!--Bakeries-->
        <li>
          <a href="Bakeries.php" class="shadow-lg nav-link py-3 border-bottom tt " title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-baguette" width="40"
                height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                  d="M5.628 11.283l5.644 -5.637c2.665 -2.663 5.924 -3.747 8.663 -1.205l.188 .181a2.987 2.987 0 0 1 0 4.228l-11.287 11.274a2.996 2.996 0 0 1 -4.089 .135l-.143 -.135c-2.728 -2.724 -1.704 -6.117 1.024 -8.841z">
                </path>
                <path d="M9.5 7.5l1.5 3.5"></path>
                <path d="M6.5 10.5l1.5 3.5"></path>
                <path d="M12.5 4.5l1.5 3.5"></path>
              </svg>
              <span class="text">Bakeries</span>
            </span>
          </a>
        </li>
        <!--Food Cupboard-->
        <li>
          <a href="Foodcupboard.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-salt" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 13v.01"></path>
                <path d="M10 16v.01"></path>
                <path d="M14 16v.01"></path>
                <path d="M7.5 8h9l-.281 -2.248a2 2 0 0 0 -1.985 -1.752h-4.468a2 2 0 0 0 -1.986 1.752l-.28 2.248z">
                </path>
                <path d="M7.5 8l-1.612 9.671a2 2 0 0 0 1.973 2.329h8.278a2 2 0 0 0 1.973 -2.329l-1.612 -9.671"></path>
              </svg>

              <span class="text">Food Cupboard</span>
            </span>
          </a>
        </li>
        <!--Dairy, cheese,eggs-->
        <li>
          <a href="Diary.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-egg" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                  d="M19 14.083c0 4.154 -2.966 6.74 -7 6.917c-4.2 .006 -7 -2.763 -7 -6.917c0 -5.538 3.5 -11.09 7 -11.083c3.5 .007 7 5.545 7 11.083z">
                </path>
              </svg>
              <span class="text">Diary, Cheese, Eggs</span>
            </span>
          </a>
        </li>
        <!--Frozen food-->
        <li>
          <a href="Frozenfood.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fridge" width="40"
                height="40   " viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                <path d="M5 10h14"></path>
                <path d="M9 13v3"></path>
                <path d="M9 6v1"></path>
              </svg>

              <span class="text">Frozen Food</span>
            </span>
          </a>
        </li>
        <!--beverages-->
        <li>
          <a href="Beverages.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bottle" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 5h4v-2a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v2z"></path>
                <path
                  d="M14 3.5c0 1.626 .507 3.212 1.45 4.537l.05 .07a8.093 8.093 0 0 1 1.5 4.694v6.199a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2v-6.2c0 -1.682 .524 -3.322 1.5 -4.693l.05 -.07a7.823 7.823 0 0 0 1.45 -4.537">
                </path>
                <path
                  d="M7.003 14.803a2.4 2.4 0 0 0 .997 -.803a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 1 -.805">
                </path>
              </svg>

              <span class="text">Beverages</span>
            </span>
          </a>
        </li>
        <!--snacks-->
        <li>
          <a href="Snacks.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cookie" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M8 13v.01"></path>
                <path d="M12 17v.01"></path>
                <path d="M12 12v.01"></path>
                <path d="M16 14v.01"></path>
                <path d="M11 8v.01"></path>
                <path
                  d="M13.148 3.476l2.667 1.104a4 4 0 0 0 4.656 6.14l.053 .132a3 3 0 0 1 0 2.296c-.497 .786 -.838 1.404 -1.024 1.852c-.189 .456 -.409 1.194 -.66 2.216a3 3 0 0 1 -1.624 1.623c-1.048 .263 -1.787 .483 -2.216 .661c-.475 .197 -1.092 .538 -1.852 1.024a3 3 0 0 1 -2.296 0c-.802 -.503 -1.419 -.844 -1.852 -1.024c-.471 -.195 -1.21 -.415 -2.216 -.66a3 3 0 0 1 -1.623 -1.624c-.265 -1.052 -.485 -1.79 -.661 -2.216c-.198 -.479 -.54 -1.096 -1.024 -1.852a3 3 0 0 1 0 -2.296c.48 -.744 .82 -1.361 1.024 -1.852c.171 -.413 .391 -1.152 .66 -2.216a3 3 0 0 1 1.624 -1.623c1.032 -.256 1.77 -.476 2.216 -.661c.458 -.19 1.075 -.531 1.852 -1.024a3 3 0 0 1 2.296 0z">
                </path>
              </svg>

              <span class="text">Snacks</span>
            </span>
          </a>
        </li>
        <!--Personal Care-->
        <li>
          <a href="Personalcare.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-handshake" width="40"
                height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                <path
                  d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25">
                </path>
                <path d="M12.5 15.5l2 2"></path>
                <path d="M15 13l2 2"></path>
              </svg>

              <side class="text">Personal Care</side>
            </span>
          </a>
        </li>
        <!--cleaning-->
        <li>
          <a href="Cleaning.php" class="shadow-lg nav-link py-3 border-bottom tt" title="">
            <span class="sideText">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wash" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                  d="M3.486 8.965c.168 .02 .34 .033 .514 .035c.79 .009 1.539 -.178 2 -.5c.461 -.32 1.21 -.507 2 -.5c.79 -.007 1.539 .18 2 .5c.461 .322 1.21 .509 2 .5c.79 .009 1.539 -.178 2 -.5c.461 -.32 1.21 -.507 2 -.5c.79 -.007 1.539 .18 2 .5c.461 .322 1.21 .509 2 .5c.17 -.002 .339 -.014 .503 -.034">
                </path>
                <path d="M3 6l1.721 10.329a2 2 0 0 0 1.973 1.671h10.612a2 2 0 0 0 1.973 -1.671l1.721 -10.329">
                </path>
              </svg>

              <span class="text">Cleaning</span>
            </span>
          </a>
        </li>
        <!--baby care-->
        <li>
          <a href="Babycare.php" class="shadow-lg nav-link py-3 tt" title="">
            <span class="sideText" style="padding-left: 5px;">
              <i class="fa-solid fa-baby fa-2x"></i>

              <span class="text">Baby Care</span>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>


  <section style="padding-left:4.5rem;">

    <div class="container-fluid">

      <!-- Carousel -->
      <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>

        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="poster1.png" alt="" class="d-block w-100" style="height :490px">
          </div>
          <div class="carousel-item">
            <img src="poster2.png" alt="" class="d-block w-100" style="height :490px">
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="pt-5" style="padding-left:8rem;padding-bottom:4.5rem ;padding-right:4.5rem">
    <div class="container-fluid">
      <div class="row">
        <div>
          <!--First product carousel-->
          <h2 class="text-center  pt-3 pb-3">Special Offers</h2>

          <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div id="Sale" class="carousel-inner">

            
            </div>
            <button class="carousel-control-prev" style="width: 80px;" type="button"
              data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" style="width: 80px;" type="button"
              data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--Banner 1-->
    <img style="width:100%;height:60% ; padding-top: 4.5rem;padding-bottom: 4.5rem;" src="almarai.jpeg" alt="">


    <!--second products carousel-->
    <div class="container-fluid">
      <div class="row">
        <div>

          <h2 class="text-center  pt-3 pb-3">On The Go</h2>

          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div id="OnTheGo"class="carousel-inner">

           
            </div>

            
            <button class="carousel-control-prev" style="width: 80px;" type="button"
              data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" style="width: 80px;" type="button"
              data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Banner 2-->
    <img style="width:100%;height:60%; padding-top: 4.5rem;padding-bottom: 4.5rem;" src="abuauf.jpg" alt="">

  </section>



  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-muted">© 2022 all rights reserved to Metro One</span>
      </div>
      <div>
        <ul class="text-muted">
          <h6>Hotline</h6>
          <p> 01008555885 </p>
        </ul>
      </div>
      <div>
        <ul class="text-muted">
          <h6>Need Help?</h6>

          <a class="text-muted" style="text-decoration:none" href="Contact_us.html">Contact Us</a>
        </ul>
      </div>
      <div>
        <ul class="text-muted">
          <h6>Social Media</h6>

          <a class="text-muted" style=" margin-left: 8px;margin-right: 8px;text-decoration:none"
            href="https://www.facebook.com/Hypermetro">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <a class="text-muted" style=" margin-left: 8px;margin-right: 8px;text-decoration:none" href="Contact_us.html">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
          <a class="text-muted" style=" margin-left: 8px;margin-right: 8px;text-decoration:none" href="#">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </ul>
      </div>

    </footer>
  </div>


</body>

</html>