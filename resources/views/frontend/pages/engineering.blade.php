@include('frontend.layouts.header')

<!-- End Header-->
<!-- KaTeX dependency -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/katex.min.css" integrity="sha256-M6KFoDq9eUpmogkDgw6+3R3ZgUPSuFXnQyr8tskSfQs=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/katex.min.js" integrity="sha256-FyuFDgL3AT2Wi7dlv82fSVvxe2rPx1rRSVtMOWeRp6k=" crossorigin="anonymous"></script>

<!-- Quill dependency -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" integrity="sha256-jyIuRMWD+rz7LdpWfybO8U6DA65JCVkjgrt31FFsnAE=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js" integrity="sha256-xnX1c4jTWYY3xOD5/hVL1h37HCCGJx+USguyubBZsHQ=" crossorigin="anonymous"></script>

<!-- MathQuill dependency -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@edtr-io/mathquill@0.11.0/build/mathquill.css" integrity="sha256-Qy/E+9TDDKI7fQ+y2hHMCBV96QiZs9mXWMOrD+/14IU=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@edtr-io/mathquill@0.11.0/build/mathquill.min.js" integrity="sha256-1XldAnavTLoExr6gc0l1JD8cIzqRYhbi1eksEWsYdpY=" crossorigin="anonymous"></script>
<!-- End Header-->
<link rel="stylesheet" href="{{asset('mathquill4quill-master/mathquill4quill.css')}}">




<!-- =================================== main  =======================================  -->

<body style="background-color: #fdf4e2;">

    <div class="container-fluid" id="main">
        <div class="row">
            <!-- Background image -->
            <div class="img-fluid topimage bg-image ">

            <!--  -->
            @include('frontend.layouts.navbar')


            </div>
        </div>
        </div>


        {{-- main content --}}
            <div class="container my-5 main_container">
                <div class="row ">
                    {{-- search filter with departments and subjects dropdown --}}
                    <div class="col-md-12">
                        <div class="card "  style="background-color: #fdf4e2;padding: 5px; ">
                            <div class="card-body" >
                                <h4 class="card-title card-main-title fw-bold " style="font-size:1.5rem;" >Search Here </h4>






                                <form id="searchformm" class="mt-3" onsubmit="return false" method="POST">
                                    {{-- input search box --}}


                                    <div class="align-items-center g-3 ">

                                    <div class="col-auto  input-group d-flex" style="display: inline;" >
                                        <input type="text" class="form-control" style="font-size: 1.3rem;" placeholder="Search"
                                            aria-label="Search" name="question" required aria-describedby="basic-addon2">


                                    </div>

                                        <div class="mt-4">
                                                <select onchange="fetchSubjects(this.value)" name="department_id" class="form-select" style="font-size: 1.3rem;" aria-label="Default select example">
                                                    <option selected>Select Department</option>
                                                    @foreach ($departments as $department)
                                                    <option  value="{{$department->id}}">{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        <div class="mt-4" >
                                        <select class="form-select" id="subjects" name="subject_id" style="font-size: 1.3rem;" aria-label="Default select example">
                                            <option selected>Select Subject</option>
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                        {{-- search button --}}
                                        <div class="mt-3" style="text-align: right; margin-right:px;">
                                            <button id="searchform" type="submit" class="btn btn-primary mt-2 p-2" style="font-size: 1.3rem;" >Search</button>
                                        </div>

                                    </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                {{-- display random questions from database --}}
                <div class="row my-4" style="background-color: #fdf4e2;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title card-main-title fw-bold" style="font-family: 'Hind Guntur', sans-serif;
font-family: 'Merriweather', serif;" >Random Questions</h5>
                                <div class="row" id="card-container">
                                    @foreach ($questions as $question)
                                    <div class="col-md-12">
                                        <div class="card mt-1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-11 d-flex " id="engineering_random_equation">
                                                        <h5 style="font-family: 'Merriweather', serif; display:flex; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-title"> <span class="me-2" style="" > {{ $question->id }}
                                                        </span> {!! $question->question!!}</h5>
                                                    </div>
                                                    <div class="col-md-1">

                                                        @auth

                                                        <a href="/engineering/{{$question->id}}"
                                                            class="btn btn-primary p-2" style="font-size:1.2rem;">View</a>
                                                        @else
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary fw-bold" style="font-size: 1.2rem;" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            View
                                                        </button>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title" id="exampleModalLabel">
                                                                            Login
                                                                        </h3>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 style="text-align: ">Please Login First</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="https://engineeringgurru.com/login" class="btn btn-secondary">Login</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endauth
                                                    </div>
                                                    {{-- <div class="col-md-1">
                                                        <a href=""
                                                            class="btn btn-primary btn-sm">View</a>
                                                    </div> --}}
                                                </div>
                                                {{-- render pagination on question --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-12 mt-5">
                                        <div class="pagination">
                                            {{ $questions->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


{{--  --}}
            <!-- =================================== Footer ===================================-->
            @include('frontend.layouts.footer')
            <!-- =================================== Footer ===================================-->
                    {{-- jquery cdn --}}
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



                    <script>
                        // fetchSubjects function based on department id
                        function fetchSubjects(id) {
                            $.ajax({
                                url: "{{ route('fetchSubjects') }}",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: id
                                },
                                success: function(data) {
                                    // empty the select box
                                    $('#subjects').empty();
                                    // loop on data and append to select
                                    $.each(data, function(key, value) {
                                        $('#subjects').append($('<option>', {
                                            value: value.id,
                                            text: value.name
                                        }));
                                    });
                                }
                            });
                        }

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
                                                            '<div class="col-md-11">' +
                                                                '<h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' + item.question + '</h5>' +
                                                            '</div>' +
                                                            '<div class="col-md-1">' +
                                                                '<a href="/engineering/' + item.id + '" class="btn btn-primary">View</a>' +
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
