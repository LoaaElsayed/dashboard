{{--  @extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('content')
    <div class="pagetitle">
        <h1>Staff Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">
                    Staff Table</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                            <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table</h4>
                            <a href="staff-Handell.html" class="btn btn-success my-2 ms-2"
                                style="background-color:#74a5af;color:#fff;">Add new</a>
                        </div>
                        <h5 class="card-title">Table</h5>
                        <!--Table -->
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">National Id</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Raheem Lehner</td>
                                    <td>Raheem Lehner</td>
                                    <td>Dynamic Division Officer</td>
                                    <td><img style="width: 100%; height: 50px;" src="{{ asset('uploads/img/Mathematics-bro.png') }}"
                                            alt=""></td>
                                    <td>2011-04-19</td>
                                    <td> <a href="staff-Handell.html" class="btn btn-warning my-2 ms-2">update</a></td>
                                    <td> <a class="btn btn-danger my-2 ms-2">delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Raheem Lehner</td>
                                    <td>Raheem Lehner</td>
                                    <td>Dynamic Division Officer</td>
                                    <td><img style="width: 100%; height: 50px;" src="{{ asset('uploads/img/Mathematics-bro.png') }}"
                                            alt=""></td>
                                    <td>2011-04-19</td>
                                    <td> <a href="staff-Handell.html" class="btn btn-warning my-2 ms-2">update</a></td>
                                    <td> <a class="btn btn-danger my-2 ms-2">delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
