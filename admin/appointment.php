<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Appointment Page</title>
</head>
<body>
<?php include '../functions/admin_navbar.php'; ?>

<h1>Appointment Page</h1>


<table id="appointmentTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Person</th>
            <th>Service</th>
        </tr>
    </thead>
    <tbody>
     
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
$(document).ready(function() {
  
    $.ajax({
        url: '../functions/get_appointments.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('error')) {
                $('#appointmentTable tbody').html('<tr><td colspan="6">' + data.error + '</td></tr>');
            } else {
                $.each(data, function(index, appointment) {
                    var row = '<tr>';
                    row += '<td>' + appointment.id + '</td>';
                    row += '<td>' + appointment.name + '</td>';
                    row += '<td>' + appointment.date + '</td>';
                    row += '<td>' + appointment.time + '</td>';
                    row += '<td>' + appointment.person + '</td>';
                    row += '<td>' + appointment.service + '</td>';
                    row += '</tr>';
                    $('#appointmentTable tbody').append(row);
                });
            }
        },
        error: function() {
            $('#appointmentTable tbody').html('<tr><td colspan="6">Error fetching data</td></tr>');
        }
    });
});
</script>

</body>
</html>
