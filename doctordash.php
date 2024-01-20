<?php
session_start();
if (!isset($_SESSION['Doctor_Id'])) {
  header('location: doctorlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="doctor.css?v=<?php echo time() ?>" />
  <title>Staff Dashboard</title>
  <?php
  include "connection.php";
  $sel = "SELECT * FROM doctor ";
  $que = mysqli_query($con, $sel) or die('hatbe');
  mysqli_num_rows($que) > 0; {
    $fetch = mysqli_fetch_assoc($que);
  }
  ?>
  <style>
    .banner {
      min-height: 100%;
      width: auto;
      background-image: url("Images/pexels-karolina-grabowska-4386495.jpg");
      background-size: 100%;
      background-attachment: auto;

    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      background-color: #e8d4bb;
      display: none;
      position: absolute;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 12px 16px;
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body id="body">
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <a class="active" style="color:white; text-decoration:none;" href="doctordash.php">Home</a>
      </div>
      <div class="navbar__right">
        <?php
        $login_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM doctor WHERE Doctor_Id = '$_SESSION[Doctor_Id]'"))
        ?>
        <div class="profile">
          <a href="#">
            <img style="border-radius: 100%; display: inline-block; width: 50px; height: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" data-bs-toogle="dropdown" src="<?php echo "Photos/" . $login_row['Photo']; ?>" alt="" />
          </a>
          <div class="profile-dropdown-content" style="min-width: 200px; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-0.5px, 39.5px, 0px);">
            <a class="link" href="doctor-profile.php" style="color:black; text-decoration:none;"><i class="fa fa-duotone fa-user" style="--fa-primary-color: #000000; --fa-secondary-color: #000000;"></i>&nbsp Profile</a><br><br>
            <hr>
            <br>
            <a href="doctor_logout.php" style="color:black; text-decoration:none;"><i class=" fa fa-thin fa-right-from-bracket" style="color: #000000;"></i></i>&nbsp Logout </a>
          </div>
        </div>
      </div>

    </nav>

    <main class="banner">
      <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
          <img src="Images\result.png" alt="" />
          <div class="main__greeting">

            <h1>Hello Dr. <?= $login_row['Dname']; ?></h1>
            <p><?= strtoupper($login_row['Medical_Specialization']); ?></p><br>
            <p>Welcome to your dashboard</p>
          </div>
        </div>
        <div class="main__cards">


          <div class="card">
            <i class="fa fa-thin fa-user-doctor fa-2xl" style="color: #000000;"></i>
            <div class="card_inner">
              <p class="text-primary-p">Number of Doctors With Us</p>
              <span class="font-bold text-title">
                <?php
                echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM doctor"));
                ?>
              </span>
            </div>
          </div>

          <div class="card">
            <i class="fa fa-light fa-person-half-dress fa-2xl" style="color: #00040a;"></i>
            <div class="card_inner">
              <p class="text-primary-p">Number of Petient's With Us</p>
              <span class="font-bold text-title">
                <?php
                echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM patients"));
                ?>
              </span>
            </div>
          </div>

        </div>

    </main>

    <div id="sidebar">
      <div class="sidebar__title">
        <div class="sidebar__img">
          <img src="images\logo.png" alt="logo" />
          <h1>HEALTHCARE</h1>
        </div>
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
      </div>

      <div class="sidebar__menu">
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-home"></i>
          <a href="#">Dashboard</a>
        </div>
        <h2>MNG</h2>
        <div class="sidebar__link">
          <i class="fa fa-light fa-person-half-dress fa-2xl" style="color: #00040a;"></i>
          <a href="doc-patient-list.php" style="color: #00040a;">My Patient's</a>
        </div>
        <h2>Visit</h2>
        <div class="sidebar__link">
          <i class="fa fa-thin fa-receipt fa-2xl" style="color: #000000;"></i>
          <a href="see_appointments.php" style="color: white;">Appointment With Patient's</a>
        </div>
        <div class="sidebar__link dropdown">
          <i class="fa fa-thin fa-house-medical fa-2xl" style="color: #000000;"></i>
          <a class="dropdown" style="color: black;">Medical Record</a>
          <div class="dropdown-content">
            <a href="insert_medicalrecord.php" style="color:black; text-decoration:none;"><i class="fa fa-thin fa-address-book" style="color: #000000;"></i>&nbsp Add Record</a><br><br>
            <a href="view-medical-record.php" style="color:black; text-decoration:none;"><i class="fa fa-solid fa-eye" style="color: #000000;"></i>&nbsp View Record</a>
          </div>
        </div>
        <!-- <div class="sidebar__link">
          <i class="fa fa-thin fa-house-medical fa-2xl" style="color: #000000;"></i>
          <a href="" style="color: white;">Camp's</a>
        </div> -->


      </div>
      <div class="row" style="margin-top:330px;">
        <div class="col-md-12">
          <p class="text-center">&copy; 2023 HEALTHCARE.</p>
        </div>
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="admin.js"></script>


</body>

</html>