<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- you're welcome 3 -->

    <!-- Title -->
    <title>Document</title>


    <!-- Add custom css  -->
    <link rel="stylesheet" href="{{ asset('css/frondend/style.css') }}">

    <style>
        /* change background image when screen size decrease */
        /* // Small devices (landscape phones, 576px and up) */
        /* @media (min-width: 520px) {}*/
        /* // Medium devices (tablets, 768px and up) */
        /* @media (min-width: 768px) {}*/
        /* // Large devices (desktops, 992px and up) */
        /* @media (min-width: 992px) {}*/
        /* Extra large devices (large desktops, 1200px and up) */
        /* @media (min-width: 1200px) {}*/
        /* @media (min-width: 1400px) {}*/

        .topimage {
            background-image: url('images/redesign.jpg');
            height: 500px;
            /* background-position: center center; */
            background-repeat: no-repeat;
            background-size: cover;
            height: 160vh !important;
        }
    </style>

</head>

<body style="background-color: #fdf4e2;">

    <div class="container-fluid" id="main">
        <div class="row">
            <!-- Background image -->
            <div class="img-fluid bg-image topimage">



                <!--  -->
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <div class="container-fluid">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->

                        <img src="images/logo.png" alt="Avatar Logo" class="mt-3" style="width:160px;">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto ">
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF;" aria-current="page" href="{{route('index')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF;" href="{{route('engineering')}}">Engineering</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF;" href="#">Freelancing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF;" href="#" tabindex="-1" aria-disabled="true">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF;" href="#" tabindex="-1" aria-disabled="true">Contact us</a>
                                </li>
                            </ul>

                            <!-- extra div -->
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </nav>


                <!-- ENGINEERING GURRU -->
                <div class="row mt-5 ">
                    <h2 class="text-light fw-bold" style="font-size: 70px; letter-spacing: 2px; ">ENGINEERING GURRU</h2>
                    <p class="text-light p-2 d-flex justify-content-between " style="font-size: 28px; letter-spacing: 1px;">Use Engineering Gurru to learn about engineering, <br> software tutorials, and to make money as a freelancer <br> through different freelancing platforms.</p>
                </div>


            </div>
        </div>





        <!-- black hr tag with black background height 5px -->
        <div class="d-flex justify-content-center ">
            <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
        </div>


        <!-- why us -->
        <div id="why_us" class="col-lg-12 col-md-12 col-sm-12 why_us " style="text-align:center;">
            <img c;as src="images/pages/Home/1200/2.jpg" alt="">
        </div>


        <!-- black hr tag with black background height 5px -->
        <div class="d-flex justify-content-center">
            <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
        </div>


        <!-- About Us -->
        <div class="container fw-bold col-lg-12 col-md-12 col-sm-12 about_us " style="text-align:center;">
            <h1 class="fs-1 ft-bold my-5" style="font-size:50px;">About us</h1>
            <p class="" style="font-size:22px;letter-spacing: 2px;">We are a group of young, self-motivated engineers who pursue a career in the freelance industry while completing our degrees in Engineering. We assist students improve their abilities and prepare them for freelancing, which increases their
                chances of finding work on many Freelancing platforms.</p>
        </div>


        <!-- black hr tag with black background height 5px -->
        <div class="d-flex justify-content-center ">
            <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
        </div>


        <!-- engineering -->
        <div class="mt-5 engineering" style="background-image: url('images/pages/Home/1200/3.jpg');
            height: 500px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 80vh
            ">


            <div class="col-md-6 " style="margin-left:100px;margin-top:160px ">
                <h2 class=" fw-bold" style="font-size: 70px; letter-spacing: 2px; ">ENGINEERING</h2>
                <p class="fw-bold" style="font-size:22px;letter-spacing: 2px;">
                    Our aim is to make to assist Engineering student in Engineering subject. We are providing solution of Engineering subject. Let's get started with Engineering Gurru.
                </p>
            </div>
        </div>


        <!-- black hr tag with black background height 5px -->
        <div class="d-flex justify-content-center ">
            <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
        </div>

        <!-- Freelancing -->
        <div class="row " style="background-image: url('images/pages/Home/1200/5.jpg');
            height: 500px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 80vh">



            <!-- Freelancing inner section -->>
            <div class="col-md-6 " style="margin-left:100px;margin-top:160px ">
                <h1 class=" fw-bold" style="font-size: 70px; letter-spacing: 2px; ">Freelancing</h1>
                <p class="fw-bold" style="font-size:22px;letter-spacing: 2px;">
                    Do you want to Earn?
                </p>
                <p class="fw-bold" style="font-size:22px;letter-spacing: 2px;">Let started Learning with Engineering Gurru.</p>
                <p class="fw-bold" style="font-size:22px;letter-spacing: 2px;">
                    Engineering Gurru helps Fresh Freelancer to become a successful in freelancing World.
                </p>
            </div>
        </div>


        <!-- black hr tag with black background height 5px -->
        <div class="d-flex justify-content-center ">
            <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
        </div>


        <div class="" style="width: 100%; height:30vh "></div>

        <!-- container end -->
    </div>


    <!-- Footer -->
    <div class="row" style="background-image: url('images/pages/Home/1200/7.jpg');
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 50vh;
            margin-left :-5px;">

        <!-- Footer Content Raffer -->
        <div class="row" style="margin-top: 30px;">


            <!-- logo -->
            <div class="col-md-3 ms-5 mt-3">
                <img src="images/logo.png" alt="Avatar Logo" class="mt-3" style="width:160px;">
            </div>

            <!-- navbar -->
            <div class="col-md-2 mt-3">
                <nav class="navbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF;" href="#"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF;" href="#"> Services </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF;" href="#"> Contact </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF;" href="#"> Blogs </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <!-- User counter -->
            <div class="col-md-2 mt-4">
                <h4 style="color: #FFF;">Counter </h4>
                <h3 style="color: #FFF;">1024</h3>
            </div>

            <!-- Follow Us -->
            <div class="col-md-2 mt-4">
                <h4 style="color: #FFF;">Follow Us </h4>

                <!-- Linked icon -->
                <span> <a href="#">
                <i class="fa-brands fa-linkedin-in" style="background-color: #ffac47;
                border-radius: 50%;
                border: 1px solid #ffac47;
                padding: 10px;
                font-size: 22px;
                color: #FFF;
                " ></i>
                </a>
            </span>


                <!-- Youtube icon -->
                <span> <a href="#">
                <i class="fa-brands fa-youtube ms-3 " style="background-color: #ffac47;
                border-radius: 50%;
                border: 1px solid #ffac47;
                padding: 10px;
                font-size: 22px;
                color: #FFF;
                " ></i>
                </a>
            </span>
            </div>

            <!-- Linkedin and Youtube icons    -->
            <div class="col-md-2 mt-3">

                <div class="d-flex align-items-start flex-column">
                    <div class="mb-auto p-2 bd-highlight">
                        <!-- Linked icon -->
                        <span> <a href="#">
                        <i class="fa-brands fa-linkedin-in" style="background-color: #ffac47;
                        border-radius: 50%;
                        border: 1px solid #ffac47;
                        padding: 10px;
                        font-size: 22px;
                        color: #FFF;
                        " ></i>
                        </a>
                    </span>
                    </div>
                    <div class="bd-highlight" style="margin-left:-5px;">
                        <!-- Youtube icon -->
                        <span> <a href="#">
                        <i class="fa-brands fa-youtube ms-3 " style="background-color: #ffac47;
                        border-radius: 50%;
                        border: 1px solid #ffac47;
                        padding: 10px;
                        font-size: 22px;
                        color: #FFF;
                        " ></i>
                        </a>
                    </span>
                    </div>
                </div>
            </div>
            <!-- End Footer Raffer -->
        </div>


    </div>
    <!-- End Footer -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css " rel="stylesheet " integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC " crossorigin="anonymous ">

</body>

</html>
