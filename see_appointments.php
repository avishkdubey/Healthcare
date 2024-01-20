<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['Doctor_Id'])) {
    header('location: doctorlogin.php');
    exit;
}

$doctorId = $_SESSION['Doctor_Id'];
$login_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Doctor WHERE Doctor_Id = '$doctorId'"));

$query = "SELECT appointment.Appointments_no, appointment.Date, appointment.Time, appointment.Comment, appointment.Status, patients.Photo, patients.Pname, patients.Aadhaar FROM appointment JOIN doctor ON appointment.Doctor_Id = doctor.Doctor_Id JOIN patients ON appointment.Patient_Id = patients.Patients_Id WHERE doctor.Doctor_Id = '$doctorId'";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Doctor Appointments</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Include custom CSS -->
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .intro {
            height: 100%;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        thead th {
            color: #fff;
        }

        .card {
            border-radius: .5rem;
        }

        .table-scroll {
            border-radius: .5rem;
        }

        .table-scroll table thead th {
            font-size: 1.25rem;
        }

        thead {
            top: 0;
            position: sticky;
        }

        .banner {
            min-height: 100vh;
            width: 100%;
            background-image: url("Images/kaboompics_yellow-stethoscope-and-pills-on-yellow-background-17836.jpg");
            background-size: 100%;
            background-attachment: auto;

        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            color: #333;
        }
    </style>
</head>

<body class="bg-light">
    <div class="fullcontainer banner" id="homesection">
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
                                <a class="nav-link active text-white" aria-current="page" href="doctordash.php">Home</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center p-0">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body m-3">
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 610px">
                                            <h2>Appointments</h2>
                                            <table class="table table-striped mb-0 text-center">
                                                <thead style="background-color: #201823; color:#f5f7fa;">
                                                    <tr>
                                                        <th>Appointment Number</th>
                                                        <th>Photo</th>
                                                        <th>Patient Name</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Comment</th>
                                                        <th>Aadhaar</th>
                                                        <th>Status</th>
                                                        <th>Modify Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['Appointments_no'] . "</td>";
                                                    ?> <td> <img src="<?php echo "Photos/" . $row['Photo']; ?>" width="50" height="60"></td><?php
                                                                                                                                            echo "<td>" . $row['Pname'] . "</td>";
                                                                                                                                            echo "<td>" . $row['Date'] . "</td>";
                                                                                                                                            echo "<td>" . $row['Time'] . "</td>";
                                                                                                                                            echo "<td>" . $row['Comment'] . "</td>";
                                                                                                                                            echo "<td>" . $row['Aadhaar'] . "</td>";
                                                                                                                                            if($row['Status'] == 1 ){
                                                                                                                                                echo "<td>Apporved</td>";
                                                                                                                                            }else{
                                                                                                                                                echo "<td>Pending</td>";
                                                                                                                                            }
                                                                                                                                            ?><td>
                                                            <?php if ($row['Status'] == 1) { ?>
                                                                <p><button class="status-button btn btn-danger" data-doctor-id="<?php echo $row['Appointments_no']; ?>" data-status="0">Cancel</button></p>
                                                            <?php } else { ?>
                                                                <p><button class="status-button btn btn-success" data-doctor-id="<?php echo $row['Appointments_no']; ?>" data-status="1">Approved</button></p>
                                                            <?php } ?>
                                                        </td><?php

                                                                echo "</tr>";
                                                            }
                                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to handle changing the appointment status
            $(".status-button").click(function() {
                var appointmentNo = $(this).data("doctor-id");
                var newStatus = $(this).data("status");

                // Make an AJAX request to update the appointment status
                $.ajax({
                    url: "update-appointment-status.php",
                    method: "POST",
                    data: {
                        appointmentNo: appointmentNo,
                        newStatus: newStatus
                    },
                    success: function(response) {
                        alert(response);
                        window.location.reload(); // Refresh the page after changing the appointment status
                    }
                });
            });
        });
    </script>

</body>

</html>