@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Add Admin
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
        <div class="card-body">
            <h5 class="card-title">Admin Form</h5>
            {{--  <!-- Form -->  --}}
            <form action="{{ Route('addadmin') }}" class="d-grid" method="POST">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <input type="text" id="name" class="form-control" name="name">
                <label for="email" class="py-2">Email:</label>
                <input type="email" id="email" class="form-control" name="email">
                <label for="password" class="py-2">Password:</label>
                <input type="text" id="password" class="form-control" name="password">
                <div class="form-group">
                    <label for="role" class="py-2">role:</label>
                    <select id="role" class="form-control" name="role_id">
                        @foreach ($roles as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3" value="Add">
            </form>
            {{--  <!-- End Form-->  --}}
        </div>
    </div>
@endsection
