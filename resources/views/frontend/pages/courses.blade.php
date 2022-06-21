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


    {{-- ======================= main content =======================--}}

    {{-- search form --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="search-form">
                    <form action="{{route('courses')}}" id="" method="get" >
                        <div class="form-group">
                            <input type="text" class="form-control" style=" font-size:1.5rem;" name="search" placeholder="Search">
                        </div>
                        <div class="form-group mt-3" style="text-align: right;">
                            <button id="searchform" type="submit" class="btn btn-primary float-right">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== display all videos's title and links with pagination ===================== --}}
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="video-list">
                    <div class="row" id="blog-post">
                        @foreach ($videos as $video)
                        <div class="col-md-3">
                            <div class="video-item">
                                <div class="video-info">



                                    {{-- add videos --}}
                                    @if($video->is_playlist)


                                    <div class="card" style="width: 18rem;">
                                        {{-- <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
                                        --}}
                                        <img src="{{ asset('uploads/thumbnail/'.$video->thumbnail_url) }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="/coursess/{{$video->id}}">
                                                    <h5>{{ $video->title }}</h5>
                                                </a>
                                            </h5>
                                            <a href="/coursess/{{$video->id}}" class="btn btn-primary">Watch Playlist</a>
                                        </div>
                                    </div>

                                    @else

                                    {{-- single video --}}
                                    <div class="card" style="width: 18rem;">
                                        {{-- image from public/uploads/thumbnail --}}
                                        <img src="{{ asset('uploads/thumbnail/'.$video->thumbnail_url) }}"
                                            class="card-img-top" alt="...">
                                        {{-- <img src="{{}}" class="card-img-top" alt="..."> --}}
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="/course/{{$video->id}}">
                                                    <h5>{{ $video->title }}</h5>
                                                </a>
                                            </h5>
                                            <a href="/course/{{$video->id}}" class="btn btn-primary">Watch Video</a>
                                        </div>
                                    </div>

                                    @endif
                                    {{-- <p>{{ substr($video->description, 0, 80) }}</p> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <p class="card-text">{{ $videos->links() }}</p>


                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- laravel pagination rendering --}}
    {{-- ======================= End main content =======================--}}




    <!-- =================================== Footer ===================================-->
    @include('frontend.layouts.footer')
    <!-- =================================== Footer ===================================-->


    {{-- jquery cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <script>
        $("#searchform").click(function () {
                            $.ajax({
                                url: "{{route('coursesSearch')}}",
                                type: "GET",
                                data: $("#searchformm").serialize(),
                                success: function (data) {
                                    // show blog post return in data
                                    $("#blog-post").empty();
                                    // display all videos's title and links returned in data
                                    $.each(data, function (i, item) {
                                        $("#blog-post").append(
                                            '<div class="col-md-4">' +
                                                '<div class="video-item">' +
                                                    '<div class="video-info">' +
                                                        (item.is_playlist ? '<a href="/courses/' + item.id + '"><h5>' + item.title + '</h5></a>' : '<a href="/course/' + item.id + '"><h5>' + item.title + '</h5></a>') +
                                                        // limit the number of item.description = 80 char
                                                        '<p>' + item.description.substring(0, 80) + '...</p>' +
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
