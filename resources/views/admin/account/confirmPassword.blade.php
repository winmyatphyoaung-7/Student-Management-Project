@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center my-5">
            <div class="card p-5 col-5 ">
                <div class="card-header text-center">
                    <h4>Confirm Your Password</h4>
                </div>

                @if (session('notMatch'))
                    <div class="col-12 alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-trash-check"></i></strong> {{ session('notMatch') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin#editPage') }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror mb-0" name="password"
                            placeholder="Enter your password...">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror mb-0"
                            name="confirmPassword" placeholder="Enter your confirm password...">
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
