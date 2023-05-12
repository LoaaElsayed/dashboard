@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('content')
    <div class="pagetitle">
        <h1>Edit Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">
                    Edit Admin</li>
            </ol>
        </nav>
    </div>
    {{--  <!-- End Page Title -->  --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admin Form</h5>
                        {{--  <!-- Form -->  --}}
                        <form action="admin.html" class="d-grid" method="get">
                            <label for="name" class="py-2">Name:</label>
                            <input type="text" id="name" class="form-control">
                            <label for="role" class="py-2">Role</label>
                            <input type="text" id="role" class="form-control">
                            <input type="submit" style="background-color:#74a5af;color:#fff;" class="btn mt-3"
                                value="Add">
                        </form>
                        {{--  <!-- End Form-->  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
