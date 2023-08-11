@extends('app-layout.index')
@section('content')

    <style>
        input[type=number]::-webkit-inner-spin-button {
            opacity: 1
        }

    </style>
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

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('uploads/' . $product->image) }}" alt="Image"
                                style="max-height: 440px;">
                        </div>

                        @foreach ($product->images as $item)
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('uploads/products/' . $item->image) }}" alt="Image2"
                                style="max-height: 440px;">
                        </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev"
                        style="max-height: 400px; min-height:350px">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
              
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">( {{ $product->stock_status }} )</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">Ksh. {{ $product->price }}</h3>
                <p class="mb-4">{{ $product->description }}</p>


                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex align-items-center mb-4 pt-2" style="width: 290px;">




                        @if (!$product->sizes->isEmpty())
                            <select class="custom-select mr-3  bg-secondary text-center" name="product_size">
                                @foreach ($product->sizes as $item)
                                    <option value="{{ $item->product_size }}">size - {{ $item->product_size }}</option>
                                @endforeach
                            </select>

                            @else
                        <input  type="hidden"  value="0" name="product_size">

                        @endif
                        @if (!$product->colors->isEmpty())

                            <select class="form-control bg-secondary text-center" name="product_color">
                                @foreach ($product->colors as $item)
                                    <option value="{{ $item->color_name }}">color - {{ $item->color_name }}</option>
                                @endforeach
                            </select>

                            @else

                        <input type="hidden"  value="null" name="product_color">


                        @endif
                    </div>

                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-1" style="width: 130px;">
                            <input type="number" min="1" max="9" name="quantity"
                                class="form-control bg-secondary text-center" value="1">

                        </div>

                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}" name="image">
                        {{-- <input type="hidden" value="{{ $product->quantity }}"  name="quantity"> --}}
                        {{-- <input type="hidden" value="1" name="quantity"> --}}

                        @if($product->stock_status == 'instock')
                        <button class="btn px-2"
                            style="background-color: #B08C76; color:black;font-family:Copperplate Gothic Light;font-weight:bold"><i
                                class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>

                      
                            
                        @else
                        <a href="/shop" class="btn px-2" style="background-color: #B08C76; color:black;font-family:Copperplate Gothic Light;font-weight:bold"
                            class="fa fa-shopping-cart mr-1">Shop</a>
                            
                        @endif
                    </div>
                </form>

            </div>

        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>

                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{ $product->description }}</p>

                </div>

                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Reviews for {{ $product->name }}</h4>

                            @foreach ($reviews as $key => $value)
                                <div class="media mb-4">

                                    <div class="media-body">
                                        <h6>{{ $value->name }}</h6>
                                        <div class="text-primary mb-2">
                                        </div>
                                        <p>{{ $value->review }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Required fields are marked *</small>
                            <div class="d-flex my-3">

                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form action="{{ route('save_review') }}" method="POST">
                                @csrf

                                <input type="text" class="form-control" name="product_id" value="{{ $product->id }}"
                                    hidden>
                                <input type="text" class="form-control" name="name" value="" hidden>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea name="review" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                @auth
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                @endauth
                                @guest
                                    <div class="form-group mb-0">

                                        <a href="/login" class="btn btn-primary px-3">Login to Make Review</a>
                                    </div>
                                @endguest


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Shop Detail End -->
    <!-- Products Start -->
    {{-- <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Related Products</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">

                    @foreach ($latest_products as $key => $value)
                        {{ $value->name }}
                    @endforeach
                    @foreach ($latest_products as $products1)
                        <div class="card product-item border-0">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('uploads/' . $products1->image) }}" alt=""
                                    style="height: 230px">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $products1->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Ksh. {{ $products1->price }}</h6>
                                    <h6 class="text-muted ml-2"><del>Ksh .123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="/product/{{ $products1->id }}/{{ Str::slug($products1->name) }}"
                                    class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                    Detail</a>
                                <a href="/product/{{ $products1->id }}/{{ Str::slug($products1->name) }}"
                                    class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div> --}}
    <!-- Products End -->

@endsection
