<?php
session_start();
if (!isset($_SESSION['Patients_Id'])) {
    header('location: patientlogin.php');
}
?>
<?php
include "connection.php";
$sel = "SELECT * FROM patients ";
$que = mysqli_query($con, $sel) or die('hatbe');
mysqli_num_rows($que) > 0; {
    $fetch = mysqli_fetch_assoc($que);
}
?>
<?php
$login_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM patients WHERE Patients_Id = '$_SESSION[Patients_Id]'"))
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare ID Card</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Balsamiq Sans', sans-serif;
        }

        .id-card {
            width: 3.5in;
            height: 2in;
            border: 1px solid #000;
            padding: 10px;
        }

        .id-card .logo {
            width: 50px;
            height: 50px;
        }

        .id-card .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .content p {
            font-size: 13px;
            margin: 0;
        }

        .id-card-back {
            width: 3.5in;
            height: 2in;
            margin-top: 50px;
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .id-card-back .barcode {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4">
                <div class="id-card" style="background-color:#DCE3E3; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);border: dashed;">
                    <div class="row">
                        <div class="col-sm">
                            <img src="images/logo.png" alt="Logo" class="logo">
                        </div>
                        <div class="col-sm content">
                            <h5 class="text-center"><strong>Healthcare</strong> NGO</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="content">
                        <div class="row">
                            <div class="col-sm">
                                <p><strong>Name:</strong> <?= $login_row['Pname']; ?></p>
                            </div>
                            <div>
                                <p style="margin-right: 32px;"><strong>Patient Id:</strong> <?= $login_row['Patients_Id']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <p><strong>Gender:</strong> <?= $login_row['Gender']; ?></p>
                            </div>
                            <div>
                                <p style="margin-right: 10px;"><strong>DOB:</strong> <?= $login_row['DOB']; ?></p>
                            </div>
                        </div>
                        <p><strong>Phone:</strong> <?= $login_row['Phone']; ?></p>
                        <p><strong>Address:</strong> <?= $login_row['Address']; ?></p>
                    </div>
                </div>
                <div class="id-card-back" style="background-color:#DCE3E3; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);border: dashed;">
                    <h5 class="text-center">HEALTHCARE</h5>
                    <div class="barcode">
                        
                        <img src="images/barcode.png" alt="Barcode" width="150px">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button onclick="downloadPDF()" class="btn btn-primary" name="button">Print</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!-- html2canvas library -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.querySelector('.id-card');
            html2canvas(element)
                .then((canvas) => {
                    const imgData = canvas.toDataURL('image/png');
                    const doc = new jsPDF();
                    doc.addImage(imgData, 'PNG', 10, 10, 0, 0);
                    doc.save('Healthcare_ID_Card.pdf');
                });
        }
    </script>
</body>

</html>