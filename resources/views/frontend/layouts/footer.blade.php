<!-- =================================== Footer ===================================-->
<div class="mt-5 row footer_img  img-fluid"  style="background-image: url({{asset('images/7.jpg')}});
                        width: 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 50vh;
                        margin-left :-5px;">

    <!-- Footer Content Raffer -->
    <div class="footer mt-3 d-flex">
        <div class="container mt-3 d-flex">

            <!-- logo -->
            <div class="col-md-3 col-sm-12 ms-5 footer_logo">
                <img src="{{asset('images/footer_logo.png')}}" alt="Avatar Logo" class="log-img img-fluid" style="width:160px;">
            </div>


            <!-- navbar -->
            <div class="nav col-md-2 col-sm-12 ">
                <nav class="navbar">
                    <ul class="nav navbar-nav" style="box-sizing: border-box; padding: 0.5em">
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF; font-size: 1.5rem;" href="{{route('index')}}"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF; font-size: 1.5rem; " href="{{route('engineering')}}"> Engineering </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF; font-size: 1.5rem; " href="{{route('freelancing')}}"> Freelancing </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF; font-size: 1.5rem; " href="{{route('courses')}}"> Courses </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF; font-size: 1.5rem; " href="{{route('contact')}}"> Contact Us </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #FFF; font-size: 1.5rem; " href="{{route('privacy_policy')}}"> Policy </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <!-- User counter -->
            <div class="mt-4 counter col-md-2 col-sm-12 ">
                <h4 style="color: #FFF;">Registered Users </h4>
                @php
                    $counter = DB::table('users')->count();
                @endphp
                <h3 style="color: #FFF;">{{$counter}}</h3>
            </div>

            <!-- Follow Us -->
            <div class="col-md-2 col-sm-12 follow p-3 ">

                <h4 class="mb-5" style="color: #FFF;">Follow Us </h4>

                <!-- Linked icon -->


                <span class="mb-5"> <a href="https://www.linkedin.com/company/engineering-gurru/">
                        <i class="fa-brands fa-linkedin-in" style="background-color: #ffac47;
                    border-radius: 50%;
                    border: 1px solid #ffac47;
                    padding: 10px;
                    font-size: 22px;
                    color: #FFF;
                    "></i>
                    </a>
                </span>


                <!-- Youtube icon -->

                <span class="mt-5">
                    <a href="https://www.youtube.com/channel/UC_f9Q-DpO_PF3AkkCRmzc5w">
                        <i class="fa-brands fa-youtube ms-3 " style="background-color: #ffac47;
                    border-radius: 50%;
                    border: 1px solid #ffac47;
                    padding: 10px;
                    font-size: 22px;
                    color: #FFF;
                    "></i>
                    </a>
                </span>
            </div>



            <!-- Linkedin and Youtube icons    -->
            <div id="vertical_icons" class="mt-3 vertical_icons col-md-2 ">

                <div class="d-flex align-items-start flex-column">
                    <div class="p-2 mb-auto bd-highlight">
                        <!-- Linked icon -->
                        <span> <a href="https://www.linkedin.com/company/engineering-gurru/">
                                <i class="fa-brands fa-linkedin-in" style="background-color: #ffac47;
                            border-radius: 50%;
                            border: 1px solid #ffac47;
                            padding: 10px;
                            font-size: 22px;
                            color: #FFF;
                            "></i>
                            </a>
                        </span>
                    </div>

                    <div class="bd-highlight" style="margin-left:-5px;">
                        <!-- Youtube icon -->
                        <span> <a href="https://www.youtube.com/channel/UC_f9Q-DpO_PF3AkkCRmzc5w">
                                <i class="fa-brands fa-youtube ms-3 " style="background-color: #ffac47;
                            border-radius: 50%;
                            border: 1px solid #ffac47;
                            padding: 10px;
                            font-size: 22px;
                            color: #FFF;
                            "></i>
                            </a>
                        </span>
                    </div>
                </div>

            </div>


            <!-- End Footer Raffer -->

        </div>


    </div>
</div>
<!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

