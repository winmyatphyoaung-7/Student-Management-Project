<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset("css/login.css")}}">
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100 d-flex justify-content-center align-items-center bg-sm-color" style="background-color: #D0EAFF;">
            <div class="col-md-8 col-sm-12">
                <div class="row bg-white p-5 rounded shadow-md">
                    <div class="col-lg-12 col-xl-6">
                        <div class="col-12 text-center mb-5">
                            <h2>Welcome!</h2>
                        </div>


                        @if(session('verifyYourEmail'))

                          <div class="col-12 alert alert-warning alert-dismissible fade show" role="alert">
                               <strong><i class="fa-solid fa-trash-check"></i></strong>{{session('verifyYourEmail')}}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        @endif

                        @if(session('success'))

                          <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                               <strong><i class="fa-solid fa-trash-check"></i></strong>{{session('success')}}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        @endif

                        @if(session('clickEmail'))

                          <div class="col-12 alert alert-info alert-dismissible fade show" role="alert">
                               <strong><i class="fa-solid fa-trash-check"></i></strong>{{session('clickEmail')}}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        @endif

                        @if(session('error'))

                          <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                               <strong><i class="fa-solid fa-trash-check"></i></strong>{{session('error')}}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        @endif

                        <form action="{{route('user#validate')}}" method="POST">
                            @csrf
                            <div class="from-group mb-3">
                                <label for="forEmail">Email</label>
                                <input type="email" name="email" class="form-control mt-1 " id="forEmail">
                            </div>

                            <div class="from-group mb-3">
                                <label for="forPassword">Password</label>
                                <input type="password" name="password" class="form-control mt-1" id="forPassword">
                            </div>

                            <div class="from-group mb-3">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-6  col-12">
                                        <input type="checkbox" class="form-check-input" name="" id="forCheckbox">
                                        <label for="forCheckbox" class="form-check-label">Remember Me</label>
                                    </div>
                                    <div class="col-md-6 col-12 mt-md-0 mt-sm-1">
                                        <a href="{{route('forget#passwordForm')}}" class="text-decoration-none">
                                            Forget Password?
                                        </a>
                                    </div>
                                </div>

                                <div class="col-10 offset-1 mt-4">
                                    <button type="submit" class="btn w-100 py-2 btn-md btn-primary">
                                        <strong>Login</strong>
                                    </button>
                                </div>
                            
                            </div>
                        </form>

                        <hr>

                        <div class="text-center">
                            <small>
                                Don't have an account? 
                                <a href="{{route('admin#registerPage')}}" class="ms-1">Register</a>
                            </small>
                        </div>


                    </div>
                    <div class="col-xl-5 d-image-none offset-xxl-1">
                        <img src="{{asset("./img/undraw_access_account_re_8spm.svg")}}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

</html>