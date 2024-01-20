<?php
include "connection.php";

// Get the patient ID, doctor ID, appointment date, and time from the form submission
$patientId = $_POST['patient_id'];
$doctorId = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$comment = $_POST['comment'];

// Check if the selected time slot is still available
$query = "SELECT * FROM appointment WHERE Doctor_Id = '$doctorId' AND Date = '$date' AND Time = '$time'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Appointment slot is already booked
    echo "<script>alert('This time slot is already booked. Please select another time slot.'); window.location.href='patientdash.php';</script>";
    exit();
}

// The appointment slot is available, so insert the appointment record into the database
$insertQuery = "INSERT INTO appointment (Patient_Id, Doctor_Id, Date, Time, Comment, Status) VALUES ('$patientId', '$doctorId', '$date', '$time', '$comment', 0)";
$insertResult = mysqli_query($con, $insertQuery);

if ($insertResult) {
    // Appointment successfully booked
?>
    <script>
        alert("Appointment Scheduled");
        window.location.href = "patientdash.php";
    </script>
<?php
} else {
    // Error occurred while inserting the appointment record
?>
    <script>
        alert("Error");
    </script>
<?php
}
?>