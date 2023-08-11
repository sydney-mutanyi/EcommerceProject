@extends('app-layout.index')
@section('content')


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

            </div>
            <div class="col-lg-9">

                @include('app-layout.navbar')
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Home</a>
                    <a class="breadcrumb-item text-dark" href="/shop">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="container-fluid">
        <form  action="{{ route('create.checkout') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">

                <div class="container-fluid bg-secondary mb-5">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 60px">
                        <h1 class="font-weight-semi-bold text-uppercase mb-1">Billing Address</h1>

                    </div>
                </div>
                     <div class="bg-light p-30 mb-5">
                    <form action="{{ route('create.checkout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Client Name</label>
                                <input class="form-control" type="text" name="name"  value= "{{$user->name}}" placeholder="Peter" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lname" value= "{{$user->lname}}"  placeholder="Edward" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="text" value= "{{$user->email}}"  placeholder="example@email.com"
                                    required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Contact</label>
                                <input class="form-control" name="phone" type="tel" value="{{$user->contact}}" placeholder="+254 7 456 789">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>City/Town</label>
                                <input class="form-control" name="town" value= "{{$user->location}}" type="text" placeholder="Nairobi">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Nationality</label>
                                <input class="form-control" name="nationality" value= "{{$user->nationality}}" type="text" placeholder="Kenya">
                            </div>

                            <div class="container-fluid bg-secondary mb-5 mt-5">
                                <div class="d-flex flex-column align-items-center justify-content-center"
                                    style="min-height: 70px">
                                    <h2 class="font-weight-semi-bold text-uppercase mb-1">Payment & Shipping</h2>

                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card text-center">
                                    <div class="custom-control custom-radio pt-2 pb-2">
                                    <h5>
                                        Lipa Na Mpesa
                                    </h5>
                                           
                                 
                                            <img  src="{{ asset('uploads/mpesa_logo.png' ) }}" alt="Image2"
                                            style="height: 90px; width:130px">    
                                
                                    
                                    </div>
                                </div>

            
                            </div>
                           

                            <div class="col-md-6">
                                <br>

                              <h6>  Pay Silk & Cotton  </h6>
                          
                              <h6>  1. Provide your Mpesa Mobile Number <br>
                                2. Click Make Order and a prompt will Appear on your phone Requesting you to confirm transaction by providing your MPESA PIN <br>
                                3. Once completed , you will receive the confirmation SMS for this transaction </h6>

                            </div>

                            <div class="col-md-6 form-group">
                                <label>Mpesa No (254711111111)</label>
                                <input class="form-control" type="number"
                                onkeypress="return checkEntry(event)" onpaste="return checkEntry(event)" onchange="return checkEntry(event)"
                                 minlength="12" maxlength="12"
                                name="mobile" value="254"  placeholder="254 7 456 789" required>
                            </div>


                                <script>
                                function checkEntry(e) {
                                var k;
                                document.all ? k = e.keyCode : k = e.which;
                                return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
                                }
                                </script>

                            <div class="col-md-6 form-group">
                                <label>Pickup Location</label>
                                <select class="custom-select" name="location">
                                    @foreach($locations as $key => $value)
                                    <option value="{{$value->name}}">{{$value->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                        Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>

                        @foreach ($cartItems as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->name }}</p>
                                <p>Ksh. {{ $item->price *$item->quantity}}</p>
                            </div>
                        @endforeach

                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Ksh. {{ Cart::getSubTotal() }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Ksh.300</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Ksh. {{ $cartTotal }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary ">Payment</span></h5><br>
                    <div class="bg-light p-30">
                         {{-- <div class="card text-center">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" checked> 
                          
                                   
                                <input type="radio"  id="html" name="fav_language" value="HTML" checked style="padding-left: 10px">   


                                    <img  src="{{ asset('uploads/mpesa_logo.png' ) }}" alt="Image2"
                                    style="height: 80px; width:120px">        
                            
                            </div>
                        </div>  --}}
                      
                        <br>


                        @if (Cart::getContent()->count() == 0)
                            <a href="/shop" class="btn btn-block btn-primary font-weight-bold py-3">Continue Shopping</a>
                        @else
                            <button class="btn btn-block btn-primary font-weight-bold py-3">Make Order</button>
                        @endif

                        <br>
                        <br>

                        <a href="tel:254707683772" class="btn btn-block btn-info font-weight-bold py-3">Call To Order</a>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->






@endsection
