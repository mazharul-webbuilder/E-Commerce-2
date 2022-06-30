@extends('master.admin.master')
@section('title')
    Manage User
@endsection

@section('body')
    <table id="example" class="display" style="width:100%">
        <p class="card-text mb-4 text-center text-success">{{Session::get('message')}}</p>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{($user->passtext)}}</td>
                <td>
                    <a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure?') ? document.getElementById('userDeleteForm{{$user->id}}').submit() : ''">Delete</a>
                    <form action="{{route('user.delete', ['id' => $user->id])}}" method="POST" id="userDeleteForm{{$user->id}}">@csrf</form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>




@endsection
