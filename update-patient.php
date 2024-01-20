<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['Patients_Id'])) {
    header('location: patientlogin.php');
}
if (isset($_POST['submit'])) {

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $allergies = isset($_POST['allergies']) ? $_POST['allergies'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $pincode = isset($_POST['pincode']) ? $_POST['pincode'] : '';
    $phone = isset($_POST['mnumber']) ? $_POST['mnumber'] : '';

    $updatequery = "UPDATE patients SET  DOB = '$dob', Gender = '$gender', Email = '$email',Allergies = '$allergies', Phone = '$phone', Address = '$address', State = '$state', City = '$city', Pincode = '$pincode' WHERE Patients_Id = " . $_SESSION['Patients_Id'];

    $res = mysqli_query($con, $updatequery);

    if ($res) {
?><script>
            alert('Your Profile Updated Successfully');
            window.location.href = 'patient-profile.php';
        </script><?php
                } else {
                    echo "Error";
                }
            }
