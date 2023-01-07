<!DOCTYPE html>
<html>
<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?> 
<title>Book Car </title>
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/background.css">
</head>
<body ng-app=""> 


      <!-- Navigation -->
     <!-- Navigation -->
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

                   
<button class="button-24">
<li class="nav-item"><a style="color: white;" class="nav-link active" aria-current="page" href="prereturncar.php">Return car</a></li>
</button>
<button class="button-24">
<li class="nav-item"><a style="color: white;" class="nav-link active" aria-current="page" href="mybookings.php">History</a></li>
</button>
  <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="prereturncar.php">Return car</a></li>
    <li><a class="dropdown-item" href="mybookings.php">History</a></li>
  </ul> -->
<!-- </div> -->
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
    
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="bookingconfirm.php" method="POST">
        <br style="clear: both">
          <br>

        <?php
        $car_id = $_GET["id"];
        $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
            while($row1 = mysqli_fetch_assoc($result1)){
                $car_name = $row1["car_name"];
                $car_nameplate = $row1["car_nameplate"];
                $full_eq = $row1["full_eq"];
                $standard = $row1["standard"];
                $full_eq_day = $row1["full_eq_day"];
                $standard_day = $row1["standard_day"];
            }
        }

        ?>

          <!-- <div class="form-group"> -->
              <h5> Selected Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
         <!-- </div> -->
         
          <!-- <div class="form-group"> -->
            <h5> Number Plate:&nbsp;<b> <?php echo($car_nameplate);?></b></h5>
          <!-- </div>      -->
        <!-- <div class="form-group"> -->
        <?php $today = date("Y-m-d");
        $tomorrow = date("Y-m-d", strtotime("+1 day")); ?>
          <label><h5>Start Date:</h5></label>
            <input type="date" name="rent_start_date" min="<?php echo($today);?>" required="">
            &nbsp; 
          <label><h5>End Date:</h5></label>
          <input type="date" name="rent_end_date" min="<?php echo($tomorrow);?>" required="">
        <!-- </div>      -->
        
        <h5> Choose your car type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="full" ng-model="myVar"> <b>Full equipment </b>&nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="standard" ng-model="myVar"><b>Standard</b>
            </h5>    
        
        <div ng-switch="myVar"> 
        <div ng-switch-default>
                    <!-- <div class="form-group"> -->
                <h5>Fare: <h5>    
                <!-- </div>    -->
                     </div>
                    <div ng-switch-when="full">
                    <!-- <div class="form-group"> -->
                <h5>Fare: <b><?php echo( $full_eq . "€ per km or " . $full_eq_day. "€ per day");?></b><h5>    
                <!-- </div>    -->
                     </div>
                     <div ng-switch-when="standard">
                     <!-- <div class="form-group"> -->
                <h5>Fare: <b><?php echo( $standard . "€ per km or " . $standard_day . "€ per day");?></b><h5>    
                <!-- </div>   -->
                     </div>
        </div>

         <h5> Charge type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="km"><b> per km</b> &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="days"><b> per day</b>

            <br><br>
                <!-- <form class="form-group"> -->
                 Select a driver: &nbsp;
                <select name="driver_id_from_dropdown" ng-model="myVar1">
                        <?php
                        $sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' ";
                        $result2 = mysqli_query($conn, $sql2);

                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $driver_id = $row2["driver_id"];
                                $driver_name = $row2["driver_name"];
                                $driver_gender = $row2["driver_gender"];
                                $driver_phone = $row2["driver_phone"];
                    ?>
  

                    <option value="<?php echo($driver_id); ?>"><?php echo($driver_name); ?>
                   

                    <?php }} 
                    else{
                        ?>
                    <h6> Sorry! No Drivers are currently available, try again later...</h6>
                        <?php
                    }
                    ?>
                </select> 
                <!-- </form> -->
                <div ng-switch="myVar1">
                

                <?php
                        $sql3 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' ";
                        $result3 = mysqli_query($conn, $sql3);

                        if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){
                                $driver_id = $row3["driver_id"];
                                $driver_name = $row3["driver_name"];
                                $driver_gender = $row3["driver_gender"];
                                $driver_phone = $row3["driver_phone"];

                ?>

                <div ng-switch-when="<?php echo($driver_id); ?>">
                    <h5>Driver Name:&nbsp; <b><?php echo($driver_name); ?></b></h5>
                    <p>Gender:&nbsp; <b><?php echo($driver_gender); ?></b> </p>
                    <p>Contact:&nbsp; <b><?php echo($driver_phone); ?></b> </p>
                </div>
                <?php }} ?>
                </div>
                <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                
         
           <input type="submit"name="submit" value="Rent Now" class="btn btn-warning pull-right">     
        </form>
        
      </div>
      <!-- <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
<footer class="py-5 bg-dark  fixed-bottom">
            <div class="container"><p class="m-0 text-center text-white">Vanja Pajovic
            </p></div>
        </footer>
</html>