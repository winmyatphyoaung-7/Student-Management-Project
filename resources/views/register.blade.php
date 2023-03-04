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

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('./css/login.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row  d-flex justify-content-center align-items-center bg-sm-color"
            style="background-color: #D0EAFF;">
            <div class="col-md-8 col-lg-5 col-xl-4 col-sm-12 my-5">
                <div class="row bg-white p-4 rounded shadow-md">
                    <div class="d-flex justify-content-center mb-5">
                        <div class="">
                            <img src="./asset/img/undraw_authentication_re_svpt.svg" width="30px" alt="">
                        </div>
                        <div class="">
                            <h3 class="ms-3" style="color: gray;">Registration Form</h3>
                        </div>
                    </div>

                    
                    <form action="{{route('user#store')}}" method="POST">
                        
                        @csrf

                        
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px;">
                                    <i class="fa-solid fa-user icon-register" style="color: gray;"></i>
                                </div>
                                <div class="w-100">
                                    <div class="form-floating">
                                        <input type="text" name="username" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">UserName</label>
                                    </div>
                                    @error('username')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            
                            </div>

                            
                        

                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 60px;">
                                <i class="fa-solid fa-envelope icon-register" style="color: gray;"></i>
                            </div>
                            

                            <div class="w-100">
                                <div class="form-floating ">
                                    <input type="email" name="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 60px;">
                                <i class="fa-solid fa-phone icon-register" style="color: gray;"></i>
                            </div>

                            <div class="w-100">
                                <div class="form-floating">
                                    <input type="phone" name="phone" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Phone</label>
                                </div>
                                @error('phone')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 60px;">
                                <i class="fa-solid fa-location-dot icon-register" style="color: gray;"></i>
                            </div>
                            

                            <div class="w-100">
                                <div class="form-floating">
                                    <textarea class="form-control" name="address" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingInput">Address</label>
                                </div>
                                @error('address')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 60px;">
                                <i class="fa-solid fa-venus-mars icon-register" style="color: gray;"></i>
                            </div>
                            <div class="w-100">
                                <select class="form-select" name="gender" aria-label="Default select example">
                                    <option value="" selected>Choose Your Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                @error('gender')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div style="width: 60px;">
                                <i class="fa-solid fa-lock icon-register" style="color: gray;"></i>
                            </div>

                            <div class="w-100">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Password</label>
                                </div>
                                @error('password')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div style="width:60px;">
                                <i class="fa-solid fa-check icon-register" style="color: gray;"></i>
                            </div>

                            <div class="w-100">
                                <div class="form-floating">
                                    <input type="password" name="confirmPassword" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Confirm Password</label>
                                </div>
                                @error('confirmPassword')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="col-12 btn px-4 py-2 btn-primary rounded-pill fs-4 ">Sign Up</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</html>
