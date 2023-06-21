@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Excuse
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-around border border-dark my-3">
            <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table</h4>
            <a href="{{ route('createexcuse') }}" class="btn btn-success my-2 ms-2"
                style="background-color:#74a5af;color:#fff;">Add new</a>
        </div>
        <h5 class="card-title">Table</h5>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">description</th>
                    <th scope="col">duration</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($excuse as $excuse )
                <tr>
                    <th>{{ $excuse->id }}</th>
                    <td>{{ $excuse->name }}</td>
                    <td>{{ $excuse->type}}</td>
                    <td>{{ $excuse->descrption }}</td>
                    <td>{{ $excuse->duration_time }}</td>
                    <td><a href="{{ Route('editexcuse',$excuse->id) }}" class="btn btn-warning my-2 ms-2">update</a></td>
                    <td><a href="{{ Route('destoreexcuse',$excuse->id) }}" class="btn btn-danger my-2 ms-2">delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
