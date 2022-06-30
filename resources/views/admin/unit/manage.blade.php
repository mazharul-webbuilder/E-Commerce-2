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
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($units as $unit)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$unit->name}}</td>
                <td>{{$unit->description}}</td>
                <td>{{$unit->status == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{route('unit.edit', ['id'=> $unit->id])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure To Delete This Unit?') ? document.getElementById('categoryDeleteForm{{$unit->id}}').submit() : ''">Delete</a>
                    <form action="{{route('unit.delete', ['id'=> $unit->id])}}" method="POST" id="categoryDeleteForm{{$unit->id}}">@csrf</form>
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
