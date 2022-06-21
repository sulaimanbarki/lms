@include('frontend.layouts.header')

<!-- End Header-->



<!-- =================================== main  =======================================  -->


<body style="background-color: #fdf4e2;">

    <div class="container-fluid" id="main">
        <div class="row ">
            <!-- Background image -->
            <div class="img-fluid bg-image topimage header">

                @include('frontend.layouts.navbar')

                <!-- end header nav -->

                <!-- ENGINEERING GrurruHedigning  -->
                <div class=" row col-md-12 col-sm-12 ms-3 " id="header_text" >
                    <h2 class=" text-light fw-bold" style="font-size: 5rem; letter-spacing: 2px; ">ENGINEERING GURRU</h2>
                    <p class="p-2 text-light  " style="font-size: 2rem; letter-spacing: .5px;">Use Engineering Gurru to
                        learn about engineering, <br> software tutorials, and to make money as a freelancer <br> through
                        different freelancing platforms.</p>
                </div>

            </div>

        </div>
    </div>

    <!-- =================================== End main  =======================================  -->





    {{-- <!-- ====================== hr ========================== -->
    <div class="d-flex justify-content-center ">
        <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
    </div> --}}


    <!-- why us -->
    <div id="why_us" class="col-lg-12 col-md-8 col-sm-6 why_us " style="text-align:center;">
        <img id="why_us" class="img img-fluid" src="{{asset('images/pages/Home/1200/2.jpg')}}" alt="">
    </div>




    <!-- ====================== hr ========================== -->
    <div class="d-flex justify-content-center">
        <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
    </div>


    <!-- About Us -->
    <div class="container d-flex flex-column justify-content-center align-items-center about_us"  style="text-align: center; height: 40vh;" >
    <div class="row">
        <h2 class="my-5">About us</h1>
        <p class="" style="font-size:2rem;">We are a group of young, self-motivated engineers who pursue a career in the freelance industry while completing our degrees in Engineering. We assist students improve their abilities and prepare them for freelancing, which increases their chances
            of finding work on many Freelancing platforms.</p>

        </div>
</div>


    <!-- ====================== hr ========================== -->
    <div class="d-flex justify-content-center ">
        <hr style="width:90%;height:.3rem; background-color:#000; color:#000; border:.3rem solid #000 ">
    </div>


    <!-- engineering -->


    <div class="container">
            <div class="row d-flex align-items-center " >
                    <div class="col-md-7 p-5">
                            <h2>ENGINEERING</h2>
                            <p class="col-lg-12 " style="font-size:20px;">
                                Our aim is to make to assist Engineering student in Engineering subject. We are providing solution of Engineering subject. Let's get started with Engineering Gurru.
                            </p>
                        </div>


                <div class="col-md-5 p-5"  >
                    <img src="images/4.png" class="img-fluid p-5 " style="" alt="">
                </div>

            </div>
    </div>


    <!-- ====================== hr ========================== -->
    <div class="d-flex justify-content-center ">
        <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
    </div>

    <!-- Freelancing -->
    <div class="container">
        <div class="row d-flex align-items-center ">

            <div class="col-md-7 p-5">
               <h2 style="font-size: 5rem;">Freelancing</h2>
               <p style="font-size:20px;">
                    Do you want to Earn?
                </p>
                <p style="font-size:2rem;">Let started Learning with Engineering Gurru.</p>
                <p style="font-size:2rem;">
                Engineering Gurru helps Fresh Freelancer to become a successful in freelancing World.
            </p>
        </div>


      <div class="col-md-5 p-5">
            <img src="images/5.png" class="img-fluid p-5 " style="" alt="">
        </div>
    </div>
</div>


    <!-- ====================== hr ========================== -->
    {{-- <div class="d-flex justify-content-center ">
        <hr style="width:90%;height:3px; background-color:#000; color:#000; border:3px solid #000 ">
    </div> --}}


    {{-- <div class="" style="width: 100%; height:.50vh "></div> --}}

    <!-- container end -->

<!-- =================================== Footer ===================================-->
@include('frontend.layouts.footer')
    <!-- =================================== Footer ===================================-->

            {{-- jquery cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <!-- =================================== Ajax ===================================-->
    <script>
        $("#searchform").click(function () {
                                    $.ajax({
                                        url: "{{route('search')}}",
                                        type: "GET",
                                        data: $("#searchformm").serialize(),
                                        success: function (data) {
                                            // loop on data
                                            // empty card-container
                                            $("#card-container").empty();
                                            $.each(data, function (i, item) {
                                                $("#card-container").append(
                                                    '<div class="col-md-12">' +
                                                        '<div class="mt-1 card">' +
                                                            '<div class="card-body">' +
                                                                '<div class="row">' +
                                                                    '<div class="col-md-5">' +
                                                                        '<h5 class="card-title">' + (item.question.substring(0, 50)) + '</h5>' +
                                                                    '</div>' +
                                                                    '<div class="col-md-6">' +
                                                                        '<p class="card-text">'+ (item.answer.substring(0, 50)) + '</p>' +
                                                                    '</div>' +
                                                                    '<div class="col-md-1">' +
                                                                        '<a href="/engineering/' + item.id + '" class="btn btn-primary btn-sm">View</a>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>'
                                                );
                                            });
                                        }
                                    });
                                });
    </script>
    </body>
    </html>
