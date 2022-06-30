@extends('master.admin.master')
@section('title')
    Add Admin User
@endsection
@section('body')
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="card overflow-hidden py-3">
                        <div class="card-body pt-0">
                            <h3 class="text-center card-title py-1">User Create</h3>
                            <div class="p-2">
                                <form method="POST" action="{{ route('user.create') }}">
                                    <p class="text-center text-success">{{Session::get('message')}}</p>
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
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Admin Level</label>
                                        <select name="role" class="form-control">
                                            <option>------Select Admin Level-----</option>
                                            <option value="superAdmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="editor">Editor</option>
                                            <option value="moderator">Moderator</option>
                                        </select>
                                    </div>
                                    <div class="mt-4">
                                        <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" value="Create New User"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
