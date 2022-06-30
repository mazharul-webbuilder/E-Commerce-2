@extends('master.admin.master')
@section('title')
    Manage Setting
@endsection
@section('body')
    <table id="example" class="display" style="width:100%">
        <p class="card-text mb-4 text-center text-success">{{Session::get('message')}}</p>
        <thead>
        <tr>
            <th>#</th>
            <th>Shipping In Dhaka</th>
            <th>Shipping Outside Dhaka</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$setting->shipping_in_dhaka}}</td>
                <td>{{$setting->shipping_outside_dhaka}}</td>
                <td>
                    <a href="{{route('setting.edit', ['id'=> $setting->id])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure To Delete This Setting?') ? document.getElementById('settingDeleteForm{{$setting->id}}').submit() : ''">Delete</a>
                    <form action="{{route('setting.delete', ['id'=> $setting->id])}}" method="POST" id="settingDeleteForm{{$setting->id}}">@csrf</form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Shipping In Dhaka</th>
            <th>Shipping Outside Dhaka</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
@endsection
