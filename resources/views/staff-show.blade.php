@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    show Staff
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
            <h5 class="card-title">Report about DR/EN : {{ $info->name }}</h5>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset($info->image) }}" class="img-fluid rounded-start" alt="profile">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{ $info->name }}</h5>
                            <h5 class="card-title">National_id: {{ $info->national_id }}</h5>
                            <h5 class="card-title">Role staff: {{ $info->role_staff }}</h5>
                            <h5 class="card-title">Department: {{ $info->department->name }}</h5>
                            @if ($absence)
                                <h5 class="card-title">List of Excuses : <span class="ai-font-bigger" style="color: #1f7a8c"> {{ $absence->excuse }} </span> </h5>
                            @else
                                <h5 class="card-title">List of Excuses : <span class="ai-font-bigger" style="color: #1f7a8c">There are no apologies for any missed days/lectures afterwards.</span></h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
