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

                    <!-- Products Start -->
                    <div class="container-fluid pt-5">
                        <div class="text-center mb-4">
                            <h2 class="section-title px-5"><span class="px-2">Flash Sales</span></h2>
                        </div>
                        <div class="row px-xl-5 pb-3">


                            @foreach($featured_products as $product)


                            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ asset('uploads/' . $product->image)}}" alt="" style="height: 280px; width:auto">



                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>Ksh.{{$product->price}}</h6><h6 class="text-muted ml-2"><del>Ksh.{{$product->reg_price}}</del></h6>
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

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">





            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
          <br>
                </div>
                <!-- Price End -->
                <br>

                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4 pt-5" >
                    <h5 class="font-weight-semi-bold mb-4 text-center">Categories</h5>
                    <hr>
                    <form>

                        @foreach($categories as $key => $value)

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <h5><a href="/category/{{ $value->id }}" >{{$value->id}}. {{$value->name}}</a></h5>
                        </div>

                        @endforeach

                    </form>
                </div>

                <div class="border-bottom mb-4 pb-4 pt-5" >
                    <h5 class="font-weight-semi-bold mb-4 text-center">Top Products</h5>
                    <hr>
                    <form>

                        @foreach($featured_products as $key => $value)

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <label><a href="/product/{{ $value->id }}/{{ Str::slug($value->name) }}" > {{$value->name}}</a></label>
                        </div>

                        @endforeach

                    </form>
                </div>
                <!-- Color End -->


                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">

                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2">Latest Products</span></h2>
                </div>
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <button class="input-group-text bg-transparent text-primary"> <i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    @foreach($latest_products as $product)


                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('uploads/' . $product->image)}}" style="height: 300px" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Ksh. {{$product->price}}</h6><h6 class="text-muted ml-2"></h6>
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
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

 @endsection
