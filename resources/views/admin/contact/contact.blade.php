@extends('admin.master')

@section('content')
<div class="container my-4">

    <div class="row d-flex justify-content-between align-items-center">
        <div class="col-2">
            <h3>Category Lists</h3>
        </div>
            
        <div class="col-6 d-flex">
            <div class="me-3 d-flex align-items-center">
                <a class="btn me-2  btn-rounded text-white bg-info disabled">Total - {{$data->total()}}</a>

                <a href="{{ route('contact#listPage') }}" type="button"
                    class="btn btn-info btn-rounded shadow-sm d-flex align-items-center">All
                </a>
            </div>
            <form action="{{ route('contact#listPage') }}" method="GET">
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
        <table class="table align-middle mb-0 bg-white" style="table-layout: fixed;">
            <thead class="bg-light">
                <tr class="text-center">
        
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="col-3">Message</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    
                  
                    @for ($d=0;$d<count($data);$d++)
                    <tr class="text-center">
                        
                        <td>
                            {{$data[$d]->name}}
                        </td>
                        <td class="text-break">
                            {{$data[$d]->email}}
                        </td>
                        <td>
                            {{$data[$d]->phone}}
                        </td>
                        <td class="col-3">
                           <div class="text-break font-monospace">
                            {{$data[$d]->content}}
                           </div>
                        </td>

                        <td>
                            <a href="{{route('contact#delete',$data[$d]->id)}}"
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
                <h3 class="text-danger">There is no Data!</h3>
            </div>
        @endif
    </div>

</div>
@endsection