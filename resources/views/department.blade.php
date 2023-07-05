@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Department
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A
                    Table</h4>
                <a href="{{ route('createdepartment') }}" class="btn btn-success my-2 ms-2"
                    style="background-color:#74a5af;color:#fff;">Add new</a>
            </div>
            <h5 class="card-title">Table</h5>
            <table class="table text-center">
                <thead>
                    <tr style="color: #1f7a8c">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Admin Name</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($department as $data)
                        <tr>
                            <th style="color: #1f7a8c">{{ $data->id }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->admin->name }}</td>
                            <td> <a href="{{ Route('editdepartment', $data->id) }}"
                                    class="btn btn-warning my-2 ms-2" style="background-color:#1f7a8c ; color:#fff ">Update</a></td>
                            <td> <a href="{{ Route('destoredepartment', $data->id) }}"
                                    class="btn btn-danger my-2 ms-2" style="background-color:#95a2a4 ; color:#fff">Delete</a></td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
