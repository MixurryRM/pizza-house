@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-index">
        <div class="d-flex justify-content-between mt-3">
            <div>
                <h1>User Lists</h1>
            </div>
            <div class="d-flex mt-1">
                <div class="mt-1">
                    <h3>Total - {{ $users->total() }}</h3>
                </div>
                <div>
                    {{-- <select class="sortingRole w-125 text-center ms-3 form-control">
                        <option value="">Switch Role...</option>
                        <option value="user">User</option>
                        <option value="staff">Staff</option>
                    </select> --}}
                    <div class="container">
                        <form action="{{ route('users.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Users ..." name="search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
            <tbody id="dataList">
                @foreach ($users as $user)
                    <tr>
                        <input type="hidden" id="userId" value="{{ $user->id }}">
                        <th scope="row">{{ $user->id }}</th>
                        <td><img src="/image/default.webp" style="width: 50px;height:50px;" alt=""></td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <select class="statusChange form-control w-50 text-center text-white"
                                style="background-color: #5e2195;">
                                <option class="bg-select" value="user" data-role="{{ $user->role }}"
                                    @if ($user->role == 'user') selected @endif>User</option>
                                <option class="bg-select" value="staff" data-role="{{ $user->role }}"
                                    @if ($user->role == 'staff') selected @endif>Staff</option>
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

                $data = {
                    'userId': $userId,
                    'role': $currentStatus
                };

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/users/change/role',
                    data: $data,
                    dataType: 'json'
                })

                location.reload();
            })

            // $('.sortingRole').change(function() {
            //     $currentRole = $(this).val();
            //     if ($currentRole == 'user') {
            //         $.ajax({
            //             type: 'get',
            //             url: 'http://localhost:8000/users/switch/role',
            //             data: {
            //                 'role': 'user'
            //             },
            //             dataType: 'json',
            //             success: function(res) {
            //                 $list = '';
            //                 for (let $i = 0; $i < res.length; $i++) {
            //                     $list += `
        //                         <tr>
        //                             <input type="hidden" id="userId" value="${res[$i].id}">
        //                             <th scope="row">${res[$i].id}</th>
        //                             <td><img src="/image/default.webp" style="width: 50px;height:50px;" alt=""></td>
        //                             <td>${res[$i].name}</td>
        //                             <td>
        //                                 <select class="statusChange form-control w-50 text-center text-white"
        //                                     style="background-color: #5e2195;">
        //                                     <option value="user" class="bg-select">User</option>
        //                                     <option value="staff" class="bg-select">Staff</option>
        //                                 </select>
        //                             </td>
        //                         </tr>`;
            //                 }
            //                 $('#dataList').html($list);
            //             }
            //         })
            //     } else if ($currentRole == 'staff') {
            //         $.ajax({
            //             type: 'get',
            //             url: 'http://localhost:8000/users/switch/role',
            //             data: {
            //                 'role': 'staff'
            //             },
            //             dataType: 'json',
            //             success: function(res) {
            //                 $list = '';
            //                 for (let $i = 0; $i < res.length; $i++) {
            //                     $list += `
        //                         <tr>
        //                             <input type="hidden" id="userId" value="${res[$i].id}">
        //                             <th scope="row">${res[$i].id}</th>
        //                             <td><img src="/image/default.webp" style="width: 50px;height:50px;" alt=""></td>
        //                             <td>${res[$i].name}</td>
        //                             <td>
        //                                 <button type="button" class="btn w-50 text-center text-white"
        //                                 style="background-color: #5e2195;">Staff</button>
        //                             </td>
        //                         </tr>`;
            //                 }
            //                 $('#dataList').html($list);
            //             }
            //         })
            //     } else if ($currentRole == ''){
            //         location.reload();
            //     }
            // })
        });
    </script>
@endsection
