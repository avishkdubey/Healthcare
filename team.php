<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Dashboard</title>
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-footer button {
            margin-right: 0.5rem;
        }

        .banner {
            min-height: auto;
            width: auto;
            background-image: url("Images/kaboompics_yellow-stethoscope-and-pills-on-yellow-background-17836.jpg");
            background-size: 100%;
            background-attachment: auto;
        }

        .row.heading h2 {
            color: #fff;
            font-size: 52.52px;
            line-height: 95px;
            font-weight: 400;
            text-align: center;
            margin: 0 0 40px;
            padding-bottom: 20px;
            text-transform: uppercase;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .heading.heading-icon {
            display: block;
        }

        .padding-lg {
            display: block;
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .practice-area.padding-lg {
            padding-bottom: 55px;
            padding-top: 55px;
        }

        .practice-area .inner {
            border: 1px solid #999999;
            text-align: center;
            margin-bottom: 28px;
            padding: 40px 25px;
        }

        .our-webcoderskull .cnt-block:hover {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border: 0;
        }

        .practice-area .inner h3 {
            color: #3c3c3c;
            font-size: 24px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            padding: 10px 0;
        }

        .practice-area .inner p {
            font-size: 14px;
            line-height: 22px;
            font-weight: 400;
        }

        .practice-area .inner img {
            display: inline-block;
        }


        

        .our-webcoderskull .cnt-block {
            float: left;
            width: 100%;
            background: #fff;
            padding: 30px 20px;
            text-align: center;
            border: 2px solid #d5d5d5;
            margin: 0 0 28px;
        }

        .our-webcoderskull .cnt-block figure {
            width: 148px;
            height: 148px;
            border-radius: 100%;
            display: inline-block;
            margin-bottom: 15px;
        }

        .our-webcoderskull .cnt-block img {
            width: 148px;
            height: 148px;
            border-radius: 100%;
        }

        .our-webcoderskull .cnt-block h3 {
            color: #2a2a2a;
            font-size: 20px;
            font-weight: 500;
            padding: 6px 0;
            text-transform: uppercase;
        }

        .our-webcoderskull .cnt-block h3 a {
            text-decoration: none;
            color: #2a2a2a;
        }

        .our-webcoderskull .cnt-block h3 a:hover {
            color: #337ab7;
        }

        .our-webcoderskull .cnt-block p {
            color: #2a2a2a;
            font-size: 13px;
            line-height: 20px;
            font-weight: 400;
        }

        .our-webcoderskull .cnt-block .follow-us {
            margin: 20px 0 0;
        }

        .our-webcoderskull .cnt-block .follow-us li {
            display: inline-block;
            width: auto;
            margin: 0 5px;
        }

        .our-webcoderskull .cnt-block .follow-us li .fa {
            font-size: 24px;
            color: #767676;
        }

        .our-webcoderskull .cnt-block .follow-us li .fa:hover {
            color: #025a8e;
        }


        footer {
            background-color: #f8f9fa;
            padding: 50px 0;
            color: #333;
        }

        footer h5 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        footer p {
            font-size: 16px;
            line-height: 1.5;
        }

        footer ul {
            padding: 0;
            list-style: none;
            margin-bottom: 20px;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul.social-media li {
            display: inline-block;
            margin-right: 10px;
        }

        footer ul.social-media li a {
            font-size: 20px;
            color: #333;
            transition: all 0.3s ease;
        }

        footer ul.social-media li a:hover {
            color: #007bff;
        }

        footer ul.contact-info li i {
            margin-right: 10px;
            color: #007bff;
        }

        footer form {
            margin-top: 20px;
        }

        footer form .form-group {
            margin-bottom: 10px;
        }

        footer form input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: none;
            background-color: #fff;
        }

        footer form button[type="submit"] {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="fullcontainer banner">
        <!-- Navigation Bar -->
        <header>
      <nav class="navbar navbar-expand-lg" style="background-color:rgba(64, 44, 0, 0.4);">
        <div class="container-fluid">
          <a href="#" class="navbar-brand text-white"><img src="Images\logo.png" alt="" height="60" width="60">HEALTHCARE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav justify-content-center ml-auto">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="Aboutus.php">Abous Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="team.php">Our Team</a>
              </li>
              <li class="nav-item dropdown">
                
              </li>
            </ul>
          </div>
        </div>
      </nav>

    </header>
        <section class="our-webcoderskull padding-lg">
            <div class="container">
                <div class="row heading heading-icon">
                    <h2 style="margin-left:280px;">Our Team</h2>
                </div>
                <ul class="row">
                    <li class="col-12 col-md-6 col-lg-3 p-1">
                    <img style="width: 300px;" src="Images\doctor-497234685.png" alt="">
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="Images/Avishk1-removebg.png" class="img-responsive" alt=""></figure>
                            <h3><a href="#">Abhishek Dubey </a></h3>
                            <p>Programmer / Database Specialist</p>
                            <ul class="follow-us clearfix">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive" alt=""></figure>
                            <h3><a>Ritu Rajput</a></h3>
                            <p>System Analyst</p>
                            <ul class="follow-us clearfix">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="Images/316A8572-removebg-preview.png" class="img-responsive" alt=""></figure>
                            <h3><a>Abhishek Yadav</a></h3>
                            <p>Database Specialist</p>
                            <ul class="follow-us clearfix">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

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
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>