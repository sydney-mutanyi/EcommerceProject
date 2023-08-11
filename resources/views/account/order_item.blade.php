@extends('app-layout.index')
@section('content')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                @include('app-layout.navbar')
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid bg-light">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->

            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            {{-- <h3 class="text-center">Client Account </h3> --}}

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-6 col-sm-6">


                        <div class="container-fluid pb-1 pt-1 " style="background-color:  #B08C76">

                            <h5 class=" position-relative text-uppercase text-center"><span class=" pr-3">     ORDER INFORMATION</span></h5>
                        </div>


                        <div class="product-item bg-light mb-4 text-center">
                            <div class="py-2">
                                <a class="h6 text-decoration-none text-truncate"
                                    style="font-size:21px; font-weight:normal;font-family: Helvetica,">Order Id :
                                    {{ $client_order->id }}</a>

                                <p class="text-decoration-none text-truncate text-center pt-3"
                                    style="font-size:18px; font-weight:normal;font-family: Helvetica,">
                                    Delivery Location:{{ $client_order->location }} </p>

                                <p class="text-decoration-none text-truncate text-center"
                                    style="font-size:18px; font-weight:normal;font-family: Helvetica,">
                                    Placed On : {{ $client_order->created_at->format('d/m/Y') }} </p>
{{--                                 
                                <p class="text-decoration-none text-truncate "
                                    style="font-size:18px; font-weight:normal;font-family: Helvetica,">
                                    Status : {{ $client_order->status }} <br>
                                    Payment Status: {{ $client_order->transaction->status }}<br>
                                    Total : Ksh {{ $client_order->total }}

                                </p> --}}

                                <p class="text-decoration-none text-truncate text-center"
                                style="font-size:18px; font-weight:normal;font-family: Helvetica,">
                                Status: {{ $client_order->status }} </p>

                        



                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 col-lg-12 text-center">


                        <form action="{{ route('update.order.status') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <br>



                            <div class="col-md-9 form-group">
                                <input type="hidden" name="id" value="{{ $client_order->id }}">
                                <label>Manage Order</label>
                                <select class="custom-select" name="status">

                                    <option value="delivered" class="p-3">Confirm Delivery</option>
                                    <option value="cancelled" class="p-3">Cancell Order </option>

                                </select>

                                <div class="input-submit pt-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>


                        </form>

                    </div>

                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="h4 text-center pb-2 pt-2" style="background-color:  #B08C76">
                            ORDER ITEMS
                        </div>

                        @foreach ($client_order->orderItems as $item)

                            <div class="product-item bg-light mb-2">
                                <div class="py-2">

                                    <p class="text-decoration-none text-truncate "
                                        style="font-size:18px; font-weight:normal;font-family: Helvetica,">
                                        Product Name : {{ $item->name }} 
                                        <br>

                                        Qty : {{ $item->quantity }}
                                    <br>

                                    Product Price : Ksh.{{ $item->price }}

                                    <br>
                                    Color : {{ $item->color }}
                                    <br>
                                    Size : {{ $item->size }}

                                    </p>
                                    
        

                                </div>
                            </div>

                        @endforeach

                    </div>

                    <div class="col-md-6">
                        <div class="product-item bg-light mb-4">

                            <div class="card">
                                <div class="card-header" style="background-color:  #B08C76">
                                    <h4>Payment Information</h4>
                                </div>
                                <div class="card-body">

                                    <p>Payment Method
                                        <br>
                                        Lipa Na M-pesa
                                    </p>


                                    Mpesa Number : {{ $client_order->contact }}<br>

                                    Subtotal : Ksh. {{ $client_order->Subtotal }}<br>

                                    Transport : Ksh.300<br>


                                    Total : Ksh. {{ $client_order->total }}
                                    <br>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-item bg-light mb-4">

                            <div class="card">
                                <div class="card-header" style="background-color:  #B08C76">
                                    <h4>Delivery Information</h4>
                                </div>
                                <div class="card-body">

                                    <p>Delivery Method
                                    </p>

                                    <p> Pickup Location : {{ $client_order->location }}<br></p>




                                </div>
                            </div>

                        </div>
                    </div>


                </div>


            </div>
            <!-- Shop Product End -->

            @include('account.navbar')
        </div>

    </div>
    <!-- Shop End -->
@endsection
