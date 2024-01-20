<!DOCTYPE html>
<html>

<head>
    <title>Donation Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="loader.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>


    <style>
        .carousel-item img {
            width: 500px;
            height: 200px;
            object-fit: cover;
        }

        body {
            height: 100vh;
            justify-content: center;
            align-items: center;
            display: flex;
            background-color: #eee
        }

        .launch {
            height: 50px;
        }

        .close {
            font-size: 21px;
            cursor: pointer;
        }

        .modal-body {
            height: 650px
        }

        .nav-tabs {
            border: none !important
        }

        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #ffffff #ffffff #fff;
            border-top: 3px solid blue !important
        }

        .nav-tabs .nav-link {
            margin-bottom: -1px;
            border: 1px solid transparent;
            border-top-left-radius: 0rem;
            border-top-right-radius: 0rem;
            border-top: 3px solid #eee;
            font-size: 20px
        }

        .nav-tabs .nav-link:hover {
            border-color: #e9ecef #ffffff #ffffff
        }

        .nav-tabs {
            display: table !important;
            width: 100%
        }

        .nav-item {
            display: table-cell
        }

        .form-control {
            border-bottom: 1px solid #eee !important;
            border: none;
            font-weight: 600
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #8bbafe;
            outline: 0;
            box-shadow: none
        }

        .inputbox {
            position: relative;
            margin-bottom: 20px;
            width: 100%
        }

        .inputbox span {
            position: absolute;
            top: 7px;
            left: 11px;
            transition: 0.5s
        }

        .inputbox i {
            position: absolute;
            top: 13px;
            right: 8px;
            transition: 0.5s;
            color: #3F51B5
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0
        }

        .inputbox input:focus~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .inputbox input:valid~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .pay button {
            height: 47px;
            border-radius: 37px
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .banner {
            min-height: 100vh;
            width: 100%;
            background-image: url("Images/fabian-blank-pElSkGRA2NU-unsplash.jpg") !important;
            background-size: 100%;
            background-attachment: auto;
        }

        .warning-message {
            color: red;
            margin-top: 5px;
        }

        #br {
            border: 1px solid black;
            padding: 10px;
            border-style: double;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>

<body class="banner">
    <div class="loader loader-double"></div>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color:rgba(64, 44, 0, 0.4);">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-white"><img src="Images\logo.png" alt="" height="60" width="60">HEALTHCARE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

    </header>

    <div class="container py-5" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner" id="slide">
                        <div class="carousel-item active">
                            <img id="br" src="Images\larm-rmah-AEaTUnvneik-unsplash.jpg" alt="NGO 1" style="height: 600px; width:500px;">
                        </div>
                        <div class="carousel-item">
                            <img id="br" src="Images\ambap-medicalcamp-1024x682.jpeg" alt="NGO 2" style="height: 600px; width:500px;">
                        </div>
                        <div class="carousel-item">
                            <img id="br" src="Images\80c0cf10cd796561bf728f699106cdf4.jpg" alt="NGO 3" style="height: 600px; width:500px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <h2>Make a Donation <div class="text-right"> <a href="index.php" style="text-decoration: none;"><i class="fa fa-close close" data-dismiss="modal"></i></a> </div>
                </h2><br>
                <hr>
                <center> <button id="b1" type="submit" value="submit" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-donate"></i> Donate <i class="fas fa-donate"></i>
                    </button>
                </center>
                <hr>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                        <div class="tabs mt-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation"> <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true"> <img src="https://i.imgur.com/sB4jftM.png" width="80"> </a> </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                                    <div class="mt-4 mx-4">
                                        <div class="text-center">
                                            <h5>Credit card</h5>
                                        </div>
                                        <form action="process-donation.php" method="post" id="donation_form">
                                            <div class="mt-3">
                                                <div class="inputbox">
                                                    <input type="text" name="name" id="cname" pattern="[A-Za-z ]+" class="form-control" required>
                                                    <span>Cardholder Name</span>
                                                    <div class="warning-message" id="cname-warning"></div>
                                                </div>
                                                <div class="inputbox">
                                                    <input type="email" name="email" id="email" class="form-control" required>
                                                    <span>Email</span>
                                                    <div class="warning-message" id="email-warning"></div>
                                                </div>
                                                <div class="inputbox">
                                                    <input type="number" id="tel" pattern="[1-9]{1}[0-9]{9}" title="Please enter exactly 10 digits" maxlength="10" name="mnumber" class="form-control" required>
                                                    <span>Contact Number</span>
                                                    <div class="warning-message" id="tel-warning"></div>
                                                </div>
                                                <div class="inputbox">
                                                    <input type="number" name="cnumber" minlength="14" maxlength="14" class="form-control" required oninput="validateCardNumber(this)">
                                                    <i class="fa fa-eye"></i>
                                                    <span>Card Number</span>
                                                    <div class="warning-message" id="cnumber-warning"></div>
                                                </div>
                                                <div class="d-flex flex-row">
                                                    <div class="inputbox">
                                                        <input type="text" name="expire" id="expire" class="form-control" required="required" oninput="formatExpirationDate(this)">
                                                        <span>Exp. Date (MM/YY)</span>
                                                        <div class="warning-message" id="expire-warning"></div>
                                                    </div>
                                                    <div class="inputbox">
                                                        <input type="text" name="cvv" class="form-control" minlength="3" maxlength="3" pattern="[0-9]+" required>
                                                        <span>CVV</span>
                                                        <div class="warning-message" id="cvv-warning"></div>
                                                    </div>
                                                </div>
                                                <div class="inputbox">
                                                    <input type="number" id="amt" name="amt" min="100" class="form-control" pattern="[0-9]+" required>
                                                    <i class="fa fa-money"></i>
                                                    <span>Amount ($)</span>
                                                    <div class="warning-message" id="amt-warning"></div>
                                                </div>
                                                <div class="px-5 pay">
                                                    <button type="submit" value="submit" name="submit" class="btn btn-success btn-block">Make a payment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function formatExpirationDate(input) {
                var value = input.value.replace(/\D/g, '');
                var month = value.slice(0, 2);
                var year = value.slice(2, 4);

                input.value = month + (month.length === 2 ? '/' : '') + year;
            }

            function validateCardNumber(input) {
                var value = input.value.replace(/\D/g, '');
                if (value.length > 16) {
                    input.value = value.slice(0, 16);
                }
            }
        </script>
        <script>
            function validateCardNumber(input) {
                var value = input.value.replace(/\D/g, '');
                if (value.length > 16) {
                    input.value = value.slice(0, 16);
                }
                showWarningMessage('cnumber-warning', value.length !== 16, 'Please enter a valid card number');
            }

            function formatExpirationDate(input) {
                var value = input.value.replace(/\D/g, '');
                if (value.length > 4) {
                    input.value = value.slice(0, 4);
                }
                var formattedValue = value.replace(/(\d{2})(\d{2})/, '$1/$2');
                input.value = formattedValue;
                showWarningMessage('expire-warning', formattedValue.length !== 5, 'Please enter a valid expiration date (MM/YY)');
            }

            function showWarningMessage(elementId, condition, message) {
                var warningElement = document.getElementById(elementId);
                if (condition) {
                    warningElement.innerText = message;
                    warningElement.style.display = 'block';
                } else {
                    warningElement.innerText = '';
                    warningElement.style.display = 'none';
                }
            }


            $(document).on('submit', '#donation_form', function(e) {
                e.preventDefault();
                $('.loader').addClass('is-active');
                $.ajax({
                    url: 'process-donation.php',
                    type: 'post',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.loader').removeClass('is-active');
                        if (response === '1') {
                            alert('Donation Successful, Confirmation mail has been sent to your mail id');
                            $('#staticBackdrop').modal('hide');
                            $('#donation_form')[0].reset();
                        } else if (response === '2') {
                            alert('Invalid name format');
                        } else if (response === '3') {
                            alert('Invalid card number length');
                        } else if (response === '4') {
                            alert('Invalid expiration date');
                        } else if (response === '5') {
                            alert('Error');
                        }
                    },
                    error: function() {
                        $('.loader').removeClass('is-active');
                        alert('An error occurred during the donation process');
                    }
                });
            });
        </script>


</body>

</html>