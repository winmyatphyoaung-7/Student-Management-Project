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
                    {{-- <a href="{{ route('category#createPage') }}" type="button"
                        class="btn btn-info btn-rounded shadow-sm d-flex align-items-center me-2"><i
                            class="fa-solid fa-square-plus me-2"></i>Create
                    </a> --}}

                    <a href="{{ route('user#listPage') }}" type="button"
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
                        <th></th>
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
                                {{ $data[$d]->name }}
                            </td>
                            <td>
                                {{ $data[$d]->email }}
                            </td>
                            <td>
                                {{ $data[$d]->phone }}
                            </td>

                            <td>
                                {{ $data[$d]->address }}
                            </td>

                            <td class="col-2">
                                <select name="role" class="form-control statusChange">
                                    <option value="user" @if ($data[$d]->role == 'user') selected @endif>User</option>
                                    <option value="admin"@if ($data[$d]->role == 'admin') selected @endif>Admin</option>
                                </select>
                            </td>
                        </tr>
                    @endfor


                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //change status

            $('.statusChange').change(function() {
                $currentRole = $(this).val();
                $parentNode = $(this).parents("tr");
                $userId = $parentNode.find('#userId').val();

                $.ajax({
                    type: 'get',
                    url: '/admin/userChangeRole',
                    data: {
                        'userId': $userId,
                        'role': $currentRole,
                    },
                    dataType: 'json',
                })

                location.reload(true);
            })
        })
    </script>
@endsection
