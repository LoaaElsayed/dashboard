@extends('layout.app')
@section('title')
    LogIn
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="{{ asset('uploads/img/Mathematics-bro.png') }}" alt="">
                    <span class="d-none d-lg-block">حضرني</span>
                </a>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                        <p class="text-center small">Enter your username & name to login</p>
                    </div>
                    <form class="row g-3 needs-validation" novalidate action="{{ Route('login') }}">
                        @csrf
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                <div class="invalid-feedback">Please enter your username.</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="yourname" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="yourname" required>
                            <div class="invalid-feedback">Please enter your name!</div>
                        </div>
                        <div class="col-12">
                            <button style="background-color: #217a8a; color: #fff;" class="btn w-100"
                                type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
