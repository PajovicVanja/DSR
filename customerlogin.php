<?php
include('login_customer.php'); // Includes Login Script

if(isset($_SESSION['login_customer'])){
header("location: index.php"); //Redirecting
}
?>

    <!DOCTYPE html>
    <html>

    <head>
    <title> customer Signup | Car Rentals  </title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css"> -->
    <link rel="stylesheet" href="assets/css/background.css">

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="assets/css/clientlogin.css"> -->
</head>
   

    <body >
                 <!-- Navigation -->
    <!-- Navigation -->
<nav class="navbar fixed-top  navbar-expand-lg  navbar-light bg-light">
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

                        <!-- <div class="dropdown">
  <button  class="btn  dropdown-toggle button-24" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
Rented cars  </button> -->
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

        

        



                    <!-- FORM -->

                    <section style=" margin-left: 400px; margin-right: 400px;" class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>
                    <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Login</h2>
                    <form role="form" action="" method="POST">
                  
                

              <!-- Username input -->
              <div class="form-outline mb-4">
              <input class="form-control" id="customer_username" type="text" name="customer_username" placeholder="Username" required="" autofocus="">
                <label class="form-label" for="form3Example3">Username</label>
              </div>

              
              <!-- Password input -->              
              <div class="form-outline mb-4">
              <input class="form-control" id="customer_password" type="password" name="customer_password" placeholder="Password" required="">

                <label class="form-label" for="form3Example5">Password</label>
              </div>
             

              <!-- Submit button -->
              <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>
               

             
            </form>
            </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://www.pixelstalk.net/wp-content/uploads/2016/10/Dark-Shiny-Concept-Car-iPhone-wallpaper.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>


                       
                    

</section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Vanja Pajovic
            </p></div>
        </footer>

    </html>