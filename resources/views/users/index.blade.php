@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-index">
        <div class="d-flex justify-content-between">
            <div class=""><h1>User Lists</h1></div>
            <div class=""><h3>Total - {{ $users->total() }}</h3></div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <input type="hidden" id="userId" value="{{ $user->id }}">
                        <th scope="row">{{ $user->id }}</th>
                        <td><img src="/image/default.webp" style="width: 50px;height:50px;" alt=""></td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <select class="statusChange form-control w-50 text-center text-white" style="background-color: #5e2195;">
                                <option value="user" class="bg-select">User</option>
                                <option value="staff" class="bg-select">Staff</option>
                                <option value="manager" class="bg-select">Manager</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            <p>{{ $users->links() }}</p>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            $('.statusChange').change(function() {
                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $userId = $parentNode.find('#userId').val();

                $data = {'userId' : $userId , 'role' : $currentStatus};

                $.ajax({
                    type : 'get',
                    url : 'http://localhost:8000/users/change/role',
                    data : $data,
                    dataType : 'json'
                })

                location.reload();

            })
        });
    </script>
@endsection
