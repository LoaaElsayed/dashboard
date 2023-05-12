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
                        <div class="d-flex align-items-center justify-content-around border border-dark my-3">
                            <h4 style="color: #3b5c63; font-weight: bold;font-size: 16px;">Add a New Element To A Table
                            </h4>
                            <a href="subject-Handell.html" class="btn btn-success my-2 ms-2"
                                style="background-color:#74a5af;color:#fff;">Add new</a>
                        </div>
                        <h5 class="card-title">Table</h5>

                        <!--Table -->
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Academy Year</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Raheem Lehner</td>
                                    <td>Raheem Lehner</td>
                                    <td>Raheem Lehner</td>
                                    <td>Dynamic Division Officer</td>
                                    <td> <a href="subject-Handell.html" class="btn btn-warning my-2 ms-2">update</a>
                                    </td>
                                    <td> <a class="btn btn-danger my-2 ms-2">delete</a></td>
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
