<?php

session_start();

include "php/config.php";
 
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["fname"];
    $email = $_POST["femail"];
    $message = $_POST["fmessage"];

    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($con->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icons/gentlemen logo main.png">

    <title>Contact Us</title>
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
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
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
      <section class="backgroundContactUs">
        <h2 class="text-center ContactUsTitle ">Contact Us</h2>
      </section>
      <!--contact number-->
      <div class="row mt-5">
          <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img  class="phoneIcon" src="icons/phone icon.png">
                    <a href="#"><h5 class="card-title number" >+961-03 123 456</h5></a>
                  <h5 class="card-title">Call us</h5>
                  <p class="card-text">Tuesady - Sunday | 9am -8 pm</p>
                </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="gmail.com"><img class="mailIcon" src="icons/mail icon.png"></a>
                    <h5 class="card-title number" >info@Gentlemen.shop</h5>
                  <h5 class="card-title">Mail us</h5>
                  <p class="card-text">All week days | We reply </p>
                </div>
              </div>
          </div>
               </div>
     <!-- Contact Section -->
    <section class="contact">
      <form action="" method="POST">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="main-title">Send Us a Message</h2>
              <p class="text-center">Have a question or want to book an appointment? Contact us today!</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <form name="contact">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input name="fname" type="text" class="form-control" id="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input name="femail" type="email" class="form-control" id="email" placeholder="Example@mail.com" required>
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="fmessage" class="form-control" id="message" rows="3" placeholder="Write your message here!" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary getApp" onclick="">Submit</button>
              </form>
          </div>
        </div>
        </div>
      </form>
      </section>
      
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