@extends('master.admin.master')
@section('title')
    Manage Category
@endsection

@section('body')
    <table id="example" class="display" style="width:100%">
        <p class="card-text mb-4 text-center text-success">{{Session::get('message')}}</p>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->description}}</td>
                <td><img src="{{asset($brand->image)}}" alt="" height="40" width="40"></td>
                <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{route('brand.edit', ['id'=> $brand->id])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure To Delete This Category?') ? document.getElementById('brandDeleteForm{{$brand->id}}').submit() : ''">Delete</a>
                    <form action="{{route('brand.delete', ['id'=> $brand->id])}}" method="POST" id="brandDeleteForm{{$brand->id}}">@csrf</form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>




@endsection
