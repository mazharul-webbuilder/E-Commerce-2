@extends('master.front.master')
@section('title')
    Sign Up
@endsection
@section('body')
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="card overflow-hidden py-3">
                        <div class="card-body pt-0">
                            <h3 class="text-center card-title py-1">Sign Up</h3>
                            <div class="p-2">
                                <form method="POST" action="{{ route('customer.new') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Mobile</label>
                                        <input type="number" name="mobile" class="form-control" id="userpassword" placeholder="Enter mobile">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Password</label>
                                        <input type="password" name="password"  class="form-control" id="confirm_password" placeholder="Enter password">
                                    </div>

                                    <div class="mt-4">
                                        <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" value="Sign Up"/>
                                    </div>
                                </form>
                                <div class="mt-4 text-center">
                                    <div>
                                        <p>Already have an account ? <a href="{{route('customer.login')}}" class="font-weight-medium text-primary"> Login</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
