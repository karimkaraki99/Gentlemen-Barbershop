<?php
session_start();
include "../php/config.php";
if (!isset($_SESSION['admin_name'])) {
    header("Location: ../index.php");
    exit();
}

 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        // Add a new service
        $name = $_POST["fFrom"];
        $price = $_POST["fPrice"];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO services (name, price) VALUES (?, ?)");
        $stmt->bind_param("si", $name, $price);

        if ($stmt->execute()) {
            // Success
            $stmt->close();
        } else {
            // Error handling
            echo "Error: " . $stmt->error;
            $stmt->close();
            exit();
        }
    } elseif (isset($_POST["edit"])) {
        // Edit existing service
        $id = $_POST["id"];
        $name = $_POST["fFrom"];
        $price = $_POST["fPrice"];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("UPDATE services SET name=?, price=? WHERE id=?");
        $stmt->bind_param("sii", $name, $price, $id);

        if ($stmt->execute()) {
            // Success
            $stmt->close();
        } else {
            // Error handling
            echo "Error: " . $stmt->error;
            $stmt->close();
            exit();
        }
    } elseif (isset($_POST["delete"])) {
        // Delete existing service
        $id = $_POST["id"];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("DELETE FROM services WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Success
            $stmt->close();
        } else {
            // Error handling
            echo "Error: " . $stmt->error;
            $stmt->close();
            exit();
        }
    }

    // Redirect to the same page or another page after the operation
    header("Location: services.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Service</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="wrapper login">
<span class="icon-close"><a href="services.php"><ion-icon name="close"></ion-icon>x</a></span>
<div class="form-box login">
            <h3>Add/Edit/Delete Service</h3><br>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label>ID</label>
            <input type="number" name="id">
        </div><br>
        <div>
            <label>Name</label>
            <input type="text" name="fFrom">
        </div><br>
        <div>
            <label>Price</label>
            <input type="number" name="fPrice">
        </div><br><br>
        <button type="submit" name="submit" id="btnone">Submit</button>
        <br><br>
        <button type="submit" name="edit" id="btntwo">Edit</button>
        <br><br>
        <button type="submit" name="delete" id="btnthree">Delete</button>
    </form>
</div>
    </div>
</body>
</html>
