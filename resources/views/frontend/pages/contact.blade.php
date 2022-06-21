@include('frontend.layouts.header')

<!-- End Header-->



<!-- =================================== main  =======================================  -->

<body style="background-color: #fdf4e2;">
    <div class="container-fluid" id="main">
        <div class="row">
            <!-- Background image -->
            <div class="img-fluid bg-image topimage">

                @include('frontend.layouts.navbar')

            </div>
        </div>
    </div>

    {{-- main content --}}



    <div class="container">
    <div class="row my-5 gx-5 d-flex justify-content-center" style="border: 2px solid #C0C0C0; padding: 30px;">


        <!-- iamge -->
        <div class="col-md-6  " >
            <img class="img-fluid" src="{{asset('images/undraw-contact.svg')}}" alt="undraw-contact" width="450" >
        </div>


            <div class="col-md-6 col-sm-12 ">

                    <form action="{{ route('saveContact') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold " style="font-size: 1.3rem;" >Name</label>
                            <input type="text" name="name" id="name" style="font-size: 1.3rem;" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold" style="font-size: 1.3rem;" >Email</label>
                            <input type="email" name="email" id="email" style="font-size: 1.3rem;" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-bold" style="font-size: 1.3rem;" >Subject</label>
                            <input type="text" name="subject" id="subject" style="font-size: 1.3rem;" class="form-control rounded-pill">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Contact Us" id="floatingTextarea2" style="height: 100px;font-size: 1.4rem; "
                                name="message"></textarea>
                            <label for="floatingTextarea2" class="fw-bold"  style="font-size: 1.3rem;" >Message</label>
                        </div>
                        <div class="mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-primary" style="font-size: 1.1rem" >Submit</button>
                        </div>
                    </form>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

            </div>
        </div>



    <!-- Footer -->
    <!-- =================================== Footer ===================================-->
    @include('frontend.layouts.footer')
    <!-- =================================== Footer ===================================-->
    <!-- End Footer -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css " rel="stylesheet "
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC " crossorigin="anonymous ">

</body>

</html>

</div>
</body>

</html>
