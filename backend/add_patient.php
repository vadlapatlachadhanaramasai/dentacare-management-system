<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $name = $data['name'];
    $age = $data['age'];
    $gender = $data['gender'];
    $phone = $data['phone'];
    $email = $data['email'];
    $bloodGroup = $data['bloodGroup'];
    $address = $data['address'];
    $medicalHistory = $data['medicalHistory'];

    $sql = "INSERT INTO patients (name, age, gender, phone, email, blood_group, address, medical_history) 
            VALUES ('$name', '$age', '$gender', '$phone', '$email', '$bloodGroup', '$address', '$medicalHistory')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>
