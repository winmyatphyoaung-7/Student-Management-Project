@extends('./admin/master')

@section('content')
    <div class="container my-4">

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-2">
                <h3>Category Lists</h3>
            </div>
            
            <div class="col-6 d-flex">
                <div class="me-3 d-flex align-items-center">
                    <a class="btn me-2  btn-rounded text-white bg-info disabled">Total - {{$data->total()}}</a>
                    <a href="{{ route('category#createPage') }}" type="button"
                        class="btn btn-info btn-rounded shadow-sm d-flex align-items-center me-2"><i
                            class="fa-solid fa-square-plus me-2"></i>Create
                    </a>

                    <a href="{{ route('category#listPage') }}" type="button"
                        class="btn btn-info btn-rounded shadow-sm d-flex align-items-center">All
                    </a>
                </div>
                <form action="{{ route('category#listPage') }}" method="GET">
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
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                        @for ($d=0;$d<count($data);$d++)
                        <tr class="text-center">
                            <td>
                                {{$d+1}}
                            </td>
                            <td>
                                {{$data[$d]->name}}
                            </td>
                            <td>
                                {{$data[$d]->created_at->format('F-j-Y | g:i a')}}
                            </td>
                            <td>
                                {{$data[$d]->updated_at->format('F-j-Y | g:i a')}}
                            </td>

                            <td class="col-2">
                                <a href="{{route('category#editPage',$data[$d]->id)}}" class="btn btn-link fw-bold btn-sm btn-rounded">
                                    Edit
                                </a>
                                <a href="{{route('category#delete',$data[$d]->id)}}"
                                    class="btn deleteCourseBtn btn-link fw-bold btn-sm btn-rounded">
                                    Delete
                                </a>

                            </td>
                        </tr>
                        @endfor
                    

                </tbody>
            </table>

            <div class="mt-3">
                {{ $data->links() }}
            </div>

            @if (count($data) == 0)
                <div class="card p-5 d-flex justify-content-center align-items-center" style="margin-top:200px;">
                    <h3 class="text-danger">There is no Course!</h3>
                </div>
            @endif
        </div>

    </div>
@endsection


