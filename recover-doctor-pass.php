<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Password Recovery</title>
    <style>
        .navbar {
            background-color: #f8f9fa;
            padding: 10px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Custom styles for form */
        .login-form .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .login-form label {
            font-weight: bold;
            color: #333;
        }

        .login-form input[type="text"],
        .login-form input[type="submit"] {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            width: 100%;
            margin-bottom: 10px;
        }

        .login-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .banner {
            min-height: 100vh;
            width: 100%;
            background-image: url("Images/kaboompics_yellow-stethoscope-and-pills-on-yellow-background-17836.jpg");
            background-size: 100%;
            background-attachment: auto;
        }
    </style>


    </style>
</head>

<body class="banner">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">User Password Recovery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <main class="login-form" style="margin-top: 25vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Password Recovery</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="recover_psw">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Recover" name="recover" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>


<?php
if (isset($_POST["recover"])) {
    include 'connection.php';
    $email = $_POST["email"];

    $sql = mysqli_query($con, "SELECT * FROM doctor WHERE Email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) <= 0) {
?>
        <script>
            alert("<?php echo "Sorry, no emails exists " ?>");
        </script>
    <?php
    } else if ($fetch["Status"] == 0) {
    ?>
        <script>
            alert("Sorry, your account must verify first, before you recover your password !");
            window.location.replace("doctorlogin.php");
        </script>
        <?php
    } else {
        // generate token by binaryhexa 
        $token = bin2hex(random_bytes(50));

        //session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        // h-hotel account
        $mail->Username = 'healthcarengo9@gmail.com';
        $mail->Password = 'eynrpsnikxotlfia';

        // send by h-hotel email
        $mail->setFrom('healthcarengo9@gmail.com', 'Healthcare');
        // get email from input
        $mail->addAddress($_POST["email"]);
        

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Recover your password";
        $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/ngo/reset-doctor-pass.php
            <br><br>
            <p>With regrads,</p>
            <b>HEALTHCARE NGO</b>";

        if (!$mail->send()) {
        ?>
            <script>
                alert("<?php echo " Invalid Email " ?>");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Password recovery link sent to your mail <?php echo $email ?>")
                window.location.replace("doctorlogin.php");
            </script>
<?php
        }
    }
}


?>