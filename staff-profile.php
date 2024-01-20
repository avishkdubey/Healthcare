<?php
session_start();
if (!isset($_SESSION['Staff_Id'])) {
    header('location: adminlogin.php');
}


include "connection.php";
$sel = "SELECT * FROM staff ";
$que = mysqli_query($con, $sel) or die('hatbe');
mysqli_num_rows($que) > 0; {
    $fetch = mysqli_fetch_assoc($que);
}
$login_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM staff WHERE Staff_Id = '$_SESSION[Staff_Id]'"));
?>
<!DOCTYPE html>
<html>

<head>
    <title>Staff Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Include custom CSS -->
    <style>
        body {
            min-height: 100vh;
            width: auto;
            background-image: url("Images/man-1351346.png");
            background-size: 100%;
            background-attachment: auto;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 38px;
        }

        /* Sidebar */
        .profile-sidebar {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }

        .widget-profile .booking-doc-img {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }

        .widget-profile .booking-doc-img img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .widget-profile .profile-info-widget h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .widget-profile .doctor-details {
            color: #6c757d;
        }

        .dashboard-widget .dashboard-menu ul {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .dashboard-widget .dashboard-menu ul li {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .dashboard-widget .dashboard-menu ul li:last-child {
            border-bottom: none;
        }

        .dashboard-widget .dashboard-menu ul li a {
            display: flex;
            align-items: center;
            color: #343a40;
        }

        .dashboard-widget .dashboard-menu ul li a i {
            margin-right: 10px;
        }

        .dashboard-widget .dashboard-menu ul li.active a {
            color: #007bff;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }

        .card-title {
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-control {
            height: 40px;
            border-radius: 4px;
        }

        .submit-section {
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        textarea.form-control {
            height: 120px;
            resize: vertical;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-sidebar card" style="border: 2px solid black;  ">
                    <div class="widget-profile pro-widget-content">
                        <center>
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img style="" src="<?php echo "Photos/" . $login_row['Photo']; ?>" alt="Doctor Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>Mr. <?= $login_row['Sname']; ?></h3>
                                    <div class="doctor-details">
                                        <p class="mb-0">Staff Id : <?= $login_row['Staff_Id']; ?></p>
                                        <p class="mb-0"><i class="fas fa-user-md"></i> <?= $login_row['Designation']; ?></p>
                                        <p class="mb-0"><i class="fas fa-map-marker-alt"></i> <?= $login_row['Address']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="active">
                                    <a href="admindashboard.php">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-user-cog"></i>
                                        <span>Profile Settings</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-calendar-check"></i>
                                        <span>Appointments</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-comments"></i>
                                        <span>Reviews</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card-title">Profile Settings</h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="admindashboard.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button></a>
                                </div>

                            </div>
                            <form action="update-staff-data.php" method="post">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input name="name" type="text" class="form-control" value="<?= $login_row['Sname']; ?>" oninput="allowOnlyAlphabets(event)" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" value="<?= $login_row['Email']; ?>" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Aadhaar</label>
                                    <input name="adhaarNo" type="text" class="form-control" value="<?= $login_row['Aadhaar']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>DOB</label>
                                    <input name="dob" type="date" class="form-control" value="<?= $login_row['DOB']; ?>" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input name="mnumber" type="tel" pattern="[1-9]{1}[0-9]{9}" class="form-control" value="<?= $login_row['Phone']; ?>" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control" value="<?= $login_row['Address']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input name="state" type="text" class="form-control" value="<?= $login_row['State']; ?>" oninput="allowOnlyAlphabets(event)" required>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" type="text" class="form-control" value="<?= $login_row['City']; ?>" oninput="allowOnlyAlphabets(event)" required>
                                </div>
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input name="pincode" type="text" class="form-control" value="<?= $login_row['Pincode']; ?>" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);">
                                </div>
                                <div class="submit-section">
                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script>
        function allowOnlyAlphabets(event) {
            var input = event.target;
            var regex = /[^a-zA-Z\s]/g;
            input.value = input.value.replace(regex, '');
        }
    </script>
</body>

</html>