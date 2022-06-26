@include('frontend.layouts.header')

<!-- End Header-->


<!-- =================================== main  =======================================  -->

<body style="background-color: #fdf4e2;">

    <div class="container-fluid" id="main">
        <div class="row">
            <!-- Background image -->
            <div class="img-fluid bg-image topimage ">



                <!--  -->
                @include('frontend.layouts.navbar')


            </div>
        </div>
    </div>

                <!-- display single question -->
                <div class="container mt-5">
                    <div class="row " id="freelacing_show_img">
                        <div class="col-md-12">
                            <h2 style="font-size:3rem; " >{{$blog->title}}</h2>
                            <hr>
                            <img src="{{ asset('uploads/thumbnail/'.$blog->thumbnail) }}" class="img-fluid img-fluid card-img-top freelacing_img my-3 " style="width: 100%; height:45rem;" id="freelacing_show_img" alt="...">
                            <h3>{!! $blog->body !!}</h3>>


                            </div>
                        </div>
                    </div>



                {{-- display random questions from database --}}


                {{-- <img src="{{asset('images/7.jpg')}}" alt="fasdfasdfa"> --}}




                <!-- Footer -->
         <!-- container end -->


        @include('frontend.layouts.footer')
        <!-- =================================== Footer ===================================-->
                <!-- End Footer -->


                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css " rel="stylesheet "
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC "
                    crossorigin="anonymous ">
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
