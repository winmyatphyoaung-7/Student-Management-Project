@extends('admin.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-end" style="height: 80vh;margin-top: 40px;">
        <div class="card p-5 shadow-sm  w-100">
            <div class="text-center">
               <h4>Course Edit Page</h4>
               <hr>
            </div>

            <form action="{{route("course#edit",$data[0]->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-between">
                    <input type="hidden" name="courseId" value="{{$data[0]->id}}">
                    <div class="col-3">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('storage/'.$data[0]->image)}}"  class="img-thumbnail shadow-sm w-75 " alt="">
                        </div>


                        <div class="mt-3">
                            <input type="file" name="courseImage" class="form-control @error('courseImage') is-invalid  @enderror" id="">

                            @error('courseImage')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Course Name</label>
                            <input type="text" name="courseName"
                                class="mb-0 form-control @error('courseName') is-invalid @enderror" id="name"
                                placeholder="Enter Course Name..." value="{{$data[0]->name}}">
                            @error('courseName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="text" name="coursePrice"
                                class="form-control mb-0 @error('coursePrice') is-invalid @enderror" id="price"
                                placeholder="Enter Course Price..." value="{{$data[0]->price}}">
                            @error('coursePrice')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Limited Quatity</label>
                            <input type="number" name="courseQty"
                                class="form-control mb-0 @error('courseQty') is-invalid @enderror" id="price"
                                placeholder="Enter Course Limited Quatity..." value="{{$data[0]->qty}}">
                            @error('courseQty')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="startDate" class="form-label fw-bold">Start Date</label>
                            <input type="date" name="courseStartDate" class="form-control mb-0 @error('courseStartDate') is-invalid @enderror" id="startDate" value="{{$data[0]->start_date}}">
                            @error('courseStartDate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label fw-bold">Duration</label>
                            <input type="number" name="courseDuration" class="form-control mb-0 @error('courseDuration') is-invalid @enderror" id="duration" placeholder="Enter Course Duration..." value="{{$data[0]->duration}}">
                            @error('courseDuration')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-3">
                            <label for="description" class="form-label">Category</label>
                            <select class="form-select @error('courseCategory') is-invalid @enderror" name="courseCategory" aria-label="Default select example">
                                <option value="" selected>Choose Your Category</option>
                                @foreach ($category as $c)
                                    <option value="{{$c->id}}" @if ($c->id == $data[0]->category_id)  selected @endif>{{$c->name}}</option>
                                @endforeach
                            </select>

                            @error('courseCategory')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Course Description</label>
                            <textarea name="courseDescription" class="form-control mb-0 @error('courseDescription') is-invalid @enderror"
                                id="description" cols="30" rows="10" placeholder="Enter Course Description...">{{$data[0]->description}}</textarea>
                            @error('courseDescription')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-info px-5 btn-lg rounded-pill">Update<i class="fa-solid fa-forward ms-2"></i></button>
                        </div>
                    </div>
            
            </div>
            </form>

          
        </div>
    </div>
@endsection
