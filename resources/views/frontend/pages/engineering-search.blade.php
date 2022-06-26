@include('frontend.layouts.header')

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
                        <h2 style="font-size: 2.2rem;" >  {!!$question->question!!}</h2>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{!! $question->answer !!}</p>

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
font-family: 'Merriweather', serif;" > Related Questions</h5>

                        <div class="row" id="card-container">
                            <table class="table">
                                <thead>
                                    <tr style="font-size:1.3rem;" >
                                        <th scope="col">#</th>
                                        <th scope="col" >Question</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($questions as $question)
                                    <tr style="font-size:1.2rem;" >
                                        <th>{{ $loop->iteration }}</th>
                                        <td style="font-size:1.3rem;  font-family: 'Merriweather', serif; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="question_heading" > {!! $question->question !!}</td>
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
