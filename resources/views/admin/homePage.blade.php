@extends('./admin/master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-3">
                @foreach ($data as $d)
                <div class="card my-5 shadow-sm ">
                    <div class="text-center p-3">
                        <img src="{{ asset('storage/'.$d->image) }}" class="card-img-top img-thumbnail " style="width: 300px;"
                            alt="...">
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title">{{$d->name}}</h5>
                        <p class="card-text">{{$d->description}}</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text ">Category : {{$d->categoryName}}</p>
                            <p class="card-text"><small class="text-muted">Created at {{$d->created_at->diffForHumans()}}</small></p>
                        </div>
                    </div>

                    <div class="card-footer" style="background-color: rgba(244, 244, 244, 0.514)">
                        <div class="d-flex justify-content-around">
                            <div class="btn btn-primary px-3">LIKE {{$d->like}}</div>
                            <div class="btn btn-primary px-3" style="background-color: rgba(255, 0, 0, 0.772);">Comment {{$d->comment}}
                            </div>
                            <div class="btn btn-success px-3">Students {{$d->student}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if (count($data) == 0)
                <div class="card p-5 d-flex justify-content-center align-items-center" style="margin-top:200px;">
                    <h3 class="text-danger">There is no Data!.You need to Create Course</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
