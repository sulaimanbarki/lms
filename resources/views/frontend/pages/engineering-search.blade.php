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

    <!-- display single question -->
    <div class="container mt-5">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-size: 2.2rem;" >{{$question->question}}</h2>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{$question->answer}}</p>

                        </blockquote>
                    </div>
                </div>
            </div>


        <hr>

        {{-- display random questions from database --}}
        <div class="row mt-3 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold alert text-center alert-primary" style="font-family: 'Hind Guntur', sans-serif;
font-family: 'Merriweather', serif;" > Random Questions</h5>

                        <div class="row" id="card-container">
                            <table class="table">
                                <thead>
                                    <tr style="font-size:1.3rem;" >
                                        <th scope="col">#</th>
                                        <th scope="col" >Question</th>
                                        <th scope="col">Ans</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($questions as $question)
                                    <tr style="font-size:1.2rem;" >
                                        <th>{{ $loop->iteration }}</th>
                                        <td style="font-size:1.3rem;  font-family: 'Merriweather', serif;" > {{ Illuminate\Support\Str::limit($question->question, 50)}}</td>
                                        <td style="font-size:1.3rem;  font-family: 'Merriweather', serif;">{{ Illuminate\Support\Str::limit($question->answer, 50) }}</td>
                                        <td><a href="/engineering/{{$question->id}}" style="font-size:1.1rem; font-family: 'Merriweather', serif;"
                                        style="font-size:1.3rem; font-family: 'Merriweather', serif;" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    {{-- --}}
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
