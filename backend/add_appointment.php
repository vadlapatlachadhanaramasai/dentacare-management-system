<?php
// Enable error reporting to see what is wrong
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    // Check if variables are set in the incoming JSON
    $p_id = $data['patientId'] ?? null;
    $d_id = $data['dentistId'] ?? null;
    $date = $data['date'] ?? null;
    $time = $data['time'] ?? null;
    $reason = $data['reason'] ?? "";

    if (!$p_id || !$d_id || !$date) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    // Double check these column names against your phpMyAdmin Structure tab
    $sql = "INSERT INTO appointments (patient_id, dentist_id, appointment_date, appointment_time, reason) 
            VALUES ('$p_id', '$d_id', '$date', '$time', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>
