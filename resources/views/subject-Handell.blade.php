@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Subject Table</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">
                        Subject Table</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Subject Form</h5>
                            <!-- Form -->
                            <form class="d-grid" method="POST" action="{{ route('addsubject') }}" enctype="multipart/form-data" >
                                <label for="name" class="py-2">Name:</label>
                                <input type="text" id="name" class="form-control">
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
                            <!-- End Form-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
