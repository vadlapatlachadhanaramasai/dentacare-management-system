<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $p_id = $data['patientId'];
    $con = $data['consultationFee'];
    $treat = $data['treatmentFee'];
    $med = $data['medicineFee'];
    $disc = $data['discount'];
    $total = $data['totalAmount'];

    $sql = "INSERT INTO bills (patient_id, consultation_fee, treatment_fee, medicine_fee, discount, total_amount) 
            VALUES ('$p_id', '$con', '$treat', '$med', '$disc', '$total')";

    if ($conn->query($sql) === TRUE) { 
        echo json_encode(["status" => "success"]); 
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>
