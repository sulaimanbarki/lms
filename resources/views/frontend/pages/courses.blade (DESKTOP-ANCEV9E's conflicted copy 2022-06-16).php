<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- you're welcome 3 -->

    <!-- Title -->
    <title>Document</title>
    <style>
        

        /* change background image when screen size decrease */
        /* // Small devices (landscape phones, 576px and up) */

        @media (min-width: 520px) {
            .topimage {
                height: 140vh !important;
                width: 100vh;
            }

            .topimage h2 {
                font-size: 30px !important;
            }

            .topimage p {
                font-size: 16px !important;
            }

            .why_us {
                width: 100%;
            }
        }

        /* // Medium devices (tablets, 768px and up) */

        @media (min-width: 768px) {
            .topimage {
                height: 160vh !important;
            }

            .topimage h2 {
                font-size: 40px !important;
            }

            .topimage p {
                font-size: 20px !important;
            }

            .why_us {
                width: 100%;
            }
        }

        /* // Large devices (desktops, 992px and up) */

        @media (min-width: 992px) {
            .topimage h2 {
                font-size: 50px !important;
            }

            .topimage p {
                font-size: 22px !important;
            }

            .why_us {
                width: 100%;
            }

            .engineering {
                min-width: 700px !important;
                display: flex !important;
                overflow: hidden !important;
            }

            .engineering h2 {
                margin-right: -130px !important;
            }

            .engineering p {
                font-size: 20px !important;
                margin-right: -130px !important;
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */

        @media (min-width: 1200px) {
            .topimage h2 {
                font-size: 50px !important;
            }

            .topimage p {
                font-size: 22px !important;
            }

            .why_us {
                width: 100%;
            }
        }

        @media (min-width: 1400px) {
            .topimage {
                background-image: url('images/redesign.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                height: 160vh !important;
                width: 105%;
                margin-left: -5px;
                overflow: hidden;
            }

            .topimage h2 {
                font-size: 60px !important;
            }

            .topimage p {
                font-size: 22px !important;
            }

            .why_us {
                width: 100%;
            }
        }

        hr {
            opacity: 1 !important;
        }
    </style>

</head>

<body style="background-color: #fdf4e2;">

    <div class="container-fluid" id="main">
        <div class="row">
            <!-- Background image -->
            <div class="img-fluid bg-image ">



                <!--  -->
                @include('frontend.pages.navbar')

                {{-- search form --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-form">
                                <form action="" id="searchformm" method="post" onsubmit="return false">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                    </div>
                                    <div class="form-group">
                                        <button id="searchform" type="submit" class="btn btn-primary float-right">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- display all videos's title and links --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="video-list">
                                <div class="row">
                                    @foreach ($videos as $video)
                                    <div class="col-md-4">
                                        <div class="video-item">
                                            <div class="video-info">
                                                @if($video->is_playlist)
                                                    <a href="/courses/{{$video->id}}">                                                    
                                                        <h5>{{ $video->title }}</h5>
                                                    </a>
                                                @else
                                                    <a href="/course/{{$video->id}}"> 
                                                        <h5>{{ $video->title }}</h5>
                                                    </a>
                                                @endif
                                                <p>{{ $video->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Footer -->
                <div class="row" style="background-image: url('images/7.jpg');
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
                "></i>
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
                "></i>
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
                        "></i>
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
                        "></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer Raffer -->
                    </div>


                </div>
                <!-- End Footer -->


                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css " rel="stylesheet "
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC "
                    crossorigin="anonymous ">
                    {{-- jquery cdn --}}
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



                    <script>
                        $("#searchform").click(function () {
                            $.ajax({
                                url: "{{route('freelanceSearch')}}",
                                type: "GET",
                                data: $("#searchformm").serialize(),
                                success: function (data) {
                                    // show blog post return in data
                                    $("#blog-post").empty();
                                    // loop on data to print blog post
                                    for (var i = 0; i < data.length; i++) {
                                        $("#blog-post").append(
                                            '<div class="col-md-4">' +
                                            '<div class="blog-post">' +
                                            '<div class="blog-post-content">' +
                                            '<h3>' + data[i].title + '</h3>' +
                                            '<a href="/freelancing/' + data[i].id + '">Read More</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>'
                                        );
                                    }
                                    // empty card-container
                                }
                            });
                        });
                    </script>

</body>

</html>