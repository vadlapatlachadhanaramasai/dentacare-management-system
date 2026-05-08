<?php
// Include the database connection
include 'db.php';

// SQL to select patients
$sql = "SELECT patient_id, name, age, gender, phone, blood_group FROM patients";
$result = $conn->query($sql);

$patients = [];

if ($result->num_rows > 0) {
    // Fetch each row and add it to the array
    while($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
}

// Return the data as JSON for the frontend
header('Content-Type: application/json');
echo json_encode($patients);

$conn->close();
?>
