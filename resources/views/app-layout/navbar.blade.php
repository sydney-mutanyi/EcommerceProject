<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="/" class="text-decoration-none d-block d-lg-none">

        <img src="{{ asset('uploads/casuals/ecomerce_logo1.png') }}" alt="Image"
        style="max-height: 440px;">

        {{-- <h2 class="m-0 display-5 font-weight-semi-bold " style="background-color: #B08C76;font-family: Copperplate Gothic Light; font-size: 34px;">
            <span class=" font-weight-bold  px-1 mr-1" style="background-color: #1C1C1C ;color: #B08C76; ">SILK &
            </span>COTTON</h2> --}}



        </a>

        {{-- <a href="/" class="text-decoration-none ">
            <h2 class="m-0 display-5 font-weight-semi-bold " style="background-color: #B08C76;font-family: Copperplate Gothic Light; font-size: 34px;">
                <span class=" font-weight-bold  px-1 mr-1" style="background-color: #1C1C1C ;color: #B08C76; ">SILK &</span>COTTON</h2>
        </a> --}}

        {{-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Silk & </span>Cotton</h1> --}}
    {{-- </a> --}}
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">

            <a href="/" class="nav-item nav-link">Home</a>


            <a href="/shop" class="nav-item nav-link">Shop</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                <div class="dropdown-menu rounded-0 m-0">

                    @foreach($categories as $category)
                    <a href="/category/{{ $category->id }}" class="dropdown-item">{{$category->name}}</a>

                    @endforeach

                </div>
            </div>

            <a href="/cart" class="nav-item nav-link">Cart</a>






            {{-- <a href="{{route('checkout')}}" class="nav-item nav-link">Checkout</a> --}}


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="/contact-us" class="dropdown-item">Contact Us</a>
                    <a href="/about-us" class="dropdown-item">About Us</a>
                </div>
            </div>

        </div>
        <div class="navbar-nav ml-auto py-0">

            @auth
            <a href="{{ route('logout') }}" class="nav-item nav-link">Logout</a>
            <a href="/client/account" class="nav-item nav-link">Account</a>
            @else
            <a href="/login" class="nav-item nav-link">Login</a>
            <a href="/register" class="nav-item nav-link">Register</a>
            @endauth

        </div>
    </div>
</nav>
