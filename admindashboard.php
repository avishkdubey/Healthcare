<?php
session_start();
if (!isset($_SESSION['Staff_Id'])) {
  header('location: adminlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="admin.css?v=<?php echo time() ?>" />
  <title>Staff Dashboard</title>
  <?php
  include "connection.php";
  $sel = "SELECT * FROM staff ";
  $que = mysqli_query($con, $sel) or die('hatbe');
  mysqli_num_rows($que) > 0; {
    $fetch = mysqli_fetch_assoc($que);
  }
  ?>
</head>

<body id="body">
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <a class="active" style="color:white; text-decoration:none;" href="#">Home</a>
      </div>
      <div class="navbar__right">
        <?php
        $login_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM staff WHERE Staff_Id = '$_SESSION[Staff_Id]'"))
        ?>
        <div class="profile">
          <a href="#">
            <img style="border-radius: 100%; display: inline-block; width: 50px; height: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" data-bs-toogle="dropdown" src="<?php echo "Photos/" . $login_row['Photo']; ?>" alt="" />
          </a>
          <div class="profile-dropdown-content" style="min-width: 200px; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-0.5px, 39.5px, 0px);">
            <a class="link" href="staff-profile.php" style="color:black; text-decoration:none;"><i class="fa fa-duotone fa-user" style="--fa-primary-color: #000000; --fa-secondary-color: #000000;"></i>&nbsp Profile</a><br><br>
            <hr>
            <br>
            <a href="adminlogout.php" style="color:black; text-decoration:none;"><i class=" fa fa-thin fa-right-from-bracket" style="color: #000000;"></i></i>&nbsp Logout </a>
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

            <h1>Hello <?= $login_row['Sname']; ?></h1>
            <p><?= strtoupper($login_row['Designation']); ?></p><br>
            <p>Welcome to your dashboard</p>
          </div>
        </div>
        <div class="main__cards">
          <div class="card">
            <i class="fa fa-solid fa-user fa-2xl" style="color: #000000;"></i>
            <div class="card_inner">
              <p class="text-primary-p">Number of Staff</p>
              <span class="font-bold text-title">
                <?php
                echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM staff"));
                ?>
              </span>
            </div>
          </div>

          <div class="card">
            <i class="fa fa-thin fa-user-doctor fa-2xl" style="color: #000000;"></i>
            <div class="card_inner">
              <p class="text-primary-p">Number of Doctors</p>
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
              <p class="text-primary-p">Number of Petients</p>
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
        <?php if (($login_row['Designation'] == 'executive-director') or ($login_row['Designation'] == 'administrative-staff')) { ?>
          <div class="sidebar__link dropdown">
            <i class="fa fa-user-secret" aria-hidden="true" style="color: #000000;"></i>
            <a class="dropdown" style="color: #00040a;">Staff</a>
            <div class="dropdown-content">
              <a href="staffregistration.php" style="color:black; text-decoration:none;"><i class="fa fa-thin fa-address-book" style="color: #000000;"></i>&nbsp Register Staff</a><br><br>
              <a href="stafflist.php" style="color:black; text-decoration:none;"><i class="fa fa-solid fa-eye" style="color: #000000;"></i>&nbsp View Staff</a>
            </div>
          </div>
        <?php } ?>

        <div class="sidebar__link">
          <i class="fa fa-thin fa-stethoscope fa-2xl" style="color: #000000;"></i>
          <a href="doctorslist.php" style="color: white;">Doctor's</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-light fa-person-half-dress fa-2xl" style="color: #00040a;"></i>
          <a href="patient_list.php" style="color: #00040a;">Patient's</a>
        </div>
        <h2>Visit</h2>
        <?php if (($login_row['Designation'] == 'executive-director')) { ?>
          <div class="sidebar__link">
            <i class="fa fa-sharp fa-light fa-money-check-dollar fa-2xl" style="color: #000000;"></i>
            <a href="admin-donation.php" style="color: white;">Donation</a>
          </div>
        <?php } ?>
        <div class="sidebar__link">
          <i class="fa fa-thin fa-receipt fa-2xl" style="color: #000000;"></i>
          <a href="view-all-appointment.php" style="color: #00040a;">Appointment's</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-thin fa-house-medical fa-2xl" style="color: #000000;"></i>
          <a href="view-all-medicalrecords.php" style="color: white;">Medical Record</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-thin fa-house-medical fa-2xl" style="color: #000000;"></i>
          <a href="insert-camp.php" style="color: #000000;">Camp's</a>
        </div>

      </div>
      <div class="row" style="margin-top:162px;">
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