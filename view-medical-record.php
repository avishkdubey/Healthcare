<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
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

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input {
            width: 200px;
            padding: 5px;
        }

        .search-form button {
            padding: 5px 10px;
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
    <?php
    // Include the database connection file
    include 'connection.php';
    ?>

    <div class="container m-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); height:90vh; overflow-y:scroll;">
        <div class="row">
            <h1>Your Patient's Medical Records</h1>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Patient Id</th>
                    <th>Patient Name</th>
                    <th>Patient Email</th>
                    <th>Patient Phone</th>
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Prescription</th>
                    <th>Instruction</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch the appointment data from the database
                $query = "SELECT * FROM medical_records";
                $result = mysqli_query($con, $query);

                // Check if the query executed successfully
                if (!$result) {
                    die("Error: " . mysqli_error($con));
                }

                // Loop through the appointments and display them in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    $patientId = $row['Patients_Id'];
                    $doctorId = $row['Doctor_Id'];
                    // Fetch patient details
                    $patientQuery = "SELECT * FROM patients,medical_records WHERE patients.Patients_Id = medical_records.Patients_Id";
                    $patientResult = mysqli_query($con, $patientQuery);

                    // Check if the patient query executed successfully
                    if (!$patientResult) {
                        die("Error: " . mysqli_error($con));
                    }

                    $patientRow = mysqli_fetch_assoc($patientResult);

                    // Fetch doctor details
                    $doctorQuery = "SELECT * FROM doctor WHERE Doctor_Id = '$doctorId'";
                    $doctorResult = mysqli_query($con, $doctorQuery);

                    // Check if the doctor query executed successfully
                    if (!$doctorResult) {
                        die("Error: " . mysqli_error($con));
                    }

                    $doctorRow = mysqli_fetch_assoc($doctorResult);

                    echo "<tr>";
                    echo "<td>" . $row['Patients_Id'] . "</td>";
                    echo "<td>" . $patientRow['Pname'] . "</td>";
                    echo "<td>" . $patientRow['Email'] . "</td>";
                    echo "<td>" . $patientRow['Phone'] . "</td>";
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>