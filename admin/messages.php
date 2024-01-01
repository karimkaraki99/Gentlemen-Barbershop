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
    <title>Messages Page</title>
</head>
<body>

<?php include '../functions/admin_navbar.php'; ?>

<main>
    <h1>Messages Page</h1>


    <table id="messageTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
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
        url: '../functions/get_messages.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('error')) {
                
                $('#messageTable tbody').html('<tr><td colspan="4">' + data.error + '</td></tr>');
            } else {
               
                $.each(data, function(index, message) {
                    var row = '<tr>';
                    row += '<td>' + message.id + '</td>';
                    row += '<td>' + message.name + '</td>';
                    row += '<td>' + message.email + '</td>';
                    row += '<td>' + message.message + '</td>';
                    row += '</tr>';
                    $('#messageTable tbody').append(row);
                });
            }
        },
        error: function() {
            $('#messageTable tbody').html('<tr><td colspan="4">Error fetching data</td></tr>');
        }
    });
});
</script>

</body>
</html>
