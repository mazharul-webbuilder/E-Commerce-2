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
        @foreach($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td><img src="{{asset($category->image)}}" alt="" height="40" width="40"></td>
            <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
            <td>
                <a href="{{route('category.edit', ['id'=> $category->id])}}" class="btn btn-success btn-sm">Edit</a>
                <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure To Delete This Category?') ? document.getElementById('categoryDeleteForm{{$category->id}}').submit() : ''">Delete</a>
                <form action="{{route('category.delete', ['id'=> $category->id])}}" method="POST" id="categoryDeleteForm{{$category->id}}">@csrf</form>
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
