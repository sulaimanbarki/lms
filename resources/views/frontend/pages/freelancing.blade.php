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


                {{-- search form --}}
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-form">
                                <form action="" id="searchformm" method="post" onsubmit="return false">
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="font-size: 1.4rem;" name="search" placeholder="Search">
                                    </div>
                                    <div class="form-group mt-3" style="text-align: right;" >
                                        <button id="searchform" type="submit" class="btn btn-primary float-right" style="font-size: 1.1rem;">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- display blogs --}}
                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-posts">
                                <div class="row g-3 " id="blog-post">
                                    @foreach ($blogs as $blog)

                                        <div class="col-md-4 col-sm-6" id="freelancing_card">
                                            <div class="blog-post">
                                                <div class="blog-post-content ">

                                                    <div class="card"  class="" style="width:30rem;">
                                                        <img src="{{ asset('uploads/thumbnail/'.$blog->thumbnail) }}"
                                                            class="img-fluid card-img-top " style="min-width:30rem; min-height:30rem; max-width:30rem; max-height:30rem;" alt="...">
                                                        <div class="card-body">
                                                            {{-- blog title is 100 characters long --}}
                                                            <h5 class="card-title">{{ substr($blog->title,0,50) }}</h5>
                                                            <p class="card-text"></p>

                                                            @auth
                                                            <a href="{{ route('freelancingShow', $blog->id) }}" class="btn btn-primary">Read More</a>
                                                            @else
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                View
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title" id="exampleModalLabel">
                                                                                Login</h3>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 style="text-align: center;color: red;">Please Login First</h4>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a  href="https://engineeringgurru.com/login"  class="btn btn-secondary" >Login</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endauth

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    <div class="col-md-12 mt-5">
                                        <div class="pagination">
                                            {{ $blogs->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- ================================ Footer =========================================== -->
               @include('frontend.layouts.footer')
            <!-- =================================== Footer ===================================-->


                    {{-- jquery cdn --}}
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



                    <script>
                        $("#searchform").click(function () {
                            $.ajax({
                                url: "{{route('freelanceSearch')}}",
                                type: "GET",
                                data: $("#searchformm").serialize(),
                                success: function (data) {
                                    $("#blog-post").empty();
                                    for (var i = 0; i < data.length; i++) {
                                        $("#blog-post").append('<div class="col-md-3">' +
                                                '<div class="blog-post">' +
                                                    '<div class="blog-post-content">' +
                                                        '<div class="card" style="width: 18rem;">' +
                                                            '<img src="uploads/thumbnail/' + data[i].thumbnail + '" class="card-img-top " alt="..."> ' +
                                                            '<div class="card-body">' +
                                                                '<h5 class="card-title">' + data[i].title.substring(0, 50) + '</h5>' +
                                                                '<a href="/freelancing/' + data[i].id + '" class="btn btn-primary">Read More</a>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>');
                                    }
                                    // empty card-container
                                }
                            });
                        });
                    </script>


</body>

</html>
