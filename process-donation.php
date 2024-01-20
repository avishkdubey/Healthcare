<?php
include 'connection.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mnumber'];
    $card = $_POST['cnumber'];
    $expiredate = $_POST['expire'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amt'];
    $status = "1";

    // Check if name contains only alphabets
    if (!preg_match('/^[A-Za-z ]+$/', $name)) {
        // Display an error message or perform necessary action
        echo "2";
        exit;
    }

    // Check if card number has a length of 14 digits
    if (strlen($card) !== 16) {
        // Display an error message or perform necessary action
        echo "3";
        exit;
    }

    // Check if the expiration date year is a future year
    $currentYear = date('Y');
    $expireYear = substr($expiredate, 3);
    if ($expireYear > $currentYear) {
        // Display an error message or perform necessary action
        echo "4";
        exit;
    }

    $insertquery = "INSERT INTO donation(Donater_Name, Donater_Email, Donater_Phone, Amount, Card_Number, Donation_Status) VALUES ('$name','$email','$mobile','$amount' ,'$card','$status')";

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

        $mail->setFrom('healthcarengo9@gmail.com', 'HEALTHCARE');
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Thankyou for donating";
        $mail->Body = "<p>Dear <b>$name</b>,</p>
        <p>Thank you for donating the amount of $amount rupees to our HEALTHCARE NGO <br></p>
        <br><br>
        <p>With regards,</p>
        <b>HEALTHCARE</b>
        Thank you..";
        if($mail->send()){
            echo "1";

        }

    
}
?>