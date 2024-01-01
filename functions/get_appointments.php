<?php
include "../php/config.php";

$sql = "SELECT * FROM appointment";
$result = $con->query($sql);

if ($result) {
    $appointments = array();
    while ($row = $result->fetch_assoc()) {
        $appointments[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'date' => $row['date'],
            'time' => $row['time'],
            'person' => $row['person'],
            'service' => $row['service']
        );
    }
    echo json_encode($appointments);
} else {
    $error_message = $con->error;
    error_log("Error executing database query: $error_message");
    echo json_encode(array('error' => 'Error executing database query'));
}
$con->close();
?>
