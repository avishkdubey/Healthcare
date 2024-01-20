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
    <?php
    include "connection.php";
    $sel = "SELECT * FROM patients ";
    $que = mysqli_query($con, $sel) or die('hatbe');
    mysqli_num_rows($que) > 0; {
        $fetch = mysqli_fetch_assoc($que);
    }
    ?>

    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

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

        .profile-dropdown-content {
            display: none;
            background-color: white;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
            min-width: 150px !important;
            position: absolute;
            inset: 0px 0px auto auto;
            margin-top: 35px !important;
            margin-right: 20px !important;
            transform: translate3d(-0.5px, 39.5px, 0px);
        }

        .profile:hover .profile-dropdown-content {
            display: block;

        }


        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="fullcontainer banner">

        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(64, 44, 0, 0.4);">
            <a href="#" class="navbar-brand " style="font-weight: bold;font-size: 1.5rem;"><img src="Images\logo.png" alt="" height="60" width="60">HEALTHCARE</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar__right ml-auto">
                    <?php
                    $login_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM patients WHERE Patients_Id = '$_SESSION[Patients_Id]'"))
                    ?>
                    <div class="profile">
                        <a href="#">
                            <img style="border-radius: 100%; display: inline-block; width: 50px; height: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" data-bs-toogle="dropdown" src="<?php echo "Photos/" . $login_row['Photo']; ?>" alt="" />
                        </a>
                        <div class="profile-dropdown-content" style="min-width: 200px; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-0.5px, 39.5px, 0px);">
                            <a class="link" href="patient-profile.php" style="color:black; text-decoration:none;"><i class="fa fa-duotone fa-user" style="--fa-primary-color: #000000; --fa-secondary-color: #000000;"></i>&nbsp Profile</a><br>
                            <hr>

                            <a href="patient_logout.php" style="color:black; text-decoration:none;"><i class=" fa fa-thin fa-right-from-bracket" style="color: #000000;"></i></i>&nbsp Logout </a>
                        </div>
                    </div>
                </div>

            </div>
        </nav>

        <!-- Main Content -->
        <div class="container my-4">

            <h1>Welcome, <?= $login_row['Pname']; ?></h1>
            <div class="row">
                <section class="Appointment">
                    <div class="container">
                        <div class="alert alert-danger m-5" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);border: 0;">
                            <h2 style="color:red;"><b>*Your Scheduled Appointment*</b></h2>
                            <small style="color:darkred;">**Wait For Approving the Appointment From Doctor Side, If Appointment Status Is Approved Only Then You Can Visit The Doctor **</small>
                            <div class="m-5" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);border: 0;">
                                <table class="table table-striped mb-0 text-center" style="height: 20vh; overflow-y:scroll; ">
                                    <?php
                                    include 'connection.php';

                                    $currentDate = date("Y-m-d");

                                    $query = "SELECT appointment.Date, appointment.Time, appointment.Appointments_no, doctor.Address, appointment.Comment, appointment.Status, doctor.Dname FROM appointment JOIN doctor ON appointment.Doctor_Id = doctor.Doctor_Id WHERE appointment.Date >= '$currentDate'";

                                    $result = mysqli_query($con, $query);

                                    if ($result) {
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                            <thead style="background-color: #201823; color: #f5f7fa;">
                                                <tr>
                                                    <th>Appointment No.</th>
                                                    <th>Doctor Name</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Place</th>
                                                    <th>Comment</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Appointments_no']; ?></td>
                                                        <td>Dr. <?php echo $row['Dname']; ?></td>
                                                        <td><?php echo $row['Date']; ?></td>
                                                        <td><?php echo $row['Time']; ?></td>
                                                        <td><?php echo $row['Address']; ?></td>
                                                        <td><?php echo $row['Comment']; ?></td>
                                                        <td><?php echo $row['Status'] == 1 ? '<b style="color:green;" >Approved</b>' : '<b style="color:red;" >Pending</b>'; ?></td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php
                                        } else {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4">No appointment details found</td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        }
                                    } else {
                                        echo "Error executing the query: " . mysqli_error($con);
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>



            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card my-4">
                        <div class="card-body">
                            <img style="width:300px;" src="Images/doctor-5548567.png" alt="">
                            <h5 class="card-title">Book an Appointment</h5>
                            <p class="card-text">Schedule an appointment with your doctor.</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal" id="bookappointment">Book Appointment</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-4">
                        <div class="card-body">
                            <img style="width:330px;" src="Images/medical-5459661_1920.png" alt="">
                            <h5 class="card-title">Medical Records</h5>
                            <p class="card-text">View your medical records and history.</p>
                            <a href="p-medical-record.php" class="btn btn-primary" id="medicalrecords">View Medical Records</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-4">
                        <div class="card-body">
                            <img style="width:321px;" src="Images/medical-5459631_1280.png" alt="">
                            <h5 class="card-title">ID Card</h5>
                            <p class="card-text">Download your ID card.</p>
                            <a href="idcard.php" class="btn btn-primary">Download ID Card</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointment Modal -->
        <div class="modal-dialog" id="appoint">
            <?php
            include 'connection.php';

            $query = "SELECT * FROM doctor WHERE Status = 1";
            $result = mysqli_query($con, $query);

            ?>

            <div class="modal-content box">
                <div class="modal-header">
                    <h5 class="modal-title" style=" color: black; text-shadow: 2px 2px 4px #000000; font-size:30px;">Book an Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="insert-appointment.php" method="post" onsubmit="return validateForm()">
                        <input name="patient_id" value="<?php echo $login_row['Patients_Id']; ?>" type="text" style="display: none;">

                        <div class="form-group">
                            <label for="doctor-select">Select Doctor</label>
                            <select name="doctor" class="form-control" id="doctor-select" required>
                                <option>Select Doctor</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['Doctor_Id']; ?>">Dr. <?php echo $row['Dname']; ?>, <?php echo $row['Medical_Specialization']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="appointment-date">Appointment Date</label>
                            <input name="date" type="date" class="form-control" id="appointment-date" required>
                        </div>

                        <div class="form-group">
                            <label for="appointment-time">Appointment Time</label>
                            <select class="form-control form-control-lg" name="time" id="appointment-time" required>
                                <option value="">Select the time</option>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="10:30:00">10:30 AM</option>
                                <option value="11:00:00">11:00 AM</option>
                                <option value="11:30:00">11:30 AM</option>
                                <option value="12:00:00">12:00 PM</option>
                                <option value="12:30:00">12:30 PM</option>
                                <option value="13:00:00">1:00 PM</option>
                                <option value="13:30:00">1:30 PM</option>
                                <option value="14:00:00">2:00 PM</option>
                                <option value="14:30:00">2:30 PM</option>
                                <option value="15:00:00">3:00 PM</option>
                                <option value="15:30:00">3:30 PM</option>
                                <option value="16:00:00">4:00 PM</option>
                                <option value="16:30:00">4:30 PM</option>
                                <option value="17:00:00">5:00 PM</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="appointment-comments">Comments</label>
                            <textarea name="comment" class="form-control" id="appointment-comments" rows="3" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="book" type="submit" class="btn btn-primary">Book Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal-dialog" id="medical" style="display: none; background-color: white;">
            <div class="modal-header">
                <h5 class="modal-title" style=" color: black; text-shadow: 2px 2px 4px #000000; font-size:30px;">Your Medical Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            function validateForm() {
                var doctorId = document.getElementById("doctor-select").value;
                var date = document.getElementById("appointment-date").value;
                var time = document.getElementById("appointment-time").value;

                // Make an AJAX request to check if the appointment slot is available
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === "booked") {
                            alert("This time slot is already booked. Please select another time slot.");
                            return false;
                        }
                    }
                };
                xhr.open("GET", "check-availability.php?doctorId=" + doctorId + "&date=" + date + "&time=" + time, true);
                xhr.send();

                return true;
            }
        </script>



</body>

</html>