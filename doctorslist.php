<?php
include 'connection.php';

$query = "select * from doctor";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Details</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="C:\xampp\htdocs\demo\adminpannel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
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
        padding: 50px 0;
        color: #333;
    }

    footer h5 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    footer p {
        font-size: 16px;
        line-height: 1.5;
    }

    footer ul {
        padding: 0;
        list-style: none;
        margin-bottom: 20px;
    }

    footer ul li {
        margin-bottom: 10px;
    }

    footer ul.social-media li {
        display: inline-block;
        margin-right: 10px;
    }

    footer ul.social-media li a {
        font-size: 20px;
        color: #333;
        transition: all 0.3s ease;
    }

    footer ul.social-media li a:hover {
        color: #007bff;
    }

    footer ul.contact-info li i {
        margin-right: 10px;
        color: #007bff;
    }

    footer form {
        margin-top: 20px;
    }

    footer form .form-group {
        margin-bottom: 10px;
    }

    footer form input[type="email"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        box-shadow: none;
        background-color: #fff;
    }

    footer form button[type="submit"] {
        border-radius: 5px;
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
                                <a class="nav-link active text-white" aria-current="page" href="admindashboard.php">Home</a>
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
                                    <div class="card-body">
                                        <div>
                                            <h2 class="display-6 text-center">Doctors Detail's</h2>
                                        </div>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0 text-center">
                                                <thead style="background-color: #201823; color:#f5f7fa;">
                                                    <tr>
                                                        <th scope="col">PHOTO</th>
                                                        <th scope="col">DOCTOR ID</th>
                                                        <th scope="col">NAME</th>
                                                        <th scope="col">MEDICAL SPECIALIZATION</th>
                                                        <th scope="col">EMAIL</th>
                                                        <th scope="col">AADHAAR</th>
                                                        <th scope="col">PHONE NUMBER</th>
                                                        <th scope="col">DOB</th>
                                                        <th scope="col">GENDER</th>
                                                        <th scope="col">ADDRESS</th>
                                                        <th scope="col">STATE</th>
                                                        <th scope="col">PINCODE</th>
                                                        <th scope="col">CITY</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo "Photos/" . $row['Photo']; ?>" width="50" height="50"></td>
                                                            <td><?php echo $row['Doctor_Id'] ?></td>
                                                            <td><?php echo $row['Dname'] ?></td>
                                                            <td><?php echo $row['Medical_Specialization'] ?></td>
                                                            <td><?php echo $row['Email'] ?></td>
                                                            <td><?php echo $row['Aadhaar'] ?></td>
                                                            <td><?php echo $row['Phone'] ?></td>
                                                            <td><?php echo $row['DOB'] ?></td>
                                                            <td><?php echo $row['Gender'] ?></td>
                                                            <td><?php echo $row['Address'] ?></td>
                                                            <td><?php echo $row['State'] ?></td>
                                                            <td><?php echo $row['Pincode'] ?></td>
                                                            <td><?php echo $row['City'] ?></td>
                                                            <td>
                                                                <?php if ($row['Status'] == 1) { ?>
                                                                    <p><button class="status-button btn btn-success" data-doctor-id="<?php echo $row['Doctor_Id']; ?>" data-status="0">Active</button></p>
                                                                <?php } else { ?>
                                                                    <p><button class="status-button btn btn-danger" data-doctor-id="<?php echo $row['Doctor_Id']; ?>" data-status="1">Deactive</button></p>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
    <footer style="background-color:#E8D4BB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h5>About Us</h5>
                    <p>At Healthcare, we are committed to providing access to quality healthcare to individuals and communities in need. Our organization is driven by the belief that everyone should have the right to receive adequate medical attention, regardless of their economic or social status.</p>
                    <ul class="social-media">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Contact Us</h5>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i>Madhav Institute Of Technology</li>
                        <li><i class="fas fa-phone"></i>(+91) 6265614346</li>
                        <li><i class="fas fa-envelope"></i>healthcare@healthcare.com</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h5>Subscribe to Our Newsletter</h5>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">&copy; 2023 HEALTHCARE. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.status-button').click(function() {
                var doctorId = $(this).data('doctor-id');
                var status = $(this).data('status');

                // Send AJAX request to doc_active_ajax.php
                $.ajax({
                    url: 'doc_active_ajax.php',
                    type: 'POST',
                    data: {
                        Doctor_Id: doctorId,
                        Status: status
                    },
                    success: function(response) {
                        // Update the button text and class based on the response
                        if (response === 'success') {
                            if (status == 1) {
                                $('.status-button[data-doctor-id="' + doctorId + '"]').removeClass('btn-danger').addClass('btn-success').text('Active').data('status', 0);
                            } else {
                                $('.status-button[data-doctor-id="' + doctorId + '"]').removeClass('btn-success').addClass('btn-danger').text('Deactive').data('status', 1);
                            }
                        } else {
                            alert('Failed to update status. Please try again.');
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>