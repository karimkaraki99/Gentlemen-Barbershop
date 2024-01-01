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

    <title>About Us</title>
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
    <link rel="stylesheet" href="css/aboutUs.css">
</head>
<body onload="Loader()">
<div id="loader">
    <img id="logoimage" src="icons\wired-flat-1561-comb.gif">
</div>

<div class="body">
<!-- Navbar -->
<?php include 'functions/user_navbar.php'; ?>
  <!--end navbar-->

    <!--about Us-->
    <section class="backgroundAboutUs">
        <h2 class="text-center abouusTitle ">About our Shop</h2>
    </section>

      <div class="responsive-container-block bigContainer About">
        <div class="responsive-container-block Container">
          <div class="imgContainer">
            <img class="mainImg" img src="images/Aboutus picture.jpg">
          </div>
          <div class="responsive-container-block textSide">
            <p class="text-blk heading">
              About Us
            </p>
            <p class="text-blk subHeading">
              Gentlemen Barbershop is the best barbershop. Why? Because we have the best expertise in the house, and the most creative cuttings in town. Your hair deserves us! Come see us for shaving your beard, styling your hair or coloring your mind.
            </p>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <img class="cardImg" img src="icons/icon-1.png">
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  BE WISE GET A GOOD PRICE
                </p>
                <p class="text-blk cardSubHeading">
                  Quality cuttings for a good price.
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <img class="cardImg" img src="icons/icon-2.png">
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  SERVICE WITHIN MINUTES
                </p>
                <p class="text-blk cardSubHeading">
                  Amazing service within 20 minutes from the 17th block 
                </p>
                
                
              </div>
            </div>
           
           
            <a href="services.php">
              <button class="explore getApp" onclick="services();">
                Explore our Services  
              </button>
              <script> function services(){

                alert("Welcome to our services");
                
                }</script>
            </a>
          </div>
        </div>
      </div>


      <!-- Start Stats -->
    <div class="stats" id="stats">
      <h2>Our Stats</h2>
      <div class="container">

      <?php

// Fetch data 
$sql = "SELECT name, value FROM stats";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statsValue = $row['value'];
        $statsName = $row['name'];
        echo '    <div class="box">';
        echo '      <i class="fas fa-code fa-2x fa-fw"></i>';
        echo '      <<span class="number" data-goal="'.$statsValue.'">0</span>';
        echo '        <span class="text">'.$statsName.'</span>';
        echo '      </div>';
    }
} else {
    echo "No services found.";
}

$con->close();
?>
      </div>
    </div>

    <!-- End Stats -->
      <!-- Footer Section -->
      <?php include 'functions/footer.php'; ?>
      <!-- ./Footer -->
    </div>
 <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
    <script src="javascript/javascript.js"></script>
    <script src="javascript/aboutUs.js"></script>
</body>
</html>