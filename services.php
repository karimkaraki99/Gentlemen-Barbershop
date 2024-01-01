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

    <title>Services</title>
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
    <link rel="stylesheet" href="css/services.css">
</head>
<body onload="Loader()">
<div id="loader">
    <img id="logoimage" src="icons\wired-flat-1561-comb.gif">
</div>
    <div class="body">

<!-- Navbar -->
<?php include 'functions/user_navbar.php'; ?>
  <!--end navbar-->

    <!-- background Section -->
    <section class="backgroundPricelist">
    <h2 class="text-center ServicesTitle ">Our Services</h2>
    </section>


<div class="services" id="services">
      <div class="container">

      <?php

$sql = "SELECT name, price FROM services";
$result = $con->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $serviceName = $row['name'];
        $servicePrice = $row['price'];

        echo '    <div class="box">';
        echo '      <h3 style="padding-right: 10px;">' . $serviceName . '<span style="font-weight: bold; float: right;">' . $servicePrice . '$</span></h3>';
        echo '      <div class="info">';
        echo '        <p></p>';
        echo '      </div>';
        echo '    </div>';
    }
} else {
    echo "No services found.";
}


$con->close();
?>

      </div>
    </div>
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