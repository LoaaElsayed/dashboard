@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Edit Staff
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
        @endif        <div class="card-body">
            <h5 class="card-title">Staff Form</h5>
            <form action="{{ Route('updatestaff',$editstaff->id) }}" class="d-grid"  enctype="multipart/form-data" method="POST">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $editstaff->name }}">
                <label for="name" class="py-2">Number Excuse:</label>
                <input type="text" id="name" class="form-control" name="excuse_number" value="{{ $editstaff->excuse_number }}">
                <label for="national-id" class="py-2">National ID:</label>
                <input type="number" id="national-id" class="form-control" name="national_id" value="{{ $editstaff->national_id }}">
                <label for="role" class="py-2">Role:</label> <span> {{ $editstaff->role_staff }}</span>
                <select id="role" class="form-control" name="role_staff">
                    <option value="A.Doctor">A.Doctor</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Doctor">Doctor</option>
                </select>
                <label for="image" class="py-2">Image:</label><span>{{ $editstaff->image }}</span>
                <img src="{{ asset('uploads/img/Mathematics-bro.svg') }}" style="height: 50px;width: 70px;" alt="">
                <input type="file" id="image" class="form-control" name="image">
                <label for="department" class="py-2">Department:</label><span>{{ $editstaff->department->name }}</span>
                <select id="role" class="form-control" name="department_id">
                    @foreach ($depstaff as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                    @endforeach
                </select>
                <input type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3" value="Add">
            </form>
        </div>
    </div>
@endsection
