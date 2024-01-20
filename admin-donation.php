<?php
include 'connection.php';

$query = "select * from donation";
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
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function searchDonations() {
        var searchTerm = $('#searchInput').val();

        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: {
                searchTerm: searchTerm
            },
            success: function(response) {
                $('tbody').html(response);
            }
        });
    }
</script>

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
                                            <h2 class="display-6 text-center">Donation Details</h2>
                                        </div>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0 text-center">
                                                <thead style="background-color: #201823; color:#f5f7fa;">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>PHONE</th>
                                                        <th>TRANSECTION CARD NUMBER</th>
                                                        <th>AMOUNT</th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td><?php echo $row['Donater_Id'] ?></td>
                                                            <td><?php echo $row['Donater_Name'] ?></td>
                                                            <td><?php echo $row['Donater_Email'] ?></td>
                                                            <td><?php echo $row['Donater_Phone'] ?></td>
                                                            <td><?php echo $row['Card_Number'] ?></td>
                                                            <td><?php echo $row['Amount'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['Donation_Status'] == 1) {
                                                                    echo "Successful";
                                                                } else {
                                                                    echo "Pending";
                                                                }
                                                                ?>
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





</body>

</html>