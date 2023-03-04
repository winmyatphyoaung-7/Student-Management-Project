@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class=""></div>
            <h4 class="text-center"> Course Create Page</h4>
        </div>

        <div class="col-10 mx-auto my-5">

            <form action="{{ route('course#create') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" name="courseName"
                        class="mb-0 form-control @error('courseName') is-invalid @enderror" id="name"
                        placeholder="Enter Course Name..." value="{{old('courseName')}}">
                    @error('courseName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Course Description</label>
                    <textarea name="courseDescription" class="form-control mb-0 @error('courseDescription') is-invalid @enderror"
                        id="description" cols="30" rows="10" placeholder="Enter Course Description...">{{old('courseDescription')}}</textarea>
                    @error('courseDescription')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Category</label>
                    <select class="form-select @error('courseCategory') is-invalid @enderror" name="courseCategory" aria-label="Default select example">
                        <option value="" selected>Choose Your Category</option>
                        @foreach ($data as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>

                    @error('courseCategory')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="coursePrice"
                        class="form-control mb-0 @error('coursePrice') is-invalid @enderror" id="price"
                        placeholder="Enter Course Price..." value="{{old('coursePrice')}}">
                    @error('coursePrice')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Limited Quatity</label>
                    <input type="number" name="courseQty"
                        class="form-control mb-0 @error('courseQty') is-invalid @enderror" id="price"
                        placeholder="Enter Course Limited Quatity..." value="{{old('courseQty')}}">
                    @error('courseQty')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label fw-bold">Duration</label>
                    <input type="number" name="courseDuration"
                        class="form-control mb-0 @error('courseDuration') is-invalid @enderror" id="duration"
                        placeholder="Enter Course Duration..." value="{{old('courseDuration')}}">
                    @error('courseDuration')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Start Date</label>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Image</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <input type="date" name="courseStartDate"
                                class="form-control mb-0 @error('courseStartDate') is-invalid @enderror" id="startDate" value="{{old('courseStartDate')}}">
                            @error('courseStartDate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="file" name="courseImage" class="form-control @error('courseImage') is-invalid @enderror" value="{{old('courseImage')}}">
                            @error('courseImage')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4 text-end">
                            <button type="submit" class="btn shadow btn-info px-5">Create <i
                                    class="fa-solid fa-circle-chevron-right ms-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
