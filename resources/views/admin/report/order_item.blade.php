@extends('admin.layout')
@section('content')

<div class="container-fluid pt-5">

    <div class="row">

    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h5> Customer Details</h5>
            </div>


            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Customer Name
                      <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $client_order->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Email Adress
                      <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $client_order->email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Location
                      <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $client_order->location }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Contact
                        <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $client_order->contact }}</span>
                      </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Status
                        <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $client_order->status }}</span>
                      </li>

                      {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total
                        <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $client_order->total }}</span>
                      </li> --}}
                  </ul>



            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h5>Order Items</h5>
            </div>


            <div class="card-body">
                {{-- @foreach ($client_order->orderItems as $item)
                    <h3>{{ $item->name }} - {{ $item->price }} - {{ $item->quantity }}</h3>
                @endforeach
                <p>{{ $client_order->id }}</p> --}}


                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Order Number
                      <span class="badge badge-primary badge-pill" style="color:rgba(22, 21, 21, 0.815); font-size:14px">{{ $client_order->id }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        SubTotal
                        <span class="badge badge-primary badge-pill" style="color:rgba(22, 21, 21, 0.815); font-size:14px">{{ $client_order->subtotal }}</span>
                      </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total
                        <span class="badge badge-primary badge-pill" style="color:rgba(22, 21, 21, 0.815); font-size:14px">{{ $client_order->total }}</span>
                      </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Prod Name
                        <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">QTY</span>
                        <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">Price</span>
                      </li>

                    @foreach ($client_order->orderItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item->name }}
                      <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $item->quantity }}</span>
                      <span class="badge badge-primary badge-pill" style="color:black; font-size:14px">{{ $item->price }}</span>
                    </li>

                    @endforeach

                  </ul>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 text-center">

        <form action="{{ route('update.order.status') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <br>

            <div class="col-md-9 form-group">
                <input type="hidden" name="id" value="{{$client_order->id}}">
                <label>Manage Order</label>
                <select class="custom-select" name="status">
                    <option value="ordered">ordered </option>
                    <option value="approved">approved </option>
                    <option value="delivered">delivered</option>
                    <option value="cancelled">cancelled </option>

                                                    </select>
            </div>

            <div class="input-submit pt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>

    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h5>Payment Details</h5>
            </div>


            <div class="card-body">
                {{-- @foreach ($client_order->orderItems as $item)
                    <h3>{{ $item->name }} - {{ $item->price }} - {{ $item->quantity }}</h3>
                @endforeach
                <p>{{ $client_order->id }}</p> --}}


                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Transaction Id
                      <span class="badge badge-primary badge-pill" style="color:rgba(22, 21, 21, 0.815); font-size:14px">{{ $client_order->transaction->id }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Name
                        <span class="badge badge-primary badge-pill" style="color:rgba(22, 21, 21, 0.815); font-size:14px">{{ $client_order->transaction->name }}</span>
                      </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Payment Status
                        <span class="badge badge-primary badge-pill" style="color:rgba(22, 21, 21, 0.815); font-size:14px">{{ $client_order->transaction->status }}</span>
                      </li>




                  </ul>
<div class="container-fluid text-center">



                  <form action="{{ route('update.payment.status') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <br>

                    <div class="col-md-9 form-group">
                        <input type="hidden" name="id" value="{{$client_order->id}}">
                        <label>Payment Status</label>
                        <select class="custom-select" name="status">

                            <option value="approved">approved </option>
                            <option value="pending">pending</option>
                            <option value="cancelled">cancelled </option>

                                                            </select>
                    </div>

                    <div class="input-submit pt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>

            </div>
        </div>
    </div>

</div>
</div>



@endsection
