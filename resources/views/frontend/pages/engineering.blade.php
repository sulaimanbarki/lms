@include('frontend.layouts.header')

<!-- End Header-->



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
                                                <select onchange="fetchSubjects(this.value)" class="form-select" style="font-size: 1.3rem;" aria-label="Default select example">
                                                    <option selected>Select Department</option>
                                                    @foreach ($departments as $department)
                                                    <option  value="{{$department->id}}">{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        <div class="mt-4" >
                                        <select class="form-select" id="subjects" style="font-size: 1.3rem;" aria-label="Default select example">
                                            <option selected>Select Subject</option>
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                        {{-- search button --}}
                                        <div class="mt-3" style="text-align: right; margin-right:px;">
                                            <button id="searchform" type="submit" class="btn btn-primary mt-2" style="font-size: 1.1rem;" >Search</button>
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
                                                    <div class="col-md-11">
                                                        <h5 style="font-family: 'Merriweather', serif;" class="card-title">{{ Illuminate\Support\Str::limit($question->question, 100)}}</h5>
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <p class="card-text">{{ Illuminate\Support\Str::limit($question->answer, 50) }}</p>
                                                    </div> --}}
                                                    {{-- view --}}
                                                    <div class="col-md-1">
                                                        <a href="/engineering/{{$question->id}}"
                                                            class="btn btn-primary">View</a>
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
                                                                '<h5 class="card-title">' + (item.question.substring(0, 100)) + '</h5>' +
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
