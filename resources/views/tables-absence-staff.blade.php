@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    ADD Staff
@endsection
@section('content')
    @if (Session::has('done'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('done') }}
        </div>
    @endif
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
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                    <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table</h4>
                    <a href="tables-absence-staff-Hadell.html" class="btn btn-success my-2 ms-2"
                        style="background-color:#74a5af;color:#fff;">Add new</a>
                </div>
                <h5 class="card-title">Table</h5>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Day</th>
                            <th scope="col">Date</th>
                            <th scope="col">State</th>
                            <th scope="col">Excuse</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attend as $data)
                            <th scope="row">{{ $data->id }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->day }}</td>
                            <td>{{ $data->date }}</td>
                            <td>{{ $data->state }}</td>
                            <td>{{ $data->excuse }}</td>
                            <td> <a href="{{ route('staffabsencedelete', $data->id ) }}" class="btn btn-danger my-2 ms-2">delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
