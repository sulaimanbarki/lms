@include('frontend.layouts.header')

<!-- End Header-->



<!-- =================================== main  =======================================  -->

<body style="background-color: #fdf4e2;">

    <div class="container-fluid" id="main">
        <div class="row">
            <!-- Background image -->
            <div class="img-fluid bg-image topimage">



                <!--  -->
                @include('frontend.layouts.navbar')
            </div>
        </div>
    </div>



    {{-- main content --}}
            <div>
                <!-- display youtube video in full screen -->
                <div class="container my-5 ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" col-md-12 d-flex justify-content-center  embed-responsive embed-responsive-16by9 video-container">
                                <iframe style="width: 80%; height: 50rem; padding: 2rem; " class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->video_url}}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        {{-- video description --}}
                        <div class="col-md-12  ">
                            <div class="card d-flex justify-content-center ">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold ">{{$video->title}}</h3>
                                    <p class="card-text" style="font-size: 1.3rem;" >{{$video->description}}</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>



                <!-- Footer -->
                <!-- =================================== Footer ===================================-->
                            @include('frontend.layouts.footer')
                <!-- =================================== Footer ===================================-->
                    {{-- jquery cdn --}}
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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
                                                '<div class="card mt-1">' +
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
