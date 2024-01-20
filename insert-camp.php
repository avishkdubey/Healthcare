<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Camp Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 500px;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            width: 100%;
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
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $timefrom = $_POST['timeFrom'];
        $timeto = $_POST['timeTo'];
        $doctor = $_POST['doctorId'];
        $place = $_POST['place'];

        // Get the current date
        $currentDate = date('Y-m-d');

        // Check if the submitted date is one day greater than the current date
        $nextDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        if ($date == $nextDate) {
            $insertquery = "INSERT INTO camps(Date, From_Time, Place, Doctors, To_Time) VALUES ('$date','$timefrom','$place','$doctor','$timeto')";

            $res = mysqli_query($con, $insertquery);
            if ($res) {
    ?>
                <script>
                    alert("Camp Scheduled Successfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Error");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Invalid date. Please insert a future date.");
            </script>
    <?php
        }
    }
    ?>


    <div class="container p-5" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);border: 0; background-color: aliceblue ; ">
        <div class="row">
            <div class="col-md-10">
                <h1>Add Camp Details</h1>
            </div>
            <div class="col-md-2">
                <a class="no-style m-5" href="admindashboard.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
            </div>

        </div>
        <form id="campForm" action="" method="POST">
            <div class="form-group">
                <label for="date">Date:</label>
                <input name="date" type="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="timeFrom">Time From:</label>
                <input name="timeFrom" type="time" id="timeFrom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="timeTo">Time To:</label>
                <input name="timeTo" type="time" id="timeTo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="doctor-select">Doctor:</label>
                <select name="doctorId" class="form-control" id="doctor-select" required>
                    <option value="">Select Doctor</option>
                    <?php
                    include 'connection.php';

                    $query = "SELECT * FROM doctor WHERE Status = 1"; // Modify the query to fetch doctors with Status 1
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $doctorId = $row['Doctor_Id'];
                        $doctorName = $row['Dname'];
                        $specialization = $row['Medical_Specialization'];
                        echo "<option value='$doctorId'>Dr. $doctorName, $specialization</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="place">Place:</label>
                <input name="place" type="text" id="place" class="form-control" required>
            </div>
            <button name="submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>
    </div>
</body>

</html>