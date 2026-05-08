<?php
include 'db.php';
$sql = "SELECT b.bill_id, p.name as patientName, b.total_amount, b.bill_date 
        FROM bills b JOIN patients p ON b.patient_id = p.patient_id";
$result = $conn->query($sql);
$bills = [];
while($row = $result->fetch_assoc()) { $bills[] = $row; }
header('Content-Type: application/json');
echo json_encode($bills);
?>
