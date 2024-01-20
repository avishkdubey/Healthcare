<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['Staff_Id'])) {
    header('location: adminlogin.php');
    exit;
}
if (isset($_POST['submit'])) {
    
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $pincode = isset($_POST['pincode']) ? $_POST['pincode'] : '';
    $phone = isset($_POST['mnumber']) ? $_POST['mnumber'] : '';

    $updatequery = "UPDATE staff SET  DOB = '$dob', Gender = '$gender', Email = '$email', Phone = '$phone', Address = '$address', State = '$state', City = '$city', Pincode = '$pincode' WHERE Staff_Id = ".$_SESSION['Staff_Id'];

    $res = mysqli_query($con, $updatequery);

    if ($res) {
        ?><script>alert('Your Profile Updated Successfully'); window.location.href = 'staff-profile.php';</script><?php
    } else {
        echo "Error";
    }
}
