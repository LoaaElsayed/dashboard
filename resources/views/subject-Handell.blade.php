@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Add Subject
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
            <h5 class="card-title">Subject Form</h5>
            <form class="d-grid" method="POST" action="{{ route('addsubject') }}" enctype="multipart/form-data">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <input type="text" id="name" class="form-control" name="name">
                <div class="form-group">
                    <label for="academy_year" class="py-2">academy_year:</label>
                    <select name="academy_year" id="academy_year" class="form-control">
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="semester" class="py-2">Semester:</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="semester1">Semester1</option>
                        <option value="semester2">Semester2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="staff_id" class="py-2">Staff:</label>
                    <select name="staff_id" id="staff_id" class="form-control">
                        @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="py-2">department_name:</label>
                    <select name="department_id" id="department_id" class="form-control">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3">Add</button>
            </form>
        </div>
    </div>
@endsection
