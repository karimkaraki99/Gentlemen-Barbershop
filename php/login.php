<?php
include "config.php";
session_start();

// Check if the user is already logged in and redirect to the appropriate page
if (isset($_SESSION['admin_name'])) {
    header('location: ../admin/admin_page.php');
} elseif (isset($_SESSION['user_name'])) {
    header('location: ../getAppointment.php');
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = md5($_POST['password']);
    $select = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['role'] == '2') {
            $_SESSION['admin_name'] = $row['name'];
            header('location: ../admin/admin_page.php');
        } elseif ($row['role'] == '1') {
            $_SESSION['user_name'] = $row['name'];
            header('location: ../index.php');
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="wrapper login">
        <span class="icon-close"><a href="../index.php"><ion-icon name="close"></ion-icon>x</a></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form method="post">
                <!-- Display error messages if any -->
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    }
                }
                ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    
                </div>
                <button type="submit" name="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="../php/registration_page.php" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Update app bar link and text if the user is logged in -->
    <?php
    if (isset($_SESSION['user_name'])) {
        echo '<script>
                // Update the link text to "Get Appointment"
                document.querySelector(".login-register p a").textContent = "Get Appointment";
                // Update the link to "../getAppointment.html"
                document.querySelector(".login-register p a").href = "../getAppointment.html";
            </script>';
    }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
