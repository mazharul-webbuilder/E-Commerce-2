@extends('master.admin.master')
@section('title')
    Add Setting
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card show">
                        <div class="card-header">
                            <h3 class="text-center">Add Setting</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('setting.create')}}" method="POST">
                                <p class="text-center text-success">{{Session::get('message')}}</p>
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label  class="form-label">Shipping In Dhaka</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="shipping_in_dhaka" placeholder="Enter value in taka">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label  class="form-label">Shipping Outside Dhaka</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="shipping_outside_dhaka" placeholder="Enter value in taka">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success " value="Add Setting">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
