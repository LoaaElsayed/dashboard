@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Add Excuse
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
            <h5 class="card-title">Excuse Form</h5>
            <form action="{{ Route('addexcuse') }}" class="d-grid" method="POST">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <input type="text" id="name" class="form-control" name="name">
                <label for="type" class="py-2">Type:</label>
                <select id="role" class="form-control" name="type">
                    <option value="Holiday">Holiday</option>
                    <option value="Vaction">Vaction</option>
                    <option value="other">other</option>
                </select>
                <label for="type" class="py-2">Descrption:</label>
                <textarea name="descrption" id="description" cols="30" rows="3" class="form-control"></textarea>
                <label for="duration" class="py-2">Duration:</label>
                <input type="number" id="duration" class="form-control" name="duration_time">
                <input type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3" value="Add">
            </form>
        </div>
    </div>
@endsection
