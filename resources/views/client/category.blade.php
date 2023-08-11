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
                            <h2 class="section-title px-5"><span class="px-2">{{ $title }}</span></h2>
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
                                            {{-- <h6>Ksh.{{$product->price}}</h6><h6 class="text-muted ml-2"><del>Ksh.{{$product->reg_price}}</del></h6> --}}

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

                    <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            {!! $latest_products->links() !!}
                        </div>
                     </div>




 @endsection
