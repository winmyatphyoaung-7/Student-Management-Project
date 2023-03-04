<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                <h4>Reset Password</h4>
                <hr>

                <form action="{{route("reset#password")}}" method="POST" autocomplete="off">
                    @csrf

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <input type="hidden" name="token" value="{{$token}}">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email"
                            value="{{ $email ?? old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password"
                            value="{{ old('password') }}">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password confirm"
                            value="{{ old('password_confirmation') }}">
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>

                    <br>

                    <a href="{{route('admin#loginPage')}}">Login</a>
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>
