@extends('./admin/master')

@section('content')
    <div class="container my-4">

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-2">
                <h3>Request Lists</h3>
            </div>
            
            <div class="col-6 d-flex">
                <div class="me-3 d-flex align-items-center">
                    <a class="btn me-2  btn-rounded text-white bg-info disabled">Total - {{$data->total()}}</a>

                    <a href="{{ route('request#listPage') }}" type="button"
                        class="btn btn-info btn-rounded shadow-sm d-flex align-items-center">All
                    </a>
                </div>
                <form action="{{ route('request#listPage') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" name="key" id="form1" class="form-control"
                                value="{{ request('key') }}" />
                            <label class="form-label" for="form1">Search</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <div class="my-5">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($data as $d)
                        <tr class="text-center" style="border-bottom: 3px dotted rgba(0, 0, 0, 0.094);">

                            <td>{{$d->userName}}</td>
                            <td>{{$d->userEmail}}</td>
                            <td>{{$d->userPhone}}</td>
                            <td>{{$d->courseName}}</td>
                            <td>{{$d->created_at->diffForHumans()}}</td>


                            <td class="col-2">
                                <a href="{{route('request#accept',['id' => $d->id,'userId' => $d->user_id])}}" class="btn btn-link fw-bold btn-sm btn-rounded">
                                    <i class="fa-solid fa-check me-2 mb-1 text-success"></i> Accept
                                </a>
                                <a href="{{route('request#reject',['id' => $d->id,'userId' => $d->user_id])}}" class="btn deleteCourseBtn btn-link fw-bold btn-sm btn-rounded">
                                    <i class="fa-solid fa-circle-xmark me-2 text-danger"></i> Reject
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        
                    

                </tbody>
            </table>

            <div class="mt-3">
                {{ $data->links() }}
            </div>

            @if (count($data) == 0)
                <div class="card p-5 d-flex justify-content-center align-items-center" style="margin-top:200px;">
                    <h3 class="text-danger">There is no Requests!</h3>
                </div>
            @endif
        </div>

    </div>
@endsection


