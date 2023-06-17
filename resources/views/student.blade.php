@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Student Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">
                    Student Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                            <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table
                            </h4>
                            <a href="student-Handel.html" class="btn btn-success my-2 ms-2"
                                style="background-color:#74a5af;color:#fff;">Add new</a>
                        </div>
                        <h5 class="card-title">Table</h5>
                        <!--Table -->
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Academy Code</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Academy year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($student as $date)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date->id }}</td>
                                        <td>{{ $date->name }}</td>
                                        <td>{{ $date->academy_code }}</td>
                                        <td>{{ $date->section }}</td>
                                        <td>{{ $date->academy_year}}</td>
                                        <td>
                                            <a href="{{ route('destorestudent', $date->id) }}">
                                                <button class="btn btn-danger">delete</button>
                                            </a>
                                            <a href="{{ route('editstudent', $date->id) }}">
                                                <button class="btn btn-warning">edit</button>
                                            </a>
                                            <a href="{{ route('editstudent', $date->id) }}">    // route lesa 
                                                <button class="btn btn-warning">show</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
