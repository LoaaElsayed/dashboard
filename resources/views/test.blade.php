
        <div class="card">
            <h1 class="text-center mt-3">Staff</h1>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th scope="col">name</th>
                            <th scope="col">desc</th>
                            <th scope="col">action </th>
                            {{--  <th scope="col">type</th>   --}}
                            {{--  {{--  <th scope="col">departname name</th>  --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $date)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $date->id }}</td>
                                <td>{{ $date->name }}</td>
                                <td>{{ $date->descrption }}</td>
                                {{--  <td>{{ $date->role->name }}</td>  --}}
                                {{--  <td>{{ $date->type }}</td>
                                <td>{{ $date->department->name }}</td>  --}}
                                <td>
                                    <a href="{{ route('listrole') }}"><button class="btn btn-danger">show</button>
                                    <a href="{{ route('destorerole' ,$date->id) }}">
                                        <button class="btn btn-danger">delete</button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-danger">edit</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form method="POST" action="{{ Route() }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Desc</label>
                <textarea name="desc" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label>category_id</label>
                <select name="cat_id" class="form-control">
                    @foreach ($catg as $catgs)
                        <option value="{{ $catgs->id }}">
                            {{ $catgs->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>image</label>
                <input type="file" class="form-control" name="img">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

{{--  satff  --}}
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th scope="col">name</th>
                    <th scope="col">role_staff</th>
                    <th scope="col">national_id </th>
                    <th scope="col">image</th>
                    <th scope="col">departname name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $date)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->role_staff }}</td>
                        <td>{{ $date->national_id }}</td>
                        <td>{{ $date->image }}</td>
                        <td>{{ $date->department->name }}</td>
                        <td>
                            <a href="{{ route('liststaff') }}"><button class="btn btn-danger">show</button>
                                <a href="{{ route('destorestaff', $date->id) }}">
                                    <button class="btn btn-danger">delete</button>
                                </a>
                                <a href="{{ route('editstaff', $date->id) }}">
                                    <button class="btn btn-danger">edit</button>
                                </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updatestaff',$editstaff->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $editstaff->name }}">
            </div>
            <div class="form-group">
                <label>role_staff</label>
                <input type="text" class="form-control" name="role_staff" value="{{ $editstaff->role_staff }}">
            </div>
            <div class="form-group">
                <label>natinal_id</label>
                <input type="number" class="form-control" name="national_id" value="{{ $editstaff->national_id }}">
            </div>
            <div class="form-group">
                <label>department_id</label><span>({{ $editstaff->department->name }})</span>
                <select name="department_id" class="form-control">
                    @foreach ($depstaff as $data)
                        <option value="{{ $data->id }}">
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>image</label><span>({{ $editstaff->image }})</span>
                <input type="file" class="form-control" name="img">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

{{--  student  --}}
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updatestudent',$editstu->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $editstu->name }}">
            </div>
            <div class="form-group">
                <label>department_id</label><span>({{ $editstu->academy_year }})</span>
                <select name="academy_year" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label>section</label>
                <input type="number" class="form-control" name="section" value="{{ $editstu->section }}">
            </div>
            <div class="form-group">
                <label>academy_code</label>
                <input type="number" class="form-control" name="academy_code" value="{{ $editstu->academy_code }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th scope="col">name</th>
                    <th scope="col">academy_year</th>
                    <th scope="col">section </th>
                    <th scope="col">academy_code</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $date)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->academy_year }}</td>
                        <td>{{ $date->section }}</td>
                        <td>{{ $date->academy_code }}</td>
                        <td>
                            <a href="{{ route('liststudent') }}"><button class="btn btn-danger">show</button>
                                <a href="{{ route('destorestudent', $date->id) }}">
                                    <button class="btn btn-danger">delete</button>
                                </a>
                                <a href="{{ route('editstudent', $date->id) }}">
                                    <button class="btn btn-danger">edit</button>
                                </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--  subject  --}}
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>id</th>
                <th scope="col">name</th>
                <th scope="col">academy_year</th>
                <th scope="col">semester </th>
                <th scope="col">staff_name</th>
                <th scope="col">department_name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subject as $date)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $date->id }}</td>
                    <td>{{ $date->name }}</td>
                    <td>{{ $date->academy_year }}</td>
                    <td>{{ $date->semester }}</td>
                    <td>{{ $date->department->name }}</td>
                    <td>{{ $date->staff->name }}</td>
                    <td>
                        <a href="{{ route('destoresubject', $date->id) }}">
                            <button class="btn btn-danger">delete</button>
                        </a>
                        <a href="{{ route('editsubject', $date->id) }}">
                            <button class="btn btn-danger">edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updatesubject',$subject->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $subject->name }}">
            </div>
            <div class="form-group">
                <label for="academy_year">academy_year:</label><span>{{ $subject->academy_year }}</span>
                <select name="academy_year" id="academy_year">
                    <option value="1">Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                    <option value="4">Year 4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label><span>{{ $subject->semester }}</span>
                <select name="semester" id="semester">
                    <option value="semester1">Semester1</option>
                    <option value="semester2">Semester2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="staff_id">Staff:</label><span>{{ $subject->staff_id }}</span>
                <select name="staff_id" id="staff_id">
                    @foreach ($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>department_name</label><span>{{ $subject->department_id }}</span>
                <select name="department_id" id="department_id">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

{{--  department  --}}
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updatedepartment', $departmeant->id )}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $departmeant->name }}">
            </div>
            <div class="form-group">
                <label>admin_name</label><span>{{ $departmeant->admin->name }}</span>
                <select name="admin_id" id="admin_id">
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div><a href="{{ route('createdepartment') }}"><button class="btn btn-danger">Add</button></a></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th scope="col">name</th>
                    <th scope="col">admin_name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($department as $date)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->admin->name }}</td>
                        <td>
                            <a href="{{ route('destoredepartment', $date->id) }}">
                                <button class="btn btn-danger">delete</button>
                            </a>
                            <a href="{{ route('editdepartment', $date->id) }}">
                                <button class="btn btn-danger">edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--  excuse  --}}
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updateexcuse',$excuse->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $excuse->name }}">
            </div>
            <div class="form-group">
                <label>type:</label><span>{{ $excuse->type }}</span>
                <select name="type" id="type">
                    <option value="Holiday">Holiday</option>
                    <option value="Vaction">Vaction</option>
                    <option value="other">other</option>
                </select>
            </div>
            <div class="form-group">
                <label>descrption</label>
                <input type="text" class="form-control" name="descrption" value="{{ $excuse->descrption }}">
            </div>
            <div class="form-group">
                <label>duration_time</label>
                <input type="text" class="form-control" name="duration_time"  value="{{ $excuse->duration_time }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div><a href="{{ route('createexcuse') }}"><button class="btn btn-danger">Add</button></a></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th scope="col">name</th>
                    <th scope="col">type</th>
                    <th scope="col">descrption</th>
                    <th scope="col">duration_time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($excuse as $date)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $date->id }}</td>
                        <td>{{ $date->name }}</td>
                        <td>{{ $date->type }}</td>
                        <td>{{ $date->descrption }}</td>
                        <td>{{ $date->duration_time }}</td>
                        <td>
                            <a href="{{ route('destoreexcuse', $date->id) }}">
                                <button class="btn btn-danger">delete</button>
                            </a>
                            <a href="{{ route('editexcuse', $date->id) }}">
                                <button class="btn btn-danger">edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--  admin  --}}
<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updateadmin' , $admin->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
            </div>
            <div class="form-group">
                <label>password</label><span>{{ $admin->password }}</span>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>role_name:</label> <span>{{ $admin->role->name }}</span>
                <select name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="card">
    <h1 class="text-center mt-3">Staff</h1>
    <div class="card-body">
        <form method="POST" action="{{ route('updateadmin' , $admin->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
            </div>
            <div class="form-group">
                <label>password</label><span>{{ $admin->password }}</span>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>role_name:</label> <span>{{ $admin->role->name }}</span>
                <select name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

