<?php
session_start();

include "php/config.php";

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icons/gentlemen logo main.png">
    <title>Barbershop - Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body onload="Loader()">
<div id="loader">
    <img id="logoimage" src="icons\wired-flat-1561-comb.gif">
</div>
    <!-- Navbar -->
    <?php include 'functions/user_navbar.php'; ?>

    <!-- Intro Section -->
    <section class="intro">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="text-uppercase">Welcome to Gentlemen</h1>
                    <hr>
                    <p class="lead">Experience the best haircut and grooming services for men at our professional barbershop.</p>
                    <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['user_name']) || isset($_SESSION['admin_name'])  ) {
                       
                            echo '<a href="getAppointment.php" class="btn getApp"><span class="but">Get Appointment</span></a>';
                        
                    } else {
                        echo '<p class="btn getApp" style="color: black;">log in to schedule an appointment.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

      <!-- Services Section -->
      <section class="ourSer">
        <div class="container">   
          <div >
            <div >
            <a href="services.php"><h2 class=" main-title">Our Services</h2></a>
            </div>
          </div>

          <div class="team" id="team">
            <div class="container">
              
              <div class="box">

                <div class="data">
                  <img src="images/haircut.jpg" alt="" />
                </div>

                <div class="info">
                  <p>Cuts & Fades</p>
                </div>

              </div>
              
              <div class="box">

                <div class="data">
                  <img src="images/handsome-man-cutting-beard-barber-salon.jpg" alt="" /> 
                </div>

                <div class="info">
                  <p>Beard and Mustache Trim and Servicing</p>
                </div>

              </div>

              <div class="box">

                <div class="data">
                  <img src="images/childcut.jpg" alt="" />
                </div>

                <div class="info">
                  <p>Children Cuts</p>
                </div>

              </div>

              <div class="box">

                <div class="data">
                  <img src="images/facial.jpg" alt="" />
                </div>

                <div class="info">
                  <p>Facials</p>
                </div>

              </div>
        
              <div class="box">

                <div class="data">
                  <img src="images/styling.jpg" alt="" />
                </div>

                <div class="info">
                  <p>Professional Styling</p>
                </div>

              </div>

              <div class="box">

                <div class="data">
                  <img src="images/Scalp massage.jpg" alt="" />
                </div>

                <div class="info">
                  <p>Scalp Massage and Conditioning Treatment</p>
                </div>

              </div>
            </div>
          </div>
          
          </div>
        
      </section>
      <!-- End Services Section -->


      <!-- Start Events -->
      <div class="events" id="events">
        <div class="dots dots-up"></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title">Latest Events</h2>
        <div class="container">
          <img src="icons/event.png" alt="" />
          <div class="info">
            <div class="time">
              <div class="unit">
                <span class="days"></span>
                <span>Days</span>
              </div>
              <div class="unit">
                <span class="hours"></span>
                <span>Hours</span>
              </div>
              <div class="unit">
                <span class="minutes"></span>
                <span>Minutes</span>
              </div>
              <div class="unit">
                <span class="seconds"></span>
                <span>Seconds</span>    
              </div>
            </div>
            <h2 class="title">Opening New Branch</h2>
            <p class="description">
              "Join us for the grand opening of our new branch on<span style="font-weight: bold; color: #e9c664;"> Sep 22, 2023</span>. Experience exceptional grooming services for the modern gentleman. Don't miss out!"
            </p>
          </div>
        </div>
      </div>
      <!-- End Events -->


    
      
      <!-- Footer Section -->
<?php include 'functions/footer.php'; ?>
      <!-- ./Footer -->

      </div>
      <!-- JavaScript -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
      <script src="javascript/javascript.js"></script>
    </body>
  </html>
