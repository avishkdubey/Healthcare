<?php
session_start();
if (!isset($_SESSION['Doctor_Id'])) {
    header('location: doctorlogin.php');
    exit();
}

include 'connection.php';

$doctorId = $_SESSION['Doctor_Id'];

// Fetch the appointments for the logged-in doctor, grouped by patient
$query = "SELECT patients.*, appointment.* FROM appointment 
          INNER JOIN patients ON appointment.Patient_Id = patients.Patients_Id 
          WHERE appointment.Doctor_Id = '$doctorId'
          GROUP BY patients.Patients_Id";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\demo\adminpannel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border: 0;">
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #f5f7fa;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container m-5">
                    <div class="row justify-content-center p-0">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h2 class="display-6 text-center">Your Patient's</h2>
                                    </div>
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                                        <center></center><table class="table table-striped mb-0 text-center">
                                            <thead style="background-color: #201823; color:#f5f7fa;">
                                                <tr>
                                                    <th scope="col">PHOTO</th>
                                                    <th scope="col">PATIENT ID</th>
                                                    <th scope="col">NAME</th>
                                                    <th scope="col">FATHER'S NAME</th>
                                                    <th scope="col">ALLERGIES</th>
                                                    <th scope="col">EMAIL</th>
                                                    <th scope="col">AADHAAR</th>
                                                    <th scope="col">PHONE NUMBER</th>
                                                    <th scope="col">DOB</th>
                                                    <th scope="col">GENDER</th>
                                                    <th scope="col">ADDRESS</th>
                                                    <th scope="col">STATE</th>
                                                    <th scope="col">PINCODE</th>
                                                    <th scope="col">CITY</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td><img src='Photos/" . $row['Photo'] . "' width='50' height='50'></td>";
                                                    echo "<td>" . $row['Patients_Id'] . "</td>";
                                                    echo "<td>" . $row['Pname'] . "</td>";
                                                    echo "<td>" . $row['PFname'] . "</td>";
                                                    echo "<td>" . $row['Allergies'] . "</td>";
                                                    echo "<td>" . $row['Email'] . "</td>";
                                                    echo "<td>" . $row['Aadhaar'] . "</td>";
                                                    echo "<td>" . $row['Phone'] . "</td>";
                                                    echo "<td>" . $row['DOB'] . "</td>";
                                                    echo "<td>" . $row['Gender'] . "</td>";
                                                    echo "<td>" . $row['Address'] . "</td>";
                                                    echo "<td>" . $row['State'] . "</td>";
                                                    echo "<td>" . $row['Pincode'] . "</td>";
                                                    echo "<td>" . $row['City'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</body>

</html>