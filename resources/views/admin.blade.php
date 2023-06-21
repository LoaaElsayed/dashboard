@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Admin
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A
                    Table</h4>
                <a href="{{ route('createadmin') }}" class="btn btn-success my-2 ms-2" style="background-color:#74a5af;color:#fff;">Add
                    new</a>
            </div>
            <h5 class="card-title">Table</h5>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($admin as $date)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $date->id }}</td>
                            <td>{{ $date->name }}</td>
                            <td>{{ $date->email }}</td>
                            <td>{{ $date->role->name }}</td>
                            <td>
                                <a href="{{ Route('editadmin', $date->id) }}">
                                    <button class="btn btn-warning">UPdate</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ Route('destoreadmin', $date->id) }}">
                                    <button class="btn btn-danger">delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            {{--  <!-- End Table -->  --}}
        </div>
    </div>
@endsection
