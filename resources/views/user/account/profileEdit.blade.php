@extends('user.master')

@section('content')
    <div class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="card h-auto w-100 pt-3 p-5">
                <div class="card-header text-center fs-4" style="background-color: transparent;p">
                    Profile Edit Page
                </div>

                <form action="{{route("user#updateProfile")}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mt-3 d-flex justify-content-around">
                        <div class="col-4">
                            <div class="text-center rounded-circle">
                                @if (Auth::user()->image == null)
                                    <img src="{{ asset('img/defaultUser.jpg') }}" class=" shadow-sm  rounded-circle"
                                        alt="" width="200px" height="200px">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" class=" shadow-sm  rounded-circle" width="200px" height="200px" alt="">
                                @endif

                                <div class="mt-2 text-center">
                                    <input type="file" name="profileImage" class="form-control @error('profileImage') is-invalid  @enderror" id="">

                                    @error('profileImage')
                                    <small class="invalid-feedback">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-address-card me-2"></i>Update Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Name</label>
                                <input type="text" name="profileName"
                                    class="form-control mb-0 @error('profileName') is-invalid @enderror" id="name"
                                    placeholder="Enter New Name..." value="{{$data[0]->name}}">
                                @error('profileName')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" name="profileEmail"
                                    class="form-control mb-0 @error('profileEmail') is-invalid @enderror" id="email"
                                    placeholder="Enter New Email..." value="{{$data[0]->email}}">
                                @error('profileEmail')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-bold">Phone</label>
                                <input type="number" name="profilePhone"
                                    class="form-control mb-0 @error('profilePhone') is-invalid @enderror" id="phone"
                                    placeholder="Enter New Number..." value="{{$data[0]->phone}}">
                                @error('profilePhone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <label for="gender" class="form-label fw-bold">Gender</label>
                                <select class="form-select" name="profileGender" aria-label="Default select example">
                                    <option value="" selected>Choose Your Gender</option>
                                    <option value="male" @if ($data[0]->gender == 'male') selected  @endif>Male</option>
                                    <option value="female" @if ($data[0]->gender == 'female') selected  @endif>Female</option>
                                </select>

                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="">
                                <label for="address" class="form-label fw-bold">Address</label>
                                <textarea name="profileAddress" class="form-control @error('profileAddress') is-invalid @enderror" id="address"
                                    cols="30" rows="10" placeholder="Enter New Address...">{{$data[0]->address}}</textarea>
                                @error('profileAddress')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
