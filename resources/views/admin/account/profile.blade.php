@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="card p-3 w-50">

                <div class="card-header d-flex align-items-center ">
                    <div class="">
                        <a href="{{route('admin#homePage')}}">
                            <i class="fa-solid fa-circle-left text-black fs-2"></i>
                        </a>
                    </div>
                    <div class="mx-auto">
                        <h4>Your Account Profile</h4>
                    </div>
                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-center">
                        <div class="rounded-circle bg-light shadow-sm" style="width:150px;height:150px">
                            @if (Auth::user()->image == null)
                                <img src="{{ asset('img/defaultUser.jpg') }}" class="rounded-circle w-100" alt="">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-circle w-100"
                                    alt="">
                            @endif
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                        <div class="">
                            <h4>{{ $dataProfile[0]->name }}</h4>
                        </div>
                        <div class="mt-1">
                            <h6 style="color: lightgray;font-size:15px;">{{ $dataProfile[0]->email }}</h6>
                        </div>
                    </div>

                    <div class="mt-5 d-flex justify-content-around">
                        <div class="">
                            <i class="fa-solid fa-phone me-2"></i>
                            <small>{{ $dataProfile[0]->phone }}</small>
                        </div>

                        <div class="">
                            <i class="fa-solid fa-house-chimney me-2"></i>
                            <small>{{ $dataProfile[0]->address }}</small>
                        </div>

                        <div class="">
                            <i class="fa-solid fa-venus-mars me-2"></i>
                            <small>{{ $dataProfile[0]->gender }}</small>
                        </div>
                    </div>

                    <div class=" mt-5 text-center">
                        <a href="{{ route('admin#confirmPasswordPage') }}"
                            class="btn btn-outline-info btn-info bg-info text-white fw-bold">
                            <i class="fa-solid fa-pen-to-square me-2"></i>
                            Edit Profile
                        </a>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
