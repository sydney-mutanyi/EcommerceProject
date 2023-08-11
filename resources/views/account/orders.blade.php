@extends('app-layout.index')
@section('content')



    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                @include('app-layout.navbar')
            </div>
        </div>
    </div>
    <!-- Breadcrumb Start -->

    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid ">

        <div class="row px-xl-5">



            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8 pt-2">
                <div class="row pb-3">
                    <div class="col-12 pb-1 pt-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div class="container-fluid pb-3 pt-2" style="background-color:  #B08C76">
                                {{-- <h5 class="section-title position-relative text-uppercase mb-2 mt-2"><span class=" pr-3">Navigation</span></h5> --}}
                                <h5 class=" position-relative text-uppercase text-center"><span class=" pr-3">Orders</span></h5>
                            </div>


                        </div>
                    </div>




                    <div class="col-lg-12 col-md-6 col-sm-6 ">


                        @foreach ($client_orders as $order)
                            <div class="card" style="background-color:white ">
                                <div class="product-item mb-2" style="background-color: white">
                                    <div class=" pl-2">

                                        <p class="text-decoration-none text-truncate text-center "
                                            style="font-size:18px; font-weight:normal;font-family: Helvetica, ">
                                            {{ $order->name }}</p>


                                        <h6 class="text-decoration-none text-truncate " style="text-align:left;
                                            font-size:16px; font-weight:normal;font-family: Roboto, ">
                                            Order Number : {{ $order->id }} <br> Total Cost: Ksh.{{ $order->total }}

                                            <br>Date Ordered: {{ $order->created_at->format('d/m/Y') }}
                                            <br>
                                            Status: {{ $order->status }}


                                        </h6>


                                        <div class="container text-center">
                                            <a href="/client/order/{{ $order->id }}" class="btn btn-primary ">View
                                                Details</a>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <br>

                        @endforeach

                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                {!! $client_orders->links() !!}
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
