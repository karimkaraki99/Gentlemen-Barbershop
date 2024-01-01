<?php
include "../php/config.php";

$sql = "SELECT * FROM services";
$result = $con->query($sql);

if ($result) {
    $services = array();
    while ($row = $result->fetch_assoc()) {
        $services[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price']
        );
    }
    echo json_encode($services);
} else {
    $error_message = $con->error; 
    error_log("Error executing database query: $error_message");
    echo json_encode(array('error' => 'Error executing database query'));
}

$con->close();
?>
