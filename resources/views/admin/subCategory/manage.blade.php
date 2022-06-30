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
            <th>Category Name</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subcategories as $subcategory)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$subcategory->category->name}}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->description}}</td>
                <td><img src="{{asset($subcategory->image)}}" alt="" height="40" width="40"></td>
                <td>{{$subcategory->status == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{route('subcategory.edit', ['id'=> $subcategory->id])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure To Delete This Category?') ? document.getElementById('subcategoryDeleteForm{{$subcategory->id}}').submit() : ''">Delete</a>
                    <form action="{{route('subcategory.delete', ['id'=> $subcategory->id])}}" method="POST" id="subcategoryDeleteForm{{$subcategory->id}}">@csrf</form>
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
