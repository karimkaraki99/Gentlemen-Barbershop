<?php
include "../php/config.php";

$sql = "SELECT * FROM contact";
$result = $con->query($sql);

if ($result) {
    $messages = array();
    while ($row = $result->fetch_assoc()) {
        $messages[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'message' => $row['message']
        );
    }
    echo json_encode($messages);
} else {
    $error_message = $con->error; 
    error_log("Error executing database query: $error_message");
    echo json_encode(array('error' => 'Error executing database query'));
}
$con->close();
?>
