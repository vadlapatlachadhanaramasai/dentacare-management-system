<?php
include 'db.php';
$jsonData = file_get_contents("php://input");
$data = json_decode($jsonData, true);

if ($data) {
    $name = $data['name'];
    $spec = $data['specialization'];
    $exp = $data['experience'];
    $phone = $data['phone'];
    $email = $data['email'];
    $avail = $data['availability'];

    $sql = "INSERT INTO dentists (name, specialization, experience, phone, email, availability) 
            VALUES ('$name', '$spec', '$exp', '$phone', '$email', '$avail')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>
