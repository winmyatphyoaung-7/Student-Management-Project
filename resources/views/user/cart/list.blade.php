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
                            <a class="nav-link text-black" href="{{route('user#homePage')}}">Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('contact#homePage')}}">Contact Me</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">

                    <a href="{{route('register#historyPage')}}" class="text-decoration-none">
                        <div class="me-4 d-flex nav-icon align-items-center justify-content-center rounded-circle">
                            <i class="fa-solid fa-folder fs-5 "></i>
                        </div>
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
                <div class="col-10 offset-1">
                    <table class="table table-striped p-5" style="background-color:#F8F9FA;">
                        <thead>
                            <tr class="text-center" style="border-bottom:15px solid white;">
                                <th scope="col-2">Image</th>
                                <th scope="col-2">Course Name</th>
                                <th scope="col-1">Price</th>
                                <th scope="col-1">Time</th>
                                <th scope="col-1">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($register as $rgs)
                            <tr class="text-center" style="border-bottom:15px solid white;vertical-align: middle;">
                                <td  scope="row">
                                    <img src="{{asset('img/codeLab.jpg')}}" style="width:60px;height:60px;" class="img-thumbnail " alt="">
                                </td>
                                <td>{{$rgs->name}}</td>
                                <td>{{$rgs->price}} Kyats</td>
                                <td>{{$rgs->created_at->diffForHumans()}}</td>
                                <td>
                                    @if ($rgs->status == 0)

                                    <span class="text-warning "> <i class="fa-regular fa-clock me-2"></i> Pending...</span>

                                    @elseif($rgs->status == 1)
                                    <span class="text-success"> <i class="fa-solid fa-check me-2"></i> Accepted...</span>

                                    @elseif ($rgs->status == 2)

                                    <span class="text-danger"> <i class="fa-solid fa-triangle-exclamation me-2"></i> Rejected...</span>

                                    @endif
                                </td>
                                <td>
                                    @if ($rgs->status == 0)
                                    @else
                                    <a href="{{route('cart#delete',$rgs->id)}}">
                                        <i class="fa-solid fa-circle-xmark text-danger fa-2x" style="cursor: pointer"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{$register->links()}}
                    </div>

                    @if(count($register) == 0) 
                    <div class="card p-3 shadow d-flex justify-content-center align-items-center" style="margin-top:150px;">
                        <h3 class="text-danger fs-1 ">There is no cart!</h3>
                    </div>
                    @endif
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
