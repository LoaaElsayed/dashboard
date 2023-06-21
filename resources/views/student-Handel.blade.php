@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    'Edit Student'
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
            <h5 class="card-title">Student Form</h5>
            <form action="{{ Route('updatestudent') }}" class="d-grid" method="POST">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <input type="text" id="name" class="form-control" name="name">
                <label for="academy-code" class="py-2">Academy Code:</label>
                <input type="number" id="academy-code" class="form-control" name="academy_code">
                <label for="section" class="py-2">Section:</label>
                <input type="number" id="section" class="form-control" name="section">
                <label for="academy-year" class="py-2">Academy Year:</label>
                <input type="number" id="academy-year" class="form-control" name="academy_year">
                <input type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3" value="Add">
            </form>
        </div>
    </div>
@endsection
