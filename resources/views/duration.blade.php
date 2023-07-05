@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Duration
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
                <a href="{{ route('createduration') }}" class="btn btn-success my-2 ms-2" style="background-color:#74a5af;color:#fff;">Add new</a>
            </div>
            <h5 class="card-title">Table</h5>
            {{--  <!--Table -->  --}}
            <table class="table text-center">
                <thead style="color: #1f7a8c">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Time_Start</th>
                        <th scope="col">Time_End</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($duration as $date)
                    <tr>
                        <td style="color: #1f7a8c">{{ $loop->iteration }}</td>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->time_start }}</td>
                        <td>{{ $date->time_end }}</td>
                        <td>
                            <a href="{{ route('editduration', $date->id) }}">
                                <button class="btn btn-warning" style="background-color:#1f7a8c ; color:#fff">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('destoreduration', $date->id) }}">
                                <button class="btn btn-danger" style="background-color:#95a2a4 ; color:#fff">Delete</button>
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
