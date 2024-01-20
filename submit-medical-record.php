<?php

include 'connection.php';

// Get form data
$doctorId = $_POST['doctorId'];
$patientId = $_POST['patientId'];
$diagnosis = $_POST['diagnosis'];
$treatment = $_POST['treatment'];
$prescription = $_POST['prescription'];
$followUp = $_POST['followUp'];

// Prepare SQL statement
$stmt = $con->prepare("INSERT INTO medical_records (Doctor_Id, Patient_Id, Diagnosis, Treatment, Prescription, Instruction) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iissss", $doctorId, $patientId, $diagnosis, $treatment, $prescription, $followUp);

// Execute SQL statement
if ($stmt->execute() === TRUE) {
  echo "Medical record saved successfully!";
} else {
  echo "Error saving medical record! ";
}

// Close connection and statement
$stmt->close();
$con->close();

?>
