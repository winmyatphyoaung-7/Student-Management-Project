<!DOCTYPE html>
<html lang="en" status-button="all">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Managment System</title>
    {{-- bootstrap  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}">

    {{-- font awesome  --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">

    {{-- customize css  --}}
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
    <nav class="navbar shadow-sm w-100 bg-light position-sticky" id="Navbar1234" style="z-index:2;top:-70px;">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-around w-100">
                <div class="">
                    <a class="navbar-brand fs-3 d-flex align-items-center" style="font-family: 'Rubik Glitch', cursive;"
                        href="#">
                        <img src="{{ asset('img/codeLab.jpg') }}" alt="Logo" width="45px" height="45px"
                            class="d-inline-block align-text-top rounded me-3">
                        Code Lab Student Project
                    </a>
                </div>
                <div class="">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a class="nav-link text-black" aria-current="page" href="{{route('user#homeSection')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('user#homePage') }}">Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('contact#homePage')}}">Contact Me</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">

                    <a href="{{ route('cart#listPage') }}" class="text-decoration-none me-4">
                        <button type="button" class="nav-icon rounded-circle position-relative" style="border: none">
                            <i class="fa-solid fa-cart-shopping text-primary"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger"
                                style="font-size: 10px;">
                                {{ count($cart) }}
                            </span>
                        </button>
                    </a>

                    <div class="dropdown">
                        <a class="nav-link text-black fw-semibold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-circle bg-light shadow-sm" style="margin-right: 15px;cursor:pointer">
                                @if (Auth::user()->image == null)
                                    <img src="{{ asset('img/defaultUser.jpg') }}" class="rounded-circle"
                                        style="width: 45px;height:45px;" alt="">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-circle"
                                        style="width: 45px;height:45px;" alt="">
                                @endif
                            </div>
                        </a>
                        <ul class="dropdown-menu shadow-sm">
                            <li>
                                <a class="dropdown-item" href="{{ route('user#profilePage') }}">
                                    <i class="fa-regular fa-user me-2"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user#changePasswordPage') }}">
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
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="">
        <div class="container">
            <div class="row my-5">
                <div class="col-8 offset-1">

                    @foreach ($data as $d)
                        @if ($d->status == 1)
                            <div class="alert alert-primary d-flex align-items-center mb-0" role="alert">
                               <div class="me-3"><i class="fa-solid fa-circle-check fa-2x"></i></div>
                               <div class="">
                                We Accepted you in <span class="text-danger">{{ $d->courseName }}</span> course.Now , You are student in
                                <span class="text-danger">{{ $d->courseName }}</span> course.
                               </div>
                            </div>
                            <div class="mb-3 text-end">
                                {{$d->created_at->diffForHumans()}}
                            </div>
                        @endif

                        @if ($d->status == 0)
                            <div class="alert alert-warning d-flex align-items-center mb-0" role="alert">
                                <div class="me-3">
                                    <i class="fa-solid fa-circle-xmark fa-2x text-danger"></i>
                                </div>
                                <div class="">
                                    We're sorry for that! We rejected you  in <span class="text-danger">{{ $d->courseName }}</span> course.We wish you all the best.
                                </div>
                            </div>
                            <div class="mb-3 text-end">
                                {{$d->created_at->diffForHumans()}}
                            </div>
                        @endif

                        
                    @endforeach


                    @if(count($data) == 0) 
                    <div class="card p-3 shadow d-flex justify-content-center align-items-center" style="margin-top:150px;">
                        <h3 class="text-danger fs-1 ">There is no histories!</h3>
                    </div>
                    @endif


                    <div class="mt-3">
                        {{$data->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('css/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

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
    

{{-- jquery cdn  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</html>
