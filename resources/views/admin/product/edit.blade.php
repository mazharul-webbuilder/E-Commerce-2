@extends('master.admin.master')
@section('title')
    {{$product->name}} Update
@endsection
@section('body')
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-4 text-center">{{$product->name}} Update Form</h6>
                <p class="card-text mb-4 text-center text-success">{{Session::get('message')}}</p>
                <form method="POST" action="{{route('product.update', ['id' => $product->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select name="category_id" class="form-control" onchange="getProductSubCategory(this.value);">
                                <option>-------Select Category-------</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SubCategory</label>
                        <div class="col-sm-9">
                            <select name="subcategory_id" class="form-control"  id="subCategoryId">
                                <option>-------Select Subcategory-------</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" {{$product->subcategory->id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-9">
                            <select name="brand_id" class="form-control">
                                <option>-------Select Subcategory-------</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$product->brand->id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit</label>
                        <div class="col-sm-9">
                            <select name="unit_id" class="form-control">
                                <option>-------Select Subcategory-------</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}" {{$product->unit->id == $unit->id ? 'selected' : ''}}>{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="horizontal-firstname-input" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="code" class="form-control" id="horizontal-firstname-input" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Regular Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="regular_price" class="form-control" id="horizontal-firstname-input" value="{{$product->regular_price}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Selling Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="selling_price" class="form-control" id="horizontal-firstname-input" value="{{$product->selling_price}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stock Amount</label>
                        <div class="col-sm-9">
                            <input type="number" name="stock_amount" class="form-control" id="horizontal-firstname-input" value="{{$product->stock_amount}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="short_description" class="form-control" id="horizontal-firstname-input" value="{{$product->short_description}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            <textarea name="long_description" id="summernote">{{$product->long_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" id="horizontal-password-input">
                            <br>
                            <img src="{{asset($product->image)}}" alt="" height="100" width="100">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Other Images</label>
                        <div class="col-sm-9">
                            <input type="file" multiple name="otherImages[]" class="form-control" id="horizontal-password-input">
                            <br>
                            @foreach($product->otherImages as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="" height="100" width="100">
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <input type="submit" class="btn btn-primary w-md" value="Update Product">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function getProductSubCategory(id)
        {
            $.ajax({
                method: "GET",
                url   : "{{url('/get-product-sub-category-by-category-id')}}",
                data  : {id : id},
                dataType : "JSON",
                success: function (response) {
                    var option = '';
                    option += '<option>-------Select Subcategory-------</option>';
                    var subCategoryId = $('#subCategoryId');
                    subCategoryId.empty();

                    $.each(response, function (key, value) {
                        option += '<option value="' +value.id+ '">' +value.name+ '</option>';
                    })

                    subCategoryId.append(option);
                }
            });
        }
    </script>
@endsection
