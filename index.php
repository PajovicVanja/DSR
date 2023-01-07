<!DOCTYPE html>
<html>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/background.css">

    <link rel="stylesheet" href="assets/w3css/w3.css">
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> -->
</head>

<body class="" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<nav class="navbar  navbar-expand-lg  navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Rent-A-Car</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <?php
                if(isset($_SESSION['login_customer'])){
            ?> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->
                        <span class="navbar-text">
                             Welcome, <?php echo $_SESSION['login_customer']; ?>
                        </span>
                    </ul>
                    <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->
                        <button class="button-27">
<li class="nav-item"><a style="color: white;" class="nav-link active" aria-current="page" href="index.php">Home</a></li>
</button>

                        <div class="dropdown">
  <button  class="btn  dropdown-toggle button-24" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
Rented cars  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="prereturncar.php">Return car</a></li>
    <li><a class="dropdown-item" href="mybookings.php">History</a></li>
  </ul>
</div>
<button class="button-81">
<li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
</button>
                    </ul>
                        
                </div>
                    
                </div>
                <?php
                }
                else {
                ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->
                        
                    </ul>
                    <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <button class="button-27">
<li class="nav-item"><a style="color: white;" class="nav-link active" aria-current="page" href="index.php">Home</a></li>
</button>
                        <button class="button-24">
                        <li  class="nav-item"><a class="nav-link active" aria-current="page" href="customerlogin.php">Login</a></li>
                        </button>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->
                        <button class="button-81">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="customersignup.php">Create account</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->
                        </button>
                    </ul>
                        
                </div>
                </div>
                <?php
                }
                
                ?>
            </div>
        </nav>



    <!-- Navigation -->
    
    <div class="backg">
        <header class="intro">
            <div class="intro-body">
                <div class="container d-flex">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 " >
                            <h1 class="brand-headingg" style="color: black">Car Rentals</h1>
                            <p class="intro-text" style="color: white;">
                                Online Car Rental Service
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Cars</h3>
<br>
        <section  class="menu-content">
            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $full_eq = $row1["full_eq"];
                    $full_eq_day = $row1["full_eq_day"];
                    $standard = $row1["standard"];
                    $standard_day = $row1["standard_day"];
                    $car_img = $row1["car_img"];
               
                    ?>
            <a style="text-decoration: none;" href="booking.php?id=<?php echo($car_id) ?>">
            

            <div class="sub-menu">
            

            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
            
            <h5><b> <?php echo $car_name; ?> </b></h5>
            <h6> Full equipment: <?php echo ( $full_eq . "€/km & " . $full_eq_day . "€/day"); ?></h6>
            <h6> Standard: <?php echo ( $standard . "€/km & " . $standard_day . "€/day"); ?></h6>

            
            </div> 

            </a>

            
                


            <?php }}
            else {
                ?>
<h1> No cars available :( </h1>
                <?php
            }
            ?>                                   
        </section>
                    
    </div>

  

    
    <!-- Container (Contact Section) -->
    <!-- -->
    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Vanja Pajovic
            </p></div>
        </footer>
    <!-- <script>
        function myMap() {
            myCenter = new google.maps.LatLng(25.614744, 85.128489);
            var mapOptions = {
                center: myCenter,
                zoom: 12,
                scrollwheel: true,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map);
        }
    </script> -->
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <!-- <script src="assets/js/theme.js"></script> -->
</body>

</html>