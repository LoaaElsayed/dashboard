@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Subject
@endsection
@section('content')
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-primary">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table
                </h4>
                <a href="{{ route('creatsubject') }}" class="btn btn-success my-2 ms-2"
                    style="background-color:#74a5af;color:#fff;">Add new</a>
            </div>
            <h5 class="card-title">Table</h5>
            {{--  <!--Table -->  --}}
            <table class="table text-center">
                <thead style="color: #1f7a8c">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Academy year</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Department</th>
                        <th scope="col">Name Staff</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($subject as $date)
                    <tr>
                        <td style="color: #1f7a8c">{{ $loop->iteration }}</td>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->academy_year }}</td>
                        <td>{{ $date->semester }}</td>
                        <td>{{ $date->department->name }}</td>
                        <td>{{ $date->staff->name }}</td>
                        <td>
                            <a href="{{ route('editsubject', $date->id) }}">
                                <button class="btn btn-warning" style="background-color:#1f7a8c ; color:#fff">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('destoresubject', $date->id) }}">
                                <button class="btn btn-danger" style="background-color:#0f3f49 ; color:#fff">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
