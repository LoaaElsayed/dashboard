@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <divclass="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                A control panel that controls several tables related to employees, students, subjects,
                                departments,
                                absences, and excuses, and also includes a login page and administrator privileges.
                                They can be used in general control of managing data stored in the database of the
                                organization,
                                analyzing and visualizing it in tables and reports, as well as updating table data by adding
                                or deleting
                                new records.
                                The Tables and Data Control Panel is an essential management tool that makes it easier to
                                control data
                                and improve its quality. It also helps save the time and effort needed to manage data and
                                reduce the
                                workload of employees.
                            </h5>
                            <img style="height: 60vh;" src="{{ asset('uploads/img/show7.png') }}" class="w-100" alt="">
                        </div>
                        </divclass=>
                </div>
            </div>
        </section>
    </main>
    #<!-- End main -->
@endsection
