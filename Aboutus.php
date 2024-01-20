<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Healthcare</title>
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }



        .banner {
            min-height: auto;
            width: auto;
            background-image: url("Images/kaboompics_yellow-stethoscope-and-pills-on-yellow-background-17836.jpg");
            background-size: 100%;
            background-attachment: auto;
        }


        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
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
        .box-2{
            background-color: #E8D4BB;
        }
        .box-3{
            background-color: #aa7100;
        }
    </style>
</head>

<body>
    <div class="fullcontainer banner">
        <!-- Navigation Bar -->
        <header>
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color:rgba(64, 44, 0, 0.4);">
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
                                <a class="nav-link text-white" href="#">Abous Us</a>
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
        <div class="box-1">
            <div class="container py-5">
                <div class="row h-100 align-items-center py-5">
                    <div class="col-lg-6">
                        <h1 class="display-4">We Are NGO Named HEALTHCARE</h1>
                        <p class="lead text-muted text-white mb-0">At Healthcare, we are committed to providing access to quality healthcare to individuals and communities in need. Our organization is driven by the belief that everyone should have the right to receive adequate medical attention, regardless of their economic or social status.</p>
                        
                    </div>
                    <div class="col-lg-6 d-none d-lg-block"><img src="Images\professionals-6839006.png" alt="" class="img-fluid"></div>
                </div>
            </div>
        </div>

        <div class="bg-light py-5">
            <div class="container py-5">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><img style="width: 100px;" src="Images/target.png" alt="">
                        <h2 class="font-weight-light">Our Mission</h2>
                        <p class="font-italic text-muted mb-4">To improve the health and well-being of underserved communities through advocacy, education, and healthcare services.</p>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="Images/researcher-looking-monitor-analysing-brain-scan-while-coworker-discussing-with-patient-background-about-side-effects-mind-functions-nervous-system-tomography-scan-working-laboratory.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto"><img src="Images/pexels-karolina-grabowska-4386495.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><img style="width: 100px;" src="Images/doctor-497234685.png" alt="">
                        <h2 class="font-weight-light">Thanks To Our Ninja Doctor's</h2>
                        <p class="font-italic text-muted mb-4">Thanks to Healthcare Doctor's team who always kept fighting for the people's and needies life..</p>
                    </div>
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