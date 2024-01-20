<?php
session_start();
if (!isset($_SESSION['Patients_Id'])) {
    header('location: patientlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Dashboard</title>
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            font-size: 18px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-footer {
            background-color: #f8f9fa;
            font-size: 14px;
        }

        .m-5 {
            margin: 5rem;
        }

        /* Responsive styles */
        @media (max-width: 767px) {
            .m-5 {
                margin: 2rem;
            }

            .card {
                margin-bottom: 20px;
            }
        }

        /* Custom styles for navbar */
        .navbar {
            background-color: #f8f9fa;
            padding:2px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
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

<body class="banner" >
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#"> Your Medical Records</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <?php
    include 'connection.php';

    $query = "SELECT medical_records.Diagnosis, medical_records.Treatment, medical_records.Prescription,medical_records.Instruction, doctor.Dname, doctor.Medical_Specialization FROM medical_records JOIN doctor ON medical_records.Doctor_Id = doctor.Doctor_Id ";

    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
    ?>
            <!-- Medical-records -->
            <div class="container" style="border:2px solid black; background-color: aliceblue;">
                
                <div class="modal-body m-5" style="overflow-y: scroll; height:70vh; width:80vh;">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="card mt-5">
                            <div class="card-header">
                                By <b>Dr. <?php echo $row['Dname']; ?></b>, <?php echo $row['Medical_Specialization']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b>Diagnosis</b></h5>
                                <p class="card-text"><?php echo $row['Diagnosis'];
                                                        ?></p>
                                <hr>
                                <h5 class="card-title"><b>Treatment</b></h5>
                                <p class="card-text"><?php echo $row['Treatment']; ?></p>
                                <hr>
                                <h5 class="card-title"><b>Prescription</b></h5>
                                <p class="card-text"><?php echo $row['Prescription']; ?></p>
                                <hr>
                                <h5 class="card-title"><b>Follow-up Instructions</b></h5>
                                <p class="card-text"><?php echo $row['Instruction']; ?></p>
                            </div>
                            <div class="card-footer text-muted">
                                HEALTHCARE
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
    <?php
        } else {
            echo "<p class='text-center mt-5'>No Medical Record Found</p>";
        }
    }
    ?>

    <!-- Custom JavaScript -->
    <script src="script.js"></script>
</body>

</html>