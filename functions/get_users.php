<?php
include "../php/config.php";

$sql = "SELECT name, email, phoneNumber, role FROM user";
$result = $con->query($sql);

if ($result) {
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = array(
            'name' => $row['name'],
            'email' => $row['email'],
            'phoneNumber' => $row['phoneNumber'],
            'role' => ($row['role'] == 1 ? 'user' : 'admin')
        );
    }
    echo json_encode($users);
} else {
    $error_message = $con->error; 
    error_log("Error executing database query: $error_message");
    echo json_encode(array('error' => 'Error executing database query'));
}


$con->close();
?>
