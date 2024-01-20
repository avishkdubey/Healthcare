<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['Doctor_Id'])) {
  header('location: doctorlogin.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $appointmentNo = $_POST['appointmentNo'];
  $newStatus = $_POST['newStatus'];

  // Update the appointment status in the database
  $updateQuery = "UPDATE appointment SET Status = $newStatus WHERE Appointments_no = $appointmentNo";
  $result = mysqli_query($con, $updateQuery);

  if ($result) {
    echo "Appointment status updated successfully";
  } else {
    echo "Failed to update appointment status";
  }
}
?>
