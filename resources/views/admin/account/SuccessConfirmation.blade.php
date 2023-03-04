@extends('admin.master')

@section('content')

<div class="container">
    <div class="row mt-5 d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card w-50 p-5">
            <h1 class="text-center">Confirmation success!</h1>
            <div class="col-12 d-flex justify-content-center">
                <a class="btn col-4 btn-info " href="{{route("admin#updateProfilePage")}}">
                    Next
                </a>
            </div>
        </div>
    </div>
</div>
    
@endsection