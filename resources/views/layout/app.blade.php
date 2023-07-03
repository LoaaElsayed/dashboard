<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>حضرني Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    {{--  <!-- Favicons -->  --}}
    <link href="{{ asset('uploads/img/Mathematics-bro.ico') }}" rel="icon">
    <link href="{{ asset('uploads/img/Mathematics-bro.ico') }}" rel="apple-touch-icon">
    {{--  <!-- Google Fonts -->  --}}
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    {{--  <!-- Vendor CSS Files -->  --}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">
    {{--  <!-- Template Main CSS File -->  --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<main id="main" class="main">
    {{--  <div class="pagetitle">
        <h1>@yield('title')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">
                    @yield('title')
                </li>
            </ol>
        </nav>
    </div>  --}}
    @yield('content')
</main>
    @extends('layout.footer')
</body>

</html>
