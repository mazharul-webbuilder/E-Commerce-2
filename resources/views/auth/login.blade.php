<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Molla - | Admin Login | </title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}front/assets/images/icons/apple-touch-icon.png">
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{asset('/')}}front/assets/images/icons/favicon.ico">
</head>
<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden py-3">
                    <div class="card-body pt-0">
                        <h3 class="text-center card-title py-1">Admin Login</h3>
                        <div class="p-2">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                </div>

                                <div class="mt-4">
                                    <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" value="Login"/>
                                </div>
                            </form>
                            <div class="mt-4 text-center">
                                <div>
                                    <p>Don't have an account ? <a href="{{route('register')}}" class="font-weight-medium text-primary"> Register</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<script src="{{asset('/')}}front/assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
