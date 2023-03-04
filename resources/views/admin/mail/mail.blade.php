<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap/dist/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container bg-info">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-center">Welcome to Our Website ! {{$user->name}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p class="mt-5 text-secondary">We are exciting to see you in our web application.Have a great day!</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-end">
                <p class="mt-5 text-end">
                    <a href="{{route('user#verifyEmail',$user->verifyUser->token)}}">Click here</a> to verify your email.
                </p>
            </div>
        </div>
    </div>
</body>
</html>