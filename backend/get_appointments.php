<?php
header('Content-Type: application/json');
include 'db.php';

// JOIN logic must match your specific patient_id and dentist_id columns
$sql = "SELECT a.appointment_id, p.name AS patientName, d.name AS dentistName, 
               a.appointment_date, a.appointment_time 
        FROM appointments a
        JOIN patients p ON a.patient_id = p.patient_id
        JOIN dentists d ON a.dentist_id = d.dentist_id";

$result = $conn->query($sql);
$appointments = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}
echo json_encode($appointments);
?>
