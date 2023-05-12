@extends('layout.app')
@section('content')
    <div class="container mt-5">
        @if (Session::has('done'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('done') }}
        </div>
    @endif
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="card">
            <h1 class="text-center mt-3">Staff</h1>
            <div><a href="{{ route('createrole') }}"><button class="btn btn-danger">Add</button></a></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th scope="col">name</th>
                            <th scope="col">descrption</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $date)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $date->id }}</td>
                                <td>{{ $date->name }}</td>
                                <td>{{ $date->descrption }}</td>
                                <td>
                                    <a href="{{ route('destorerole', $date->id) }}">
                                        <button class="btn btn-danger">delete</button>
                                    </a>
                                    <a href="{{ route('editrole', $date->id) }}">
                                        <button class="btn btn-danger">edit</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
