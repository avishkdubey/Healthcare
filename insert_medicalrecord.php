<?php
session_start();
if (!isset($_SESSION['Doctor_Id'])) {
    header('location: doctorlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Record Form</title>
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-footer button {
            margin-right: 0.5rem;
        }

        .banner {
            min-height: auto;
            width: auto;
            background-image: url("Images/kaboompics_yellow-stethoscope-and-pills-on-yellow-background-17836.jpg");
            background-size: 100%;
            background-attachment: auto;
        }

        .box {
            width: 100vh;
            height: auto;
            margin: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }


        footer {
            background-color: #f8f9fa;
            padding: 25px 0;
            color: #333;
            margin-top: 70px;
        }
    </style>
</head>

<body>
    <div class="fullcontainer banner">

        <header>
            <nav class="navbar navbar-expand-lg" style="background-color:rgba(64, 44, 0, 0.4);">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand text-white"><img src="Images\logo.png" alt="" height="60" width="60">HEALTHCARE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="admindashboard.php">Home</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <div class="modal-content box mt-5">
            <div class="modal-header">
                <h5 class="modal-title">
                    <h1 style=" color: black; text-shadow: 2px 2px 4px #000000; margin:auto;">Medical Record Form</h1>
                </h5>

            </div>
            <div class="modal-body">

                <?php
                include 'connection.php';

                if (isset($_POST['submit'])) {
                    $did = $_POST['doctorId'];
                    $pid = $_POST['patientId'];
                    $diagnosis = $_POST['diagnosis'];
                    $treatment = $_POST['treatment'];
                    $prescription = $_POST['prescription'];
                    $followUp = $_POST['followUp'];

                    $insertquery = "INSERT INTO medical_records(Patients_Id, Doctor_Id, Diagnosis, Treatment, Prescription, Instruction) VALUES ('$pid','$did','$diagnosis','$treatment','$prescription','$followUp')";

                    $res = mysqli_query($con, $insertquery);
                    if ($res) {
                ?>
                        <script>
                            alert("Medical Record Added Sucsessfully");
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            alert("error");
                        </script>
                <?php
                    }
                }
                ?>
                <form method="post" id="medicalRecordForm">

                    <!-- Doctor Id and Patient Id fields -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="patientId">Patient ID</label>
                            <input type="text" class="form-control" id="patientId" name="patientId" required>
                        </div>
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="doctorId">Doctor ID</label>
                            <?php
                            $id = $_SESSION['Doctor_Id'];
                            ?>
                            <input type="text" value="<?php echo $id ?>" class="form-control" id="doctorId" name="doctorId" readonly>
                        </div>

                    </div>

                    <!-- Diagnosis and Treatment fields -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="diagnosis">Diagnosis</label>
                            <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="treatment">Treatment</label>
                            <input type="text" class="form-control" id="treatment" name="treatment" required>
                        </div>
                    </div>

                    <!-- Prescription and Follow-up Instructions fields -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="prescription">Prescription</label>
                            <textarea class="form-control" id="prescription" name="prescription" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="followUp">Follow-up Instructions</label>
                            <textarea class="form-control" id="followUp" name="followUp" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>


        <footer style="background-color:#E8D4BB;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">&copy; 2023 HEALTHCARE. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script language="javascript">
        print_state("sts");
    </script>
</body>

</html>