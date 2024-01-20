<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        body {
            background-color: #f8f8f8;
        }

        .container {
            max-width: auto;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .banner {
            min-height: auto;
            width: auto;
            background-image: url("Images/man-1351346.png");
            background-size: 100%;
            background-attachment: auto;
        }
    </style>
</head>

<body class="banner">
    <center>
        <div class="container m-5" style="overflow: scroll; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); height:90vh;">
            <div class="row">
                <div class="col-md-10">
                    <h1>Medical Records</h1>
                </div>
                <div class="col-md-2">
                    <a href="admindashboard.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></a>
                </div>
            </div>
            <table id="medicalRecordsTable">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Patient Phone</th>
                        <th>Doctor Name</th>
                        <th>Doctor Email</th>
                        <th>Doctor Phone</th>
                        <th>Medical Record</th>
                        <th>Diagnosis</th>
                        <th>Treatment</th>
                        <th>Prescription</th>
                        <th>FollowUp Instructions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Include the database connection file
                    include 'connection.php';

                    // Fetch the appointment data from the database
                    $query = "SELECT * FROM medical_records";
            
                    $result = mysqli_query($con, $query);

                    // Loop through the appointments and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        $patientId = $row['Patients_Id'];
                        $doctorId = $row['Doctor_Id'];

                        // Fetch patient details
                        $patientQuery = "SELECT * FROM patients WHERE Patients_Id = '$patientId'";
                        $patientResult = mysqli_query($con,                    $patientQuery);
                        $patientRow = mysqli_fetch_assoc($patientResult);

                        // Fetch doctor details
                        $doctorQuery = "SELECT * FROM doctor WHERE Doctor_Id = '$doctorId' LIMIT 1";
                        $doctorResult = mysqli_query($con, $doctorQuery);
                        $doctorRow = mysqli_fetch_assoc($doctorResult);

                        echo "<tr>";
                        echo "<td>" . $patientRow['Pname'] . "</td>";
                        echo "<td>" . $patientRow['Email'] . "</td>";
                        echo "<td>" . $patientRow['Phone'] . "</td>";
                        echo "<td>Dr. " . $doctorRow['Dname'] . "</td>";
                        echo "<td>" . $doctorRow['Email'] . "</td>";
                        echo "<td>" . $doctorRow['Phone'] . "</td>";
                        echo "<td>=></td>";
                        echo "<td>" . $row['Diagnosis'] . "</td>";
                        echo "<td>" . $row['Treatment'] . "</td>";
                        echo "<td>" . $row['Prescription'] . "</td>";
                        echo "<td>" . $row['Instruction'] . "</td>";
                        echo "</tr>";
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
    </center>

</body>

</html>