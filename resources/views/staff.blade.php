@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Edit Staff
@endsection
@section('content')
    <div class="card">
        @if (Session::has('done'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('done') }}
            </div>
        @endif
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table</h4>
                <a href="{{ route('creatstaff') }}" class="btn btn-success my-2 ms-2"
                    style="background-color:#74a5af;color:#fff;">Add new</a>
            </div>
            <h5 class="card-title">Table</h5>
            <table class="table text-center">
                <thead style="color: #1f7a8c">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">excuse</th>
                        <th scope="col">National Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Department</th>
                        <th scope="col">Update</th>
                        <th scope="col">Show</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staff)
                        <tr>
                            <th style="color: #1f7a8c">{{ $staff->id }}</th>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->excuse_number }}</td>
                            <td>{{ $staff->national_id }}</td>
                            <td>{{ $staff->role_staff }}</td>
                            <td>{{ $staff->department->name }}</td>
                            <td> <a href="{{ Route('editstaff', $staff->id) }}" class="btn btn-warning my-2 ms-2" style="background-color:#1f7a8c ; color:#fff">Update</a>
                            </td>
                            <td> <a href="{{ Route('staffshow', $staff->id) }}" class="btn btn-success my-2 ms-2" style="background-color:#74a5af ">Show</a>
                            </td>
                            <td> <a href="{{ Route('destorestaff', $staff->id) }}"
                                    class="btn btn-danger my-2 ms-2" style="background-color:#0f3f49 ; color:#fff">Delete</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
