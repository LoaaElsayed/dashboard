@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Add Duration
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
            <form class="d-grid" method="POST" action="{{ route('addduration') }}" enctype="multipart/form-data">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <select id="role" class="form-control" name="name">
                    <option value=""></option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                    <option value="Fourth">Fourth</option>
                    <option value="Fifth">Fifth</option>
                </select>
                <label for="name" class="py-2">time_start:</label>
                <select id="role" class="form-control" name="time_start">
                    <option></option>
                    <option value="08:30:00">08:30:00</option>
                    <option value="10:15:00">10:15:00</option>
                    <option value="12:00:00">12:00:00</option>
                    <option value="1:45:00">1:45:00</option>
                    <option value="3:30:00">3:30:00</option>
                </select>
                <label for="time_end" class="py-2">time_end:</label>

                <select id="role" class="form-control" name="time_end">
                    <option></option>
                    <option value="10:00:00">10:00:00</option>
                    <option value="11:45:00">11:45:00</option>
                    <option value="1:00:00">1:30:00</option>
                    <option value="3:15:00">3:15:00</option>
                    <option value="05:00:00">05:00:00</option>
                </select>
                <button type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3">Add</button>
            </form>
        </div>
    </div>
@endsection
