@extends('admin.master')

@section('content')
<div class="container ">
    <div class="row d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card col-5 p-5 pt-0">
            <div class="card-header text-center">
                <h3>Create Your Course</h3>
            </div>

            <form action="{{route('category#create')}}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="categoryName"
                        class="mb-0 form-control @error('categoryName') is-invalid @enderror" id="name"
                        placeholder="Enter Category Name...">
                    @error('categoryName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="">
                    <button class="w-100 btn btn-info fs-6">Create<i class="fa-solid fa-circle-right ms-3"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection