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
    <title>Services Page</title>
</head>
<body>

<?php include '../functions/admin_navbar.php'; ?>

<main>
    <a href="edit_services.php" class="add-button">Edit Services</a>
    <h1>Welcome to the Services Page</h1>

    <table id="serviceTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
         
        </tbody>
    </table>
</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $.ajax({
        url: '../functions/get_services.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('error')) {
                $('#serviceTable tbody').html('<tr><td colspan="3">' + data.error + '</td></tr>');
            } else {
                $.each(data, function(index, service) {
                    var row = '<tr>';
                    row += '<td>' + service.id + '</td>';
                    row += '<td>' + service.name + '</td>';
                    row += '<td>' + service.price + '</td>';
                    row += '</tr>';
                    $('#serviceTable tbody').append(row);
                });
            }
        },
        error: function() {
            $('#serviceTable tbody').html('<tr><td colspan="3">Error fetching data</td></tr>');
        }
    });
});
</script>

</body>
</html>
