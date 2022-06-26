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

    <style>
        .video-item {
            margin-bottom: 1rem;
        }
        /* youtube playlist styling */
        .video-container{
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 25px;
            height: 0;
            overflow: hidden;
        }
        .video-container iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .video-item .video-info{
            position: relative;
            padding-bottom: 1rem;
        }
        .video-item .video-info .video-title{
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
        }
    </style>



    {{-- main content --}}
            <div>
                <!-- display single question -->
                <div class="container">
                    {{-- display youtube playlist --}}

                    <div class="row my-5 ">
                        <div class="container d-flex justify-content-center " >
                            <div class="card" style="width: 75%; height:50%; ">
                                <div class="card-header">
                                    <h2 style="font-size:2.3rem; font-family: 'Noto Sans Display', sans-serif; margin-left:1rem;" >{{$video->title}}</h2>
                                </div>
                                @php
                                    $firstId = explode(',', $video->video_url)[0];
                                @endphp
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="embed-responsive embed-responsive-16by9 video-container">
                                                <iframe width="100%" height="100%" class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/{{$firstId}}?playlist={{$video->video_url}}&controls=1&showinfo=0&rel=0&modestbranding=1&color=white&iv_load_policy=3"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        {{-- video description --}}
                                        <div class="col-md-12">

                                            <div class="card mt-2 ">
                                                <div class="card-header">
                                                   <h2 class="card-title" style="font-size: 2.3rem;" >{{$video->title}}</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">{{$video->description}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
