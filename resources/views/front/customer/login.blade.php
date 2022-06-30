@extends('master.front.master')
@section('title')
    Sign In
@endsection
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="card overflow-hidden py-3">
                    <div class="card-body pt-0">
                        <h3 class="text-center card-title py-1">Sign In</h3>
                        <div class="p-2">
                            <form method="POST" action="{{ route('customer.login.check') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                    <p class="text-danger">{{Session::get('message2')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    <p class="text-danger">{{Session::get('message')}}</p>
                                </div>

                                <div class="mt-4">
                                    <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" value="Login"/>
                                </div>
                            </form>
                            <div class="mt-4 text-center">
                                <div>
                                    <p>Don't have an account ? <a href="{{route('customer.register')}}" class="font-weight-medium text-primary"> Register</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
