<?php
include 'connection.php';
if ($_POST['aadhaar_valid'] == 'valid') {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $aadhaar = $_POST['adhaarNo'];
    $allergies = $_POST['allergies'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $phone = $_POST['mnumber'];
    $file = $_FILES['image'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {
        $destfile = 'Photos/' . $filename;
        move_uploaded_file($filepath, $destfile);
    }
    $checkqueryemail = "SELECT * FROM patients WHERE Email = '$email'";
    $checkresultemail = mysqli_query($con, $checkqueryemail);
    $checkqueryaadhaar = "SELECT * FROM patients WHERE Aadhaar = '$aadhaar'";
    $checkresultaadhaar = mysqli_query($con, $checkqueryaadhaar);

    if (mysqli_num_rows($checkresultemail) > 0) {
        echo 4;
    } else if (mysqli_num_rows($checkresultaadhaar) > 0) {
        echo 5;
    } else {

        $otp = rand(100000, 999999);
        // After generating OTP and storing in session variables
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['mail'] = $email;
        $insertquery = "INSERT INTO patients(Pname,PFname,DOB,Gender,Address,State,City,Pincode,Phone,Email,Password,Allergies,Aadhaar,Photo,OTP)
     VALUES ('$name','$fname','$dob','$gender','$address','$state','$city','$pincode','$phone','$email','$pass','$allergies','$aadhaar','$filename','$otp')";
        $res = mysqli_query($con, $insertquery);
        $res = mysqli_query($con, $insertquery);

        if ($res) {
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'healthcarengo9@gmail.com';
            $mail->Password = 'eynrpsnikxotlfia';

            $mail->setFrom('healthcarengo9@gmail.com', 'HEALTHCARE OTP Verification');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject = "Your verify code";
            $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>HEALTHCARE</b>
                    Thankyou..";

            if (!$mail->send()) {
                echo "Invalid Email";
            } else {

                echo 1;
            }
        } else {
            echo 2;
        }
    }
} else {
    echo 3;
}