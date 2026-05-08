<?php
include 'db.php'; // This connects to the database

$sql = "SELECT patient_id, name, phone FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Patient List</h2><ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["patient_id"]. " - Name: " . $row["name"]. "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results found";
}
$conn->close();
?>
