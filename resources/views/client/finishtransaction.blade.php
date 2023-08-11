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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Payment</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Payment</p>
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

        <div class="row px-xl-5">
            <div class="col-lg-8">


                <div class="container-fluid bg-secondary mb-5">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 60px">
                        <h3 class="font-weight-semi-bold text-uppercase mb-1">Make Payment</h3>

                    </div>
                </div>

                {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5> --}}
                <div class="bg-light p-30 mb-5">

                        <div class="row">
                            <div class="col-md-12 form-group">
                            <div class="card-header">
                                <div class="h4 text-center">
                                    Order Pending Approval
                                </div>


                                <script>
                                    var timer = setTimeout(function() {
                                        window.location='{{route('client_orders')}}'
                                    }, 20000);
                                </script>

                            </div>
                            </div>


                        </div>

                        {{-- <div class="input-submit pt-5">
                            <a href="/shop" class="btn btn-block btn-primary font-weight-bold py-3" style="width 70%">Make Payment</a>
                        </div> --}}


                </div>



            </div>
            <div class="col-lg-4">
                {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                        Total</span></h5> --}}
                {{-- <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>

                        @foreach ($cartItems as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->name }}</p>
                                <p>Ksh. {{ $item->price }}</p>
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
                </div> --}}

            </div>
        </div>

    </div>
    <!-- Checkout End -->


@endsection
