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
    <title>Stats Page</title>
</head>
<body>

<?php include '../functions/admin_navbar.php'; ?>

<main>
    <a href="edit_stats.php" class="add-button">Edit Stats</a>
    <h1>Welcome to the Stats Page</h1>

    <table id="statsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Value</th>
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
        url: '../functions/get_stats.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('error')) {
                $('#statsTable tbody').html('<tr><td colspan="3">' + data.error + '</td></tr>');
            } else {
                $.each(data, function(index, stat) {
                    var row = '<tr>';
                    row += '<td>' + stat.id + '</td>';
                    row += '<td>' + stat.name + '</td>';
                    row += '<td>' + stat.value + '</td>';
                    row += '</tr>';
                    $('#statsTable tbody').append(row);
                });
            }
        },
        error: function() {
            $('#statsTable tbody').html('<tr><td colspan="3">Error fetching data</td></tr>');
        }
    });
});
</script>

</body>
</html>
