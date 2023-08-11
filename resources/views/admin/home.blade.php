@extends('admin.layout')

@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <div class="page-pretitle">Overview</div>
                <h2 class="page-title">Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="teal fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Total Orders</p>
                                    <span class="number">{{$orders_count}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">

                                <a href ="/orderspdf" class="btn btn-info btn-sm">Download Report</a>
                                {{-- <i class="fas fa-calendar"></i> For this Period --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="olive fas fa-money-bill-alt"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Products</p>
                                    <span class="number">{{$products_count}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> Total
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="violet fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Product Reviews</p>
                                    <span class="number">{{$reviews_count}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-stopwatch"></i> This Month
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="orange fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Support Request</p>
                                    <span class="number">{{$contacts_count}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-envelope-open-text"></i> For this Month
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="content">
                                <div class="head">
                                    <h5 class="mb-0">Latest Orders</h5>



                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>

                                                    <th>Name</th>

                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($client_orders as $value)

                                                <tr>
                                                    <th scope="row">{{$value->id}}</th>

                                                    <td> {{$value->name}}</td>


                                                    <td>{{$value->total}}</td>
                                                    <td>{{$value->status}}</td>
                                                    <td>

                                                        <a href ="/admin-order/{{ $value->id }}" class="btn btn-info btn-sm">View</a>
                                                    </td>


                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>


                                    </div>


                                </div>
                                <div class="canvas-wrapper">
                                    <canvas class="chart" id="trafficflow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="content">
                                <div class="head">
                                    <h5 class="mb-0">Sales Inquiry</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>

                                                    <th>Name</th>

                                                    <th>Contact</th>
                                                    <th>Email</th>



                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($contact_us as $value)

                                                <tr>
                                                    <th scope="row">{{$value->id}}</th>

                                                    <td> {{$value->name}}</td>


                                                    <td>{{$value->contact}}</td>
                                                    <td>{{$value->email}}</td>



                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <div class="canvas-wrapper">
                                    <canvas class="chart" id="sales"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection
