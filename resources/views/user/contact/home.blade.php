@extends('user.master')

@section('content')
    <div class="container" style="margin-bottom: 200px;">


        <div class="row my-5 ">
            <div class="col-10 offset-1 ">



                <div class="mb-2">
                    <h2 class="text-center">Contact Us</h2>
                </div>
                <form action="{{route("user#contact")}}" method="POST">
                    @csrf

                    <div class="row">
                        @if (session('sendSuccess'))
                            <div class="col-6 offset-6 alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="fa-solid fa-check me-2"></i></strong> {{ session('sendSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-5 offset-1">
                            <label for="a">Name</label>
                            <input type="text" name="contactName" id="a"
                                class="form-control @error('contactName') is-invalid @enderror"
                                placeholder="Enter your Name..." value="{{ old('contactName') }}">

                            @error('contactName')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-5 offset-1">
                            <label for="b">Email</label>
                            <input type="email" name="contactEmail" id="b"
                                class="form-control @error('contactEmail') is-invalid @enderror"
                                placeholder="Enter your email..." value="{{ old('contactEmail') }}">

                            @error('contactEmail')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-5 offset-1">
                            <label for="d">Phone Number</label>
                            <input type="text" name="contactNumber" id="d"
                                class="form-control @error('contactNumber') is-invalid @enderror"
                                placeholder="Enter your Number..." value="{{ old('contactNumber') }}">

                            @error('contactNumber')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-5 offset-1">
                            <label for="e">Address</label>
                            <input type="text" name="contactAddress" id="e"
                                class="form-control @error('contactAddress') is-invalid @enderror"
                                placeholder="Enter your Address..." value="{{ old('contactAddress') }}">

                            @error('contactAddress')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="offset-1 col-11">
                            <label for="c">Message</label>
                            <textarea name="contactMessage" id="c" class="form-control @error('contactMessage') is-invalid @enderror"
                                cols="30" rows="10" placeholder="Enter your Message...">{{ old('contactMessage') }}</textarea>

                            @error('contactMessage')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 offset-9">
                            <button type="submit" class="w-100 btn btn-lg btn-dark text-white" style="border-top-left-radius: 50px;">Send
                                Message</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container-fluid p-5 mt-5  bg-black" style="border-top-left-radius: 80px;">
        <div class="row">
            <div class="col-xl-4 mb-5 col-12 d-flex justify-content-center">
                <div>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/codeLab.jpg') }}" width="60px" class="rounded-circle" alt="">
                        <h2 class="headline text-white ms-3">Code Lab</h2>
                    </div>
                    <div class="mt-4 ms-4 headline">
                        <i class="fa-brands fa-twitter me-4" style="color: #ffffff;font-size: 25px;"></i>
                        <i class="fa-brands fa-github me-4" style="color: #ffffff;font-size: 25px;"></i>
                        <i class="fa-brands fa-youtube me-4" style="color: #ffffff;font-size: 25px;"></i>
                        <i class="fa-brands fa-telegram me-4" style="color: #ffffff;font-size: 25px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 mb-4 d-flex justify-content-center">
                <div>
                    <h6 class="text-white mb-4 headline">Product</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Database</div>
                        <div>Auth</div>
                        <div>Storage</div>
                        <div>Functions</div>
                        <div>Pricing</div>
                        <div>Beta</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 mb-5 d-flex justify-content-center">
                <div>
                    <h6 class="text-white mb-4 headline">Resources</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Database</div>
                        <div>Auth</div>
                        <div>Storage</div>
                        <div>Functions</div>
                        <div>Pricing</div>
                        <div>Beta</div>
                        <div>Privacy Policy</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 d-flex justify-content-center">
                <div class="headline">
                    <h6 class="text-white mb-4 headline">Developers</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Documentation</div>
                        <div>API Refrence</div>
                        <div>Guides</div>

                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 d-flex justify-content-center">
                <div>
                    <h6 class="text-white mb-4 headline">Company</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Blog</div>
                        <div>Open Source</div>
                        <div>Careers</div>
                        <div>Human.txt</div>
                        <div>Lawyears.txt</div>
                        <div>Security.txt</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
