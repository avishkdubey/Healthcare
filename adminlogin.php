<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php include "connection.php"; ?>
  <link rel="stylesheet" href="\ngo\adminlogin.css?v=<?php echo time(); ?>">

  <style>
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

    footer p {
      font-size: 16px;
      line-height: 1.5;
    }
  </style>
  <?php
  // connect to database
  include 'connection.php';
  session_start(); // start session

  if (isset($_SESSION['Staff_Id'])) { // if session already exists, redirect to admin dashboard
    header("location: admindashboard.php");
    exit();
  }

  // if login form is submitted
  if (isset($_POST['login'])) {
    // retrieve form data
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['pass']));

    // query to retrieve staff data with provided email and password
    $query = mysqli_query($con, "SELECT * FROM staff WHERE Email='$email' AND Password='$password' LIMIT 1");
    $count = mysqli_num_rows($query);

    if ($count > 0) { // if staff exists with provided credentials
      $row = mysqli_fetch_assoc($query);
      if ($row["Status"] == 0) {
  ?>
        <script>
          alert("Please verify email account before login.");
        </script>
      <?php
      } else {
        $_SESSION['Staff_Id'] = $row['Staff_Id']; // create session for staff
        $_SESSION['Designation'] = $row['Designation'];
      ?>
        <script>
          location.replace("admindashboard.php?adminid=<?php echo $_SESSION['Staff_Id'] ?> ");
        </script>
      <?php
        exit();
      }
    } else { // if staff doesn't exist with provided credentials
      ?>
      <script>
        alert("Email or password invalid, please try again.");
      </script>
  <?php
    }
    mysqli_close($con); // close database connection
  }
  ?>

</head>

<body>
  <div class="fullcontainer banner" id="homesection">
    <header>
      <nav class="navbar navbar-expand-lg" style="background-color:rgba(64, 44, 0, 0.4);">
        <div class="container-fluid">
          <a href="#" class="navbar-brand text-white" style="font-weight: bold;font-size: 1.5rem;"><img src="Images\logo.png" alt="" height="60" width="60">HEALTHCARE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section class="h-100 bg-light border-bottom border-dark ">
      <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="Images/team-2045765.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:550px;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                      <div class="d-flex align-items-center p-0 mt-0 mb-3 pb-1">
                        <ion-icon name="log-in-outline" style="height: 80px; width:80px;"></ion-icon>
                        <span class="h1 fw-bold mb-0">Staff Login</span>
                      </div>


                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                      <div class="form-outline mb-4">
                        <input type="email" value="" name="email" class="form-control form-control-lg" required />
                        <label class="form-label" for="form2Example17">Email address</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" name="pass" class="form-control form-control-lg" value="" required />
                        <label class="form-label" for="form2Example27">Password</label>
                      </div>


                      <div class="pt-1 mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" value="Login">Login</button>
                      </div>

                      <a class="small text-muted" id="forgot" href="recover-admin-pass.php">Forgot password?</a>
                      <a href="#!" class="small text-muted">Terms of use.</a>
                      <a href="#!" class="small text-muted">Privacy policy</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer style="background-color:#E8D4BB;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">&copy; 2023 HEALTHCARE. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
</body>

</html>