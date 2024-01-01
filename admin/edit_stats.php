<?php
session_start();
include "../php/config.php";
if (!isset($_SESSION['admin_name'])) {
    header("Location: ../index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        // Add a new record
        $name = $_POST["name"];
        $value = $_POST["value"];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO stats (name, value) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $value);

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
        // Edit existing record
        $id = $_POST["id"];
        $name = $_POST["name"];
        $value = $_POST["value"];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("UPDATE stats SET name=?, value=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $value, $id);

        if ($stmt->execute()) {
            // Success
            $stmt->close();
        } else {
            // Error handling
            echo "Error: " . $stmt->error;
            $stmt->close();
            exit();
        }
    } elseif (isset($_POST["reset"])) {
        // Delete existing record
        $id = $_POST["id"];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("DELETE FROM stats WHERE id=?");
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
    header("Location: stats.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stats</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="wrapper login">
    <span class="icon-close"><a href="stats.php"><ion-icon name="close"></ion-icon>x</a></span>
    <div class="form-box login">
        <h2>Edit Stats</h2><br>
        <form action="" method="post">
            <div>
                <label>ID &nbsp;</label>
                <input type="text" name="id" required>
            </div><br>
            <div>
                <label>Name &nbsp;</label>
                <input type="text" name="name" required>
            </div><br>
            <div>
                <label>Value &nbsp;</label>
                <input type="number" name="value" required>
            </div><br>
            <button type="submit" name="add" id="btnone">Add</button>
            <br><br>
            <button type="submit" name="edit" id="btntwo">Edit</button>
            <br><br>
            <button type="submit" name="reset" id="btnthree">Delete</button>
        </form>
    </div>
</div>

</body>
</html>
