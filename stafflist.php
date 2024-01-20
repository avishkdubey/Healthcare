<?php
include 'connection.php';

$query = "select * from staff";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Detail's</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="C:\xampp\htdocs\demo\adminpannel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                                            <h2 class="display-6 text-center">Staff Detail's</h2>
                                        </div>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0 text-center">
                                                <thead style="background-color: #201823; color:#f5f7fa;">
                                                    <tr>
                                                        <th scope="col">PHOTO</th>
                                                        <th scope="col">STAFF ID</th>
                                                        <th scope="col">DESIGNATION</th>
                                                        <th scope="col">NAME</th>
                                                        <th scope="col">EMAIL</th>
                                                        <th scope="col">AADHAAR</th>
                                                        <th scope="col">PHONE NUMBER</th>
                                                        <th scope="col">DOB</th>
                                                        <th scope="col">GENDER</th>
                                                        <th scope="col">ADDRESS</th>
                                                        <th scope="col">STATE</th>
                                                        <th scope="col">PINCODE</th>
                                                        <th scope="col">CITY</th>
                                                        
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <tr>

                                                        <?php
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <td> <img src="<?php echo "Photos/" . $row['Photo']; ?>" width="50" height="50"></td>
                                                            <td><?php echo $row['Staff_Id'] ?></td>
                                                            <td><?php echo $row['Designation'] ?></td>
                                                            <td><?php echo $row['Sname'] ?></td>
                                                            <td><?php echo $row['Email'] ?></td>
                                                            <td><?php echo $row['Aadhaar'] ?></td>
                                                            <td><?php echo $row['Phone'] ?></td>
                                                            <td><?php echo $row['DOB'] ?></td>
                                                            <td><?php echo $row['Gender'] ?></td>
                                                            <td><?php echo $row['Address'] ?></td>
                                                            <td><?php echo $row['State'] ?></td>
                                                            <td><?php echo $row['Pincode'] ?></td>
                                                            <td><?php echo $row['City'] ?></td>


                                                    </tr>

                                                <?php
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
    <footer style="background-color:#E8D4BB;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">&copy; 2023 HEALTHCARE. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>