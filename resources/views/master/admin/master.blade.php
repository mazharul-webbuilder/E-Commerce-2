<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
    {{--require in datatable--}}
    <link  href="{{asset('/')}}admin/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
     {{--end  require datatable--}}
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/demo1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('/')}}front/assets/images/icons/favicon.ico">

{{--    summernote--}}
<!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{route('dashboard')}}" class="sidebar-brand">
                Ad<span>min</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Perform Action</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Category Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('category.add')}}" class="nav-link">Add Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.manage')}}" class="nav-link">Manage Category</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#subCategory" role="button" aria-expanded="false" aria-controls="subCategory">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Sub Category Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="subCategory">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('subcategory.add')}}" class="nav-link">Add Sub Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('subcategory.manage')}}" class="nav-link">Manage Sub Category</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#brand" role="button" aria-expanded="false" aria-controls="brand">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Brand Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="brand">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('brand.add')}}" class="nav-link">Add Brand</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('brand.manage')}}" class="nav-link">Manage Brand</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#unit" role="button" aria-expanded="false" aria-controls="unit">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Unit Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="unit">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('unit.add')}}" class="nav-link">Add Unit</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('unit.manage')}}" class="nav-link">Manage Unit</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#product" role="button" aria-expanded="false" aria-controls="unit">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Product Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('product.add')}}" class="nav-link">Add Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('product.manage')}}">Manage Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="unit">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Order Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="order">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('order.manage')}}" class="nav-link">Manage Order</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if(Auth::user()->role == 'superAdmin')
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="user">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">User Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('user.add')}}" class="nav-link">Add User</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.manage')}}">Manage User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
                        <i class="link-icon" data-feather="arrow-right"></i>
                        <span class="link-title">Setting Module</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="setting">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('setting.add')}}">Add Setting</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('setting.manage')}}">Manage Setting</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="user">
                            <i class="link-icon" data-feather="arrow-right"></i>
                            <span class="link-title">User Module</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="" class="nav-link" style="pointer-events: none">No Access</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
                            <i class="link-icon" data-feather="arrow-right"></i>
                            <span class="link-title">Setting Module</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="setting">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="" class="nav-link" style="pointer-events: none">No Access</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        <input type="submit" class="btn btn-primary" id="navbarForm" value="Search">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="{{asset('/')}}admin/assets/images/others/logo-placeholder.png" alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="{{asset('/')}}admin/assets/images/others/logo-placeholder.png" alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">{{Auth::user()->name}}</p>
                                    <p class="tx-12 text-muted">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="{{asset('/')}}admin/assets/general/profile.html" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="edit"></i>
                                        <span>Edit Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="repeat"></i>
                                        <span>Switch User</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="" onclick="event.preventDefault(); document.getElementById('userLogoutForm').submit();" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                    </a>
                                    <form action="{{route('logout')}}" method="post" id="userLogoutForm">@csrf</form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-content">
            @yield('body')
        </div>


    </div>
</div>

<!-- core:js -->
<script src="{{asset('/')}}admin/assets/vendors/core/core.js"></script>
<!-- endinject -->

{{--require in datatable start here--}}
<script src="{{asset('/')}}admin/assets/datatable/jquery-3.5.1.js"></script>
<script src="{{asset('/')}}admin/assets/datatable/jquery.dataTables.min.js"></script>
{{--require in datatable end here--}}



<!-- Plugin js for this page -->
<script src="{{asset('/')}}admin/assets/vendors/chartjs/Chart.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendors/jquery.flot/jquery.flot.js"></script>
<script src="{{asset('/')}}admin/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="{{asset('/')}}admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendors/apexcharts/apexcharts.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{asset('/')}}admin/assets/vendors/feather-icons/feather.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{asset('/')}}admin/assets/js/dashboard-light.js"></script>
<script src="{{asset('/')}}admin/assets/js/datepicker.js"></script>
<!-- End custom js for this page -->


{{--require in datatable--}}
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
{{--endhere require datatable--}}

{{--summernote--}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height:200
        });
    });
</script>
</body>
</html>
