<html lang="en">

<head>
    <title>Register Patient</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2200f2839c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="loader.css?v=<?php echo time(); ?>">
    <script src="cities.js"></script>
    <div class="loader loader-double"></div>


    <?php

    ?>
    <link rel="stylesheet" href="demo\agentform.css?v=<?php echo time(); ?>">
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
            margin-top: 1190px;
            color: #333;
        }
    </style>

<body>
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
                                <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Abous Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Our Team</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>


        <section class="h-100 bg-light border-bottom border-dark ">
            <div class="container py-5 h-100">
                <div class="row  d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="Images\injured-7084846.png" alt="Health Care" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height: 100%;" />
                                </div>
                                <div class="col-xl-6">
                                    <form action="" id="form">
                                        <input type="hidden" name="aadhaar_valid" required>
                                        <div class="card-body p-md-5 text-black">
                                            <h3 class="mb-5 text-uppercase">Petient registration form</h3>

                                            <div class="row">
                                                <div class="col mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" name="name" id="name" class="form-control form-control-lg" required oninput="allowOnlyAlphabets(event)" />
                                                        <label class="form-label" for="name">Name</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" name="fname" id="fname" class="form-control form-control-lg" required oninput="allowOnlyAlphabets(event)" />
                                                        <label class="form-label" for="fname">Father's Name</label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-outline mb-4">
                                                <input type="email" name="email" id="email" class="form-control form-control-lg" required />
                                                <label class="form-label" for="email">Email ID</label>
                                            </div>
                                            <div class="col-md-6 form-outline mb-4">
                                                <input type="password" name="password" id="pass" class="form-control form-control-lg" required />
                                                <label class="form-label" for="pass">Password</label>
                                            </div>
                                            <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                                <h6 class="mb-0 me-4">Gender: </h6>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" />
                                                    <label class="form-check-label" for="femaleGender">Female</label>
                                                </div>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" />
                                                    <label class="form-check-label" for="maleGender">Male</label>
                                                </div>

                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" />
                                                    <label class="form-check-label" for="otherGender">Other</label>
                                                </div>

                                            </div>


                                            <div class="form-outline mb-4">
                                                <input type="date" name="dob" id="dob" class="form-control form-control-lg" required />
                                                <label class="form-label" for="dob">DOB</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="adhaarNo" maxlength="12" name="adhaarNo" onkeyup="verify();" class="form-control form-control-lg" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" />
                                                        <label class="form-label" for="adhaarNo">Aadhaar Number</label><br>
                                                        <small class="alert-danger" id="message" style="color:red"></small><br>
                                                    </div>
                                                </div>
                                                <div class="form-outline">
                                                    <input type="text" name="allergies" id="allergies" class="form-control form-control-lg" required oninput="allowOnlyAlphabets(event)" />
                                                    <label class="form-label" for="allergies">Allergies</label>
                                                </div>

                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="text" name="address" id="address" class="form-control form-control-lg" required />
                                                <label class="form-label" for="address">Address</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <select id="sts" onchange="print_city('state', this.selectedIndex);" name="state" class="select form-control form-control-lg" required>
                                                    </select>
                                                    <label class="form-label" for="state">State</label>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <select id="state" name="city" class="select form-control form-control-lg" required>
                                                    </select>
                                                    <label class="form-label" for="city">City</label>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="text" maxlength="6" name="pincode" id="pincode" class="form-control form-control-lg" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" />
                                                <label class="form-label" for="pincode">Pincode</label>
                                            </div>

                                            <div class="col-md-6 form-outline mb-4">
                                                <input type="tel" id="tel" pattern="[1-9]{1}[0-9]{9}" title="Please enter exactly 10 digits" maxlength="10" name="mnumber" value="" class="form-control form-control-lg" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" />

                                                <label class="form-label" for="tel">Mobile Number</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <div class="col-md-6 mb-4">
                                                    <div id="preview"></div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <img id="user-pic" class="preview form-control form-control-lg" src="Images\user.jpg" alt="" style="border:1px solid grey;margin-left:10px; height: 200px; width: 160px;"><br>
                                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control-file border file" onchange="previewImage()" required>
                                                        <label class="form-label" for="upload_file">Image</label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="d-flex justify-content-end pt-3">
                                                <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                                                <button type="submit" class="btn btn-warning btn-lg ms-2">Submit
                                                    form</button>
                                            </div>

                                        </div>
                                    </form>

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
    </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <script>
        //photo
        function previewImage() {
            var file = document.querySelector(".file").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function(event) {
                    document.querySelector(".preview").setAttribute("src", event.target.result);
                };

                fileReader.readAsDataURL(file[0]);
            }
        }

        //aadhar
        const d = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
            [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
            [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
            [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
            [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
            [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
            [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
            [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
            [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
        ]

        const p = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
            [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
            [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
            [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
            [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
            [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
            [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
        ]

        function validate(addharNumber) {
            let c = 0;
            let invertedArray = addharNumber.split("").map(Number).reverse();

            invertedArray.forEach((val, i) => {
                c = d[c][p[(i % 8)][val]]
            });

            return (c === 0)
        }

        function verify() {
            let message = document.getElementById('message');
            const adhaarNo = document.getElementById('adhaarNo').value;
            if (adhaarNo.length == '12') {
                if (validate(adhaarNo)) {
                    message.innerHTML = 'Valid';
                    $('input[name="aadhaar_valid"]').value = "valid";
                    $('input[name="aadhaar_valid"]').val("valid");

                } else {
                    message.innerHTML = 'InValid';
                    $('input[name="aadhaar_valid"]').val("invalid");
                }
            } else {
                message.innerHTML = 'InValid';
                $('input[name="aadhaar_valid"]').val("invalid");
            }
        }

        //Mobile Number
    </script>
    <script>
        $(document).on('submit', '#form', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            $.ajax({
                url: "insert_petient_data.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.loader').removeClass('is-active');
                    if (data == '4') {

                        alert("Email Already Exists");

                    } else if (data == '5') {
                        alert('Aadhaar Number Already exits in our records Please use diffrent');

                    } else if (data == '1') {
                        alert('Registered Sucessfully. verify Your email **Verification email sent to you mail id** ');
                        $('#form')[0].reset();
                        $('.preview').attr("src", "Images/user.jpg");
                        window.location = "patient-verification.php";
                    } else if (data == '2') {
                        alert('Error');
                    } else if (data == '3') {
                        alert('Please Enter The Valid Aadhaar');
                    }
                }
            })
        })
        // Function to allow only alphabets in the input field
        function allowOnlyAlphabets(event) {
            var input = event.target;
            var regex = /[^a-z SA-Z\s]/g;
            input.value = input.value.replace(regex, '');
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script language="javascript">
        print_state("sts");
    </script>


</body>


</html>