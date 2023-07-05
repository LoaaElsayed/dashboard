@extends('layout.app')
@extends('layout.nav')
@extends('layout.asid')
@section('title')
    show notification
@endsection
@section('content')
    <div class="card">
        @if (Session::has('done'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('done') }}
            </div>
        @endif
            <h5 class="card-title">Table</h5>
            <table class="table text-center">
                <thead style="color: #1f7a8c">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">Notivable Id</th>
                        <th scope="col">Message</th>
                        <th scope="col">date</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notification as $notification)
                        <tr>
                            <td style="color: #1f7a8c">{{ $loop->iteration }}</td>
                            <th>{{ $notification->id }}</th>
                            <th>{{ is_string($notification->data) ? json_decode($notification->data, true)['message'] : $notification->data['message'] }}</th>              
                            <td>{{ $notification->notifiable_id }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td> <a href="{{ Route('deletenotification', $notification->id) }}"
                                    class="btn btn-danger my-2 ms-2" style="background-color:#95a2a4 ; color:#fff">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
