<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('location: staffregistration.php');
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
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

    <title>Staff Verification</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        /* Custom styles for navbar */
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
</head>

<body class="banner">

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Verification Account</a>
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
                        <?php $email = $_SESSION['mail']; ?>
                        <div class="card-header">Enter the OTP send to your email address <small> <?php echo $email; ?> </small></div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                <div class="form-group row">
                                    <label for="otp" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                    <div class="col-md-6">
                                        <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <input type="submit" value="Verify" name="verify" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
<?php
include 'connection.php';

if (isset($_POST["verify"])) {
    $email = $_SESSION['mail'];
    $result = mysqli_query($con, "SELECT OTP FROM patients WHERE Email='$email'");
    $row = mysqli_fetch_assoc($result);
    $storedOTP = $row['OTP'];
    $enteredOTP = $_POST['otp_code'];

    if ($storedOTP != $enteredOTP) {
?>
        <script>
            alert("Invalid OTP code");
        </script>
    <?php
    } else {
        mysqli_query($con, "UPDATE patients SET Status = 1 WHERE Email = '$email'");
    ?>
        <script>
            alert("Verify account done, you may sign in now");
            window.location.replace("petientregistration.php");
        </script>
<?php
    }
}

?>