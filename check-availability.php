<?php
include "connection.php";

// Get the doctor ID, appointment date, and time from the AJAX request
$doctorId = $_GET['doctorId'];
$date = $_GET['date'];
$time = $_GET['time'];

// Query the appointment table to check if the selected time slot is already booked
$query = "SELECT * FROM appointment WHERE Doctor_Id = '$doctorId' AND Date = '$date' AND Time = '$time'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Appointment slot is already booked
    echo "booked";
} else {
    // Appointment slot is available
    echo "available";
}
?>