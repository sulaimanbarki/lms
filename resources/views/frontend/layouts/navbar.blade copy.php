<div class="header_navbar">
    <nav class="navbar navbar-expand-lg navbar-dark header_nav ">
        <div class="container-fluid raffer">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->

            <img src="{{ asset('images/logo.png')}}" alt="Avatar Logo" class="mt-3 logo" style="width:160px;">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('engineering')}}">Engineering</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('freelancing')}}">Freelancing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('courses')}}" tabindex="-1" aria-disabled="true">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}" tabindex="-1" aria-disabled="true">Contact
                            us</a>
                    </li>
                    {{-- if logged in then show logout else show log in --}}
                    @if (Auth::check())
                    <li class="nav-item">
                        {{-- logout is post method --}}
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-outline-light" type="submit">Logout</button>
                        </form>
                        {{-- <a class="nav-link" style="color: #FFF;" href="{{route('logout')}}">Logout</a> --}}
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- end collapase -->


        </div>
    </nav>
    <!-- end navbar -->
</div>
