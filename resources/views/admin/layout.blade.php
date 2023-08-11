<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Area</title>
    <link href="{{asset('admin/assets/vendor/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/vendor/fontawesome/css/solid.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/vendor/fontawesome/css/brands.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/master.css')}}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- sidebar navigation component -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h4 style="color: black">Admin Section</h4>

            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="/"><i class="fas fa-home"></i>Home</a>
                </li>

                <li>
                    <a href="{{route('admin.panel')}}"><i class="fas fa-user"></i>Admin Panel</a>
                </li>

                <li>
                    <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i>Products</a>
                    <ul class="collapse list-unstyled" id="uielementsmenu">
                        <li>
                            <a href="/products-listing"><i class="fas fa-angle-right"></i>Products Listing</a>
                        </li>
                        <li>
                            <a href="/create-product"><i class="fas fa-angle-right"></i>Create Products</a>
                        </li>


                    </ul>
                </li>

                <li>
                    <a href="#uielementsmenu1" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i>Categories</a>
                    <ul class="collapse list-unstyled" id="uielementsmenu1">
                        <li>
                            <a href="/create-category"><i class="fas fa-angle-right"></i>Category Listing</a>
                        </li>
                        <li>
                            <a href="/create-category"><i class="fas fa-angle-right"></i>Create Category</a>
                        </li>

                    </ul>
                </li>



                <li>
                    <a href="{{route('create-location')}}"><i class="fas fa-user"></i>Locations</a>
                </li>

                <li>
                    <a href="#uielementsmenu2" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-file-alt"></i>Reports</a>
                    <ul class="collapse list-unstyled" id="uielementsmenu2">
                        <li>
                            <a href="{{route('admin.active.orders')}}"><i class="fas fa-angle-right"></i>Active Orders</a>
                        </li>

                        <li>
                            <a href="{{route('admin.orders')}}"><i class="fas fa-angle-right"></i>Closed Orders</a>
                        </li>

                 



                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.reviews')}}"><i class="fas fa-file-alt"></i>Reviews</a>
                </li>

                <li>
                    <a href="{{route('admin.contacts')}}"><i class="fas fa-file-alt"></i>Contacts</a>
                </li>

                <li>
                    <a href="{{route('admin.users')}}"><i class="fas fa-file-alt"></i>Users</a>
                </li>


                <li>
                    <a href="#authmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i>Authentication</a>
                    <ul class="collapse list-unstyled" id="authmenu">

                        @auth


                        <li>
                            <a href="/logout"><i class="fas fa-lock"></i>Logout</a>
                        </li>
                    @endauth


                    @guest

                    <li>
                        <a href="/login"><i class="fas fa-lock"></i>Login</a>
                    </li>

                    <li>
                        <a href="/register"><i class="fas fa-user-plus"></i>Signup</a>
                    </li>
                    <li>
                        <a href="/forgot"><i class="fas fa-user-lock"></i>Forgot password</a>
                    </li>

                    @endguest


                    </ul>
                </li>

                {{-- <li>
                    <a href="/settings"><i class="fas fa-cog"></i>Settings</a>
                </li> --}}
            </ul>
        </nav>
        <!-- end of sidebar component -->
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        {{-- <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav1" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-link"></i> <span>Quick Links</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu" aria-labelledby="nav1">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back ups</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i> Updates</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> Roles</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <span>{{Auth::user()->name}}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        {{-- <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div> --}}
                                        <li><a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <!-- end of navbar navigation -->

        </div>
    </div>
    <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
</body>

</html>
