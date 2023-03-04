<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>

    {{-- google fonts  --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    {{-- bootstrap  --}}

    <link rel="stylesheet" href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}">

    {{-- toastr css  --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- MDB -->

    <link href="{{ asset('css/mdb-ui-kit/css/mdb.min.css') }}" rel="stylesheet" />

    {{-- font-awesome  --}}

    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">

    {{-- main css --}}

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg shadow position-sticky" id="Navbar1234" style="background-color: #D0EAFF;top:-70px;z-index: 1000;">
            <div class="container">
                <div class="d-flex justify-content-end w-100">
                    <div class="rounded-circle bg-light shadow-sm"
                        style="margin-right: 15px;cursor:pointe;width:50px;height:50px;">
                        <img src="{{ asset('img/codeLab.jpg') }}" class="rounded-circle" style="width:50px;height:50px"
                            alt="">
                    </div>
                    <a class="navbar-brand fs-4" style="font-weight: 700" href="#">Student Management System</a>

                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                        <ul class="navbar-nav d-flex align-items-center">
                            <li class="nav-item me-4">
                                <a class="nav-link text-black fw-semibold" aria-current="page"
                                    href="{{ route('admin#homePage') }}">Home</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link text-black fw-semibold" aria-current="page"
                                    href="{{route('category#listPage')}}">Category</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link text-black fw-semibold"
                                    href="{{ route('course#listPage') }}">Courses</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link text-black fw-semibold" href="{{route('request#listPage')}}">Requests</a>
                            </li>
                            <li class="nav-item dropdown me-4">
                                <a class="nav-link dropdown-toggle text-black fw-semibold" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Lists
                                </a>
                                <ul class="dropdown-menu shadow-sm">
                                    <li>
                                        <a class="dropdown-item" href="{{route('student#listPage')}}">
                                            <i class="fa-solid fa-graduation-cap me-2"></i>
                                            Student Lists
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('admin#listPage')}}">
                                            <i class="fa-solid fa-hammer me-2"></i>
                                            Admin Lists
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('user#listPage')}}">
                                            <i class="fa-solid fa-user me-2"></i>
                                            User Lists
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link text-black fw-semibold" href="{{route('contact#listPage')}}">Contacts</a>
                            </li>
                            <li class="nav-item dropdown ms-2">
                                <a class="nav-link text-black fw-semibold" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="rounded-circle bg-light shadow-sm"
                                        style="margin-right: 15px;cursor:pointer">
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('img/defaultUser.jpg') }}"
                                                class="rounded-circle" style="width: 40px;height:40px;" alt="">
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-circle" style="width: 40px;height:40px;" alt="">
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu shadow-sm">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin#profilePage') }}">
                                            <i class="fa-regular fa-user me-2"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('admin#changePasswordPage')}}">
                                            <i class="fa-solid fa-lock me-2"></i>
                                            Password
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a class="dropdown-item" href="#">
                                                <button type="submit"
                                                    style="outline: none;margin:0;padding:0;background-color:transparent;border:none;">
                                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                                    Logout
                                                </button>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="">
            @yield('content')
        </div>
    </div>
</body>


{{-- Bootstrap Js  --}}

<script src="{{ asset('css/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- MDB -->
<script type="text/javascript" src="{{ asset('css/mdb-ui-kit/js/mdb.min.js') }}"></script>

{{-- jquery cdn  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

{{-- manin Js  --}}
{{-- <script src="{{ asset('js/script.js') }}"></script> --}}

{{-- toastr Js  --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script>
const navBarTag = document.getElementById("Navbar1234");

    window.onwheel = (e) => {
        if (e.deltaY >= 0) {
            // Scrolling Down with mouse
            navBarTag.classList.remove("addtopForNavbar");
        } else {
            // Scrolling Up with mouse
            navBarTag.classList.add("addtopForNavbar");
        }
    };
</script>



    @yield('script')


</html>
