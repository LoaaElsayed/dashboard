@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    'Student'
@endsection
@section('content')
    <div class="card">
        @if (Session::has('done'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('done') }}
            </div>
        @endif
        <div class="card-body">
            <h5 class="card-title">Table</h5>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Academy Code</th>
                        <th scope="col">Section</th>
                        <th scope="col">Academy year</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($student as $date)
                    <tr>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->academy_code }}</td>
                        <td>{{ $date->section }}</td>
                        <td>{{ $date->academy_year }}</td>
                        <td>
                            <a href="{{ route('editstudent', $date->id) }}">
                                <button class="btn btn-warning">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('destorestudent', $date->id) }}">
                                <button class="btn btn-danger">delete</button>
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
