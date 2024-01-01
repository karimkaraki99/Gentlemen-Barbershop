<?php

require_once '../php/config.php';

if (isset($_POST['r_submit'])) {
    if (isset($_POST['check'])) {
        $name =  mysqli_real_escape_string($con, $_POST['name']);
        $phone = $_POST['tel'];
        $remail = mysqli_real_escape_string($con, $_POST['r_email']);
        $rpass = $_POST['r_password'];
        $cpass = $_POST['c_password'];
        $select = "Select * from user where email = '$remail'";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
            $error[] = 'email already exist!';
        } else {
            if ($rpass == $cpass) {
                
                    $newpass = md5($rpass);
                    $insert = "Insert into user(name,phoneNumber,email,password,role) Values 
                    ('$name','$phone','$remail','$newpass','1')";
                    $result2 = mysqli_query($con, $insert);
                    echo '<script type="text/javascript"> alert("Registered Succefully !") </script>';
                    header("location: login.php");

            } else {
                $error[] = "Password doesn't match!";
            }
        }
    } else {
        $error[] = "Accept Terms & Conditions";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
    <div class="wrapper">
        <span class="icon-close"> <a href="../index.php"><ion-icon name="close"></ion-icon>x</a></span>
        <div class="form-box register">
            <h2>Register</h2>
            <form method="post">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class = "error-msg">' . $error . '</span>';
                    }
                }
                ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input type="tel" name="tel" required>
                    <label>Phone number</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="r_email" required>
                    <label>Email</label>
                </div>


                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="r_password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="c_password" required>
                    <label>Confirm Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="check">I agree to the terms & conditions</label>
                </div>
                <button type="submit" name="r_submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>