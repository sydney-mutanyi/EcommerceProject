@extends('app-layout.index')
@section('content')


<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">

        </div>
        <div class="col-lg-9">


            @include('app-layout.navbar')
        </div>
    </div>
</div>

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Affordable Pricing</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Decent Fashion Shop</h3>
                                    <a href="/contact-us" class="btn btn-light py-2 px-3">Contact us</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Helping You With your look</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Services</h3>
                                    <a href="/shop" class="btn btn-light py-2 px-3">Start Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">

        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Categories</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($categories as $key => $value)

            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
           
                    <a href="/category/{{ $value->id }}" class="cat-img position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('uploads/' . $value->image)}}" alt="" style="height: 300px">
                    </a>


                    <a href="/category/{{ $value->id }}" style="font-size:19"
                        class="btn btn-sm text-dark p-0 text-center"><h5 class="font-weight-semi-bold">{{$value->name}}</h5></a>

                </div>
            </div>

            @endforeach

        </div>
    </div>
    <!-- Categories End -->



        <!-- Subscribe Start -->
        <div class="container-fluid my-5" style="background-color:  #B08C76">

            <div style="margin-top:30px">
                @if ($message=Session::get('success'))
                 <div class="alert alert-success">
                     <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                     <strong>{{$message}}</strong>
                 </div>
                 @endif

                 @if ($message=Session::get('error'))
                 <div class="alert alert-danger">
                     <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                     <strong>{{$message}}</strong>
                 </div>
                 @endif
                </div>

            <div class="row justify-content-md-center py-5 px-xl-5">
                <div class="col-md-6 col-12 py-5">
                    <div class="text-center mb-2 pb-2">
                        <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                        <p>Subscribe to our Email Service to get our Notifications</p>
                    </div>
                    <form action="{{ route('save_contact') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4" name="email" required placeholder="Email Goes Here">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    <!-- Products Start -->
    <div class="container-fluid pt-3">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">New Arrivals</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($latest_products as $product)


            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('uploads/' . $product->image)}}" alt="" style="height: 280px; width:auto">

                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Ksh.{{$product->price}}</h6><h6 class="text-muted ml-2">

                                
                                @if ($product->featured == 1 )
                                <del>Ksh.{{$product->reg_price}}</del></h6>
                                
                                @else
                                
                                    
                                @endif
                                
                     
                                
                            
                            </h6>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="/product/{{ $product->id }}/{{ Str::slug($product->name) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="/product/{{ $product->id }}/{{ Str::slug($product->name) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
    <!-- Products End -->

              <!-- Featured Start -->
              <div class="container-fluid pt-5">
                <div class="row px-xl-5 pb-3">
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        {{-- <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fa fa-shipping-fast  text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                        </div> --}}
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fa fa-check text-primary m-0 mr-2"></h1>
                            <h5 class="font-weight-semi-bold m-0">Quality Products</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        {{-- <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Featured End -->















    <!-- Vendor End -->

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Sept 5, 2022 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;

          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Display the result in the element with id="demo"
          document.getElementById("demo").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";

          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }, 1000);
        </script>


    @endsection
