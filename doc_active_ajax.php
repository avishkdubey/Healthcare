<?php
include 'connection.php';

if (isset($_POST['Doctor_Id']) && isset($_POST['Status'])) {
    $doctorId = $_POST['Doctor_Id'];
    $status = $_POST['Status'];

    // Update the status of the doctor in the database
    $updateQuery = "UPDATE doctor SET Status = $status WHERE Doctor_Id = $doctorId";
    mysqli_query($con, $updateQuery);

    // Return a response to indicate the status update was successful
    echo 'success';
}
?>
