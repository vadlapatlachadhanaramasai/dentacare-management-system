<?php
include 'db.php';
$sql = "SELECT dentist_id, name, specialization, experience, phone FROM dentists";
$result = $conn->query($sql);
$dentists = [];
while($row = $result->fetch_assoc()) { $dentists[] = $row; }
header('Content-Type: application/json');
echo json_encode($dentists);
$conn->close();
?>
