<?php
use Illuminate\Support\Str;
?>

@extends('user.master')

@section('content')
    

    <div class="container-fluid" style="background-color:#F8F9FA;">
        <div class="row">
            <div class="col-2 shadow position-sticky left-0" id="leftNavbar" style="overflow-y: auto;height:100%;top:0px;">
                <ul class="nav d-flex flex-column">

                    @foreach ($data as $d)
                        <li class="nav-item rounded p-1 text-center my-3 left-nav-button"
                            style="background-color:rgb(119, 119, 241);">
                            <a class="nav-link text-white" href="{{ route('course#filter', $d->id) }}">{{ $d->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-10">
                <div class="p-3 px-0" class="addtopForAllStatus" id="allStatusBar"
                    style="position:sticky;top:0px;left:0;z-index:1;background-color:#F8F9FA;">

                    <div class="text-center">
                        <a href="{{ route('user#homePage') }}" id=""
                            class="btn-change btn nav-button btn-outline-primary text-black">All</a>
                        <a href="{{ route('course#savedPage') }}" id=""
                            class="btn-change btn nav-button btn-outline-info text-black">Saved</a>
                    </div>
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center my-3">
                    @if (Session::get('status-button') == "all")    
                        @foreach ($course as $c)
                            <div class="card shadow-sm p-3 my-3">
                                <div class="row">
                                    <div class="col-3 card-img-area d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $c->image) }}" class="w-100 h-100 img-thumbnail"
                                            alt="" style="object-fit: contain;object-position:center;">
                                    </div>
                                    <div class="col-7">
                                        <small style="color: gray;">Posted on
                                            {{ $c->created_at->format('F-j-Y | g:i a') }}</small>
                                        <h4 class="fw-bold mt-1" style="color: rgba(0, 0, 0, 0.772)">
                                            {{ $c->name }}
                                        </h4>

                                        <p class="mt-3">
                                            {{ Str::limit($c->description, 80) }}
                                            <a href="" class="text-decoration-none fw-normal">..... For more Click Detail
                                            </a>
                                        </p>

                                        <em class="fw-semibold">{{ $c->price }} Kyats</em>
                                    </div>
                                    <div class="col-2 d-flex flex-column justify-content-center align-items-center">
                                        <div class="">
                                            <a href="{{ route('course#detailPage', $c->id) }}">
                                                <button class="btn btn-change btn-info text-white">
                                                    <i class="fa-solid fa-circle-info me-2"></i>Details
                                                </button>
                                            </a>
                                        </div>

                                        <div class=" mt-3">
                                            <a href="{{ route('course#saved', $c->id) }}">
                                                <button class="btn btn-change btn-info text-white saved-button">
                                                    <i class="fa-solid fa-bookmark me-2"></i>Saved
                                                </button>
                                            </a>
                                        </div>

                                        <div class=" mt-3">
                                            <a href="{{ route('course#unsaved', $c->id) }}">
                                                <button class="btn btn-change btn-info text-white d-none unsaved-button">
                                                    <i class="fa-solid fa-bookmark me-2"></i>Unsaved
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($course as $c)
                            <div class="card shadow-sm p-3 my-3">
                                <div class="row">
                                    <div class="col-3 card-img-area d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $c->image) }}" class="w-100 h-100 img-thumbnail"
                                            alt="" style="object-fit: contain;object-position:center;">
                                    </div>
                                    <div class="col-7">
                                        <small style="color: gray;">Posted on
                                            {{ $c->created_at->format('F-j-Y | g:i a') }}</small>
                                        <h4 class="fw-bold mt-1" style="color: rgba(0, 0, 0, 0.772)">
                                            {{ $c->name }}
                                        </h4>

                                        <p class="mt-3">
                                            {{ Str::limit($c->description, 80) }}
                                            <a href="" class="text-decoration-none fw-normal">..... For more Click Detail
                                            </a>
                                        </p>

                                        <em class="fw-semibold">{{ $c->price }} Kyats</em>
                                    </div>
                                    <div class="col-2 d-flex flex-column justify-content-center align-items-center">
                                        <div class="">
                                            <a href="{{ route('course#detailPage', $c->id) }}">
                                                <button class="btn btn-change btn-info text-white">
                                                    <i class="fa-solid fa-circle-info me-2"></i>Details
                                                </button>
                                            </a>
                                        </div>

                                        <div class=" mt-3">
                                            <a href="{{ route('course#saved', $c->id) }}">
                                                <button class="btn btn-change btn-info text-white saved-button">
                                                    <i class="fa-solid fa-bookmark me-2"></i>Saved
                                                </button>
                                            </a>
                                        </div>

                                        <div class=" mt-3">
                                            <a href="{{ route('course#unsaved', $c->id) }}">
                                                <button class="btn btn-change btn-info text-white d-none unsaved-button">
                                                    <i class="fa-solid fa-bookmark me-2"></i>Unsaved
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    {{-- {{Session::get('status-button')}} --}}

                    @if (count($course) == 0)
                        <div class="d-flex my-5 justify-content-center align-items-center">
                            <div class="shadow p-5 text-danger">
                                <h1>There is no course ! </h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptFile')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
