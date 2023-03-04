@extends('./admin/master')

@section('content')
    <div class="container my-4">

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-2">
                <h3>Admin Lists</h3>
            </div>

            <div class="col-6 d-flex">
                <div class="me-3 d-flex align-items-center">
                    <a class="btn me-2  btn-rounded text-white bg-info disabled">Total - {{ count($data) }}</a>

                    <a href="{{ route('student#listPage') }}" type="button"
                        class="btn btn-info btn-rounded shadow-sm d-flex align-items-center">All
                    </a>
                </div>
                <form action="{{ route('user#listPage') }}" method="GET">
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

                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Study At</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($d = 0; $d < count($data); $d++)
                        <tr class="text-center">
                            <td class="col-2">
                                @if ($data[$d]->image == null)
                                    <img src="{{ asset('img/defaultUser.jpg') }}" style="width: 100px!important;"
                                        class="img-thumbnail w-100" width="100px" alt="">
                                @else
                                    <img src="{{ asset('storage/' . $data[$d]->image) }}" style="width: 100px!important;"
                                        class="img-thumbnail w-100" alt="">
                                @endif
                            </td>
                            <td>
                                <input type="hidden" id="userId" value="{{$data[$d]->id}}">
                                {{ $data[$d]->userName }}
                            </td>
                            <td>
                                {{ $data[$d]->userEmail }}
                            </td>
                            <td>
                                {{ $data[$d]->userPhone }}
                            </td>

                            <td>
                                {{ $data[$d]->userAddress }}
                            </td>

                            <td class="">
                                {{$data[$d]->courseName}}
                            </td>
                        </tr>
                    @endfor


                </tbody>
            </table>

            <div class="">
                {{$data->links()}}
            </div>
        </div>

    </div>
@endsection
