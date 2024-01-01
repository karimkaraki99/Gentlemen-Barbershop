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
    <title>Your Website</title>
</head>
<body>

<?php include '../functions/admin_navbar.php'; ?>

<main>
    <h1>Welcome to the Admin Page</h1>
    <p>This is where you can control your website.</p>
</main>

<h1>Users</h1>
<table id="userTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
$(document).ready(function() {
 
    $.ajax({
        url: '../functions/get_users.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('error')) {
             
                $('#userTable tbody').html('<tr><td colspan="4">' + data.error + '</td></tr>');
            } else {
               
                $.each(data, function(index, user) {
                    var row = '<tr>';
                    row += '<td>' + user.name + '</td>';
                    row += '<td>' + user.email + '</td>';
                    row += '<td>' + user.phoneNumber + '</td>';
                    row += '<td>' + user.role + '</td>';
                    row += '</tr>';
                    $('#userTable tbody').append(row);
                });
            }
        },
        error: function() {
    
            $('#userTable tbody').html('<tr><td colspan="4">Error fetching data</td></tr>');
        }
    });
});
</script>

</body>
</html>
