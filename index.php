<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" , initial-scale="1.0" />
  <title>Health Care</title>
  <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css?v=<?php echo time() ?>">
  <style>
    #donate {
      margin-left: 650px;
    }
  </style>
</head>

<body>

  <div class="fullcontainer banner" id="homesection">
    <header>
      <nav class="navbar navbar-expand-lg" style="background-color: rgba(64, 44, 0, 0.4);">
        <div class="container-fluid">
          <a href="#" class="navbar-brand text-white" style="font-weight: bold; font-size: 1.5rem;"><img src="Images\logo.png" alt="" height="60" width="60">HEALTHCARE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="Aboutus.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="team.php">Our Team</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="adminlogin.php">Staff Login</a></li>
                  <li><a class="dropdown-item" href="doctorlogin.php">Doctor Login</a></li>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a id="donate" href="donation.php" class="btn btn-white btn-animate">SUPPORT A CAUSE AND <br> DONATE</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
    </header>


    <div class="fullcontainer">
      <div class="row">
        <div class="col">
          <h1>A world where<span>everyone has access</span></h1>
          <p>to quality healthcare, regardless of their socio-economic background.</p>
        </div>

      </div>
    </div>
    <div class="col-lg-6">
      <img style="width: 350px;" src="Images\doctor-5180142.png" alt="">
    </div>
  </div>
  <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> -->
  <div style="background: rgb(234,201,104); background: linear-gradient(180deg, rgba(234,201,104,1) 0%, rgba(234,201,104,1) 35%, rgba(234,201,104,0) 100%);">
    <center>
      <img style="width:50vh; margin-top:50px; margin-bottom:-48px;" src="Images/Lovepik_com-450101221-A trendy conceptual icon of medical camp.png" alt="">
    </center>
  </div>
  <section class="medical-camp">
    <div class="container">
      <div class="alert alert-danger m-5" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);border: 0;">
        <h2 style="color:red;"><b>*Upcoming Medical Camps*</b></h2>
        <p style="color:red;">Don't miss out! Join our upcoming medical camps. <small style="color:darkred;">**Make sure to carry your ID card at Camp's**</small> </p>
        <div class="m-5" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);border: 0;">
          <table class="table table-striped mb-0 text-center" style="height: 20vh; overflow-y:scroll; ">
            <?php
            include 'connection.php';

            $currentDate = date("Y-m-d");

            $query = "SELECT camps.Date, camps.From_Time, camps.To_Time, camps.Place, doctor.Dname 
                              FROM camps  
                              JOIN doctor ON camps.Doctors = doctor.Doctor_Id
                              WHERE camps.Date >= '$currentDate'"; // Filter by date

            $result = mysqli_query($con, $query);

            if ($result) {
              if (mysqli_num_rows($result) > 0) {
            ?>
                <thead style="background-color: #201823; color: #f5f7fa;">
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Place</th>
                    <th>Doctors</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['Date']; ?></td>
                      <td><?php echo $row['From_Time'] . ' - ' . $row['To_Time']; ?></td>
                      <td><?php echo $row['Place']; ?></td>
                      <td>Dr. <?php echo $row['Dname']; ?></td>
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
                    <td colspan="4">No camp details found</td>
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





  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img style="width: 350px;" src="Images\doctor-497236666.png" alt="">
      </div>
      <div class="col-lg-6">
        <br>
        <h1 style="font-family: 'Kalam', cursive; font-size:70px;">Wanna Join / Login As A Patient....<br><a href="Patientlogin.php" style="text-decoration:none;"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Click Me</a></h1>
      </div>
    </div>
  </div>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>