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
            <th>Category</th>
            <th>SubCategory</th>
            <th>Brand</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->subcategory->name}}</td>
                <td>{{$product->brand->name}}</td>
                <td>{{$product->unit->name}}</td>
                <td>Tk. {{number_format($product->selling_price)}}</td>
                <td>{{$product->stock_amount}}</td>
                <td><img src="{{asset($product->image)}}" alt="" height="40" width="40"></td>
                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{route('product.detail.admin', ['id' => $product->id])}}" class="btn btn-sm">Detail</a>
                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-sm">Edit</a>
                    <a href="" onclick="event.preventDefault(); confirm('Are You Sure To Delete This?') ? document.getElementById('productDeleteForm{{$product->id}}').submit() : '' " class="btn btn-sm">Delete</a>
                    <form action="{{route('product.delete', ['id' => $product->id])}}" method="POST" id="productDeleteForm{{$product->id}}">@csrf</form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Brand</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>




@endsection
