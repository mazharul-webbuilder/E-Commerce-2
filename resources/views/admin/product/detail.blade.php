@extends('master.admin.master')
@section('title')
    {{$product->name}} Detail - Admin
@endsection
@section('body')
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">{{$product->name}} Detail</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Sub Category</th>
                        <td>{{$product->subcategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>Tk. {{number_format($product->regular_price)}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>Tk. {{number_format($product->selling_price)}}</td>
                    </tr>
                    <tr>
                        <th>Stock Amount</th>
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$product->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Long Description</th>
                        <td>{!! $product->long_description !!}</td>
                    </tr>
                    <tr>
                        <th>Long Description</th>
                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><img src="{{asset($product->image)}}" alt="" height="200" width="200"></td>
                    </tr>
                    <tr>
                        <th>Other Images</th>
                        <td>
                            @foreach($product->otherImages as $otherImage)
                            <img src="{{asset($otherImage->image)}}" alt="" height="200" width="200">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <p class="text-center"> <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm">Edit Product Info</a></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
