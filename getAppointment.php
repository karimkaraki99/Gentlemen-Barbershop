<?php
include "php/config.php";
session_start();


$sql = "SELECT name FROM services";
$result = $con->query($sql);

$appointmentDetailsText = "Default Appointment Details Text";

if ($result->num_rows > 0) {
    $checkboxes = '';
    while ($row = $result->fetch_assoc()) {
        $checkboxes .= '<input type="checkbox" id="appointmentDetailsCheckbox_' . $row['name'] . '" name="appointmentDetailsCheckbox[]" value="' . $row['name'] . '">';
        $checkboxes .= '<label for="appointmentDetailsCheckbox_' . $row['name'] . '">' . $row['name'] . '</label><br><br>';
    }
}
//add app
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $person = $_POST["person"];

    $sql = "INSERT INTO appointment (name, date, time, person) VALUES ('$name', '$date', '$time', '$person')";

    if ($con->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
//ada chechkbox data
    if (isset($_POST["appointmentDetailsCheckbox"])) {
        $detailsText = implode(", ", $_POST["appointmentDetailsCheckbox"]);

        $updateSql = "UPDATE appointment SET service = '$detailsText' WHERE name = '$name'";
        if ($con->query($updateSql) === TRUE) {
            echo "Details text updated successfully";
        } else {
            echo "Error updating details text: " . $con->error;
        }
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Appointment</title>
    <link rel="stylesheet" href="css/getAppoinment.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="icons/gentlemen logo main.png">
    <style>
       
    </style>

</head>

<body onload="Loader()">

    <div class="formbold-main-wrapper">

        <div class="formbold-form-wrapper">
            <form name="getApp" action=" " method="POST">
                <div><a href="index.php"><img class="logo" src="icons/gentlemen logo main.png"></a></div>
                <div class="formbold-mb-5">
                    <label for="name" class="formbold-form-label"> Full Name </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Full Name"
                        class="formbold-form-input"
                        required
                    />
                </div>
                <div class="flex flex-wrap formbold--mx-3">
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5 w-full">
                            <label for="date" class="formbold-form-label"> Date </label>
                            <input
                                type="date"
                                name="date"
                                id="date"
                                class="formbold-form-input"
                                required
                            />
                        </div>
                    </div>
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5">
                            <label for="time" class="formbold-form-label"> Time </label>
                            <input
                                type="time"
                                name="time"
                                id="time"
                                class="formbold-form-input"
                                required
                            />
                        </div>
                    </div>
                </div>
                <div class="formbold-mb-5">
                    <label for="name" class="formbold-form-label"> Person/s </label>
                    <input
                        type="number"
                        name="person"
                        id="name"
                        placeholder="xx"
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div class="formbold-mb-5 formbold-pt-3">
                    <label class="formbold-form-label formbold-form-label-2">
                        Appointment Details
                    </label>

                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5">
                            <!-- Checkboxes with dynamic options -->
                            <?php echo $checkboxes; ?>
                        </div>
                    </div>

                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <a href="index.php">
                                    <button type="button" class="formbold-btn" style="background-color: #6b6bff; color: white;">Back to Home</button>
                                </a>
                            </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <button class="formbold-btn" onclick="embeddedAlert();">Get Appointment</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
</body>

</html>
