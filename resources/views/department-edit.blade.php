@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    Edit Department
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
            <h5 class="card-title">Department Form</h5>
            <form action="{{ Route('updatedepartment',$departmeant->id) }}" class="d-grid" method="POST">
                @csrf
                <label for="name" class="py-2">Name:</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $departmeant->name }}">
                <div class="form-group">
                    <label for="role" class="py-2">Admin:</label><span>{{ $departmeant->admin->name }}</span>
                    <select id="role" class="form-control" name="admin_id">
                        @foreach ($admins as $admins)
                            <option value="{{ $admins->id }}">{{ $admins->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3" value="Add">
            </form>
        </div>
    </div>
@endsection
