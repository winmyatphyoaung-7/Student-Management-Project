@extends('user.master')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center my-5">
            <div class="card w-50 h-auto p-5 ">
                <div class="card-header text-center" style="background-color:transparent;">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <a onclick="history.back()">
                                <i class="fa-solid fa-circle-left text-black fs-2" ></i>
                            </a>
                        </div>
                        <div style="margin-left: 130px;"><h4>Change Your Password</h4></div>
                    </div>
                </div>

                @if (session('notMatch'))
                    <div class="col-12 alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-trash-check"></i></strong> {{ session('notMatch') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('user#changePassword') }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="">Old Password</label>
                        <input type="password" class="form-control @error('oldPassword') is-invalid @enderror mb-0"
                            name="oldPassword" placeholder="Enter your old password...">
                        @error('oldPassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror mb-0"
                            name="password" placeholder="Enter your new password...">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="">Confirm New Password</label>
                        <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror mb-0"
                            name="confirmPassword" placeholder="Enter your confirm new password...">
                        @error('confirmPassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-5 ">
                                <button class="btn btn-lg-square w-100 fs-5 btn-info">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection