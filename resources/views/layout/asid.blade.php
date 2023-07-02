{{--  <!-- ======= Sidebar ======= -->  --}}
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{--  <!-- End Dashboard Nav -->  --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('staffabsence') }}" class="active">
                        <i class="bi bi-circle"></i><span>Absence Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('liststaff') }}">
                        <i class="bi bi-circle"></i><span>Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('liststudent') }}">
                        <i class="bi bi-circle"></i><span>Student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listsubject') }}">
                        <i class="bi bi-circle"></i><span>Subject</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listdepartment') }}">
                        <i class="bi bi-circle"></i><span>Department</span>
                    </a>
                </li>
            </ul>
        </li>
        {{--  <!-- End Tables Nav -->  --}}
        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('listadmin') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        {{--  <!-- End Profile Page Nav -->  --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>
        {{--  <!-- End Login Page Nav -->  --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('listadmin') }}">
                <i class="bi bi-person-check-fill"></i>
                <span>Admin</span>
            </a>
        </li>
        {{--  <!-- End admin Page Nav -->  --}}
    </ul>
</aside>
{{--  <!-- End Sidebar-->  --}}
