<?php
include "../php/config.php";

$sql = "SELECT * FROM stats";
$result = $con->query($sql);

if ($result) {
    $stats = array();
    while ($row = $result->fetch_assoc()) {
        $stats[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'value' => $row['value']
        );
    }
    echo json_encode($stats);
} else {
    $error_message = $con->error; 
    error_log("Error executing database query: $error_message");
    echo json_encode(array('error' => 'Error executing database query'));
}
$con->close();
?>
