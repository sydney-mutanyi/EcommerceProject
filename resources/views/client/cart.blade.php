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


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800" style=" color:green"><b>*{{ $message }}</b></p>
        </div>
    @endif
        <div class="row px-xl-5">



        @if (Cart::getContent()->count() == 0)

        <div class="col-lg-8 table-responsive mb-5 text-center">
                <div class="card-body pt-3 pb-5">
                    <h3>Cart is Empty</h3>
                </div>

                <div class="container pt-3">

                    <a href="/shop" class="btn btn-primary" style="align-content: center; height:40px"><strong>Continue Shopping</strong></a>
                </div>

            </div>

        @else
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>X</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @foreach ($cartItems as $item)
                        <tr>
                            <td class="align-middle">{{$item->name}}</td>
                            <td class="align-middle">Ksh. {{ $item->price }}</td>



                            <td class="align-middle">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                    <input type="number" min="0" name="quantity" value="{{ $item->quantity }}"
                                        class="  text-center bg-gray-300" style="width:40px" />

                                            <button class="btn btn-sm "><i class="fa fa-check"></i></button>
                                </form>
                            </td>
                            <td class="align-middle">Ksh. {{ $item->price * $item->quantity }} </td>
                          <td class="align-middle">  <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                            </form>
                        </td>


                        @endforeach

                    </tbody>
                </table>

                <div class="container pt-3 text-center">
                    <br>

                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf

                        <button class="btn btn-sm btn-primary">Clear All<i class="fa fa-tick"></i></button>

                    </form>

                </div>
            </div>

            @endif
            <div class="col-lg-4">

            
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Ksh.{{ Cart::getTotal() }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Ksh.300</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Ksh.{{$cartTotal}}</h5>
                        </div>

                        <div class="container text-center">
                            <a href ="{{ route('checkout') }}" class="btn btn-bloc btn-primary font-weight-normal my-3 py-3 text-center" style="text-align: center">Proceed To
                                Checkout</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection
