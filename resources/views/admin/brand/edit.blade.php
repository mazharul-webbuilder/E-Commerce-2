@extends('master.admin.master')
@section('title')
    Brand Update
@endsection
@section('body')
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-4 text-center">Brand Update Form</h6>
                <p class="card-text mb-4 text-center text-success">{{Session::get('message')}}</p>
                <form method="POST" action="{{route('brand.update', ['id' => $brand->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="horizontal-firstname-input" value="{{$brand->name}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control">{{$brand->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" id="horizontal-password-input">
                            <br>
                            <img src="{{asset($brand->image)}}" alt="" height="100" width="100" class="img-fluid">
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <input type="submit" class="btn btn-primary w-md" value="Update Brand">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
