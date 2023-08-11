@extends('admin.layout')
@section('content')

<div class="col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header text-center"><h4>{{$title}}</h4></div>
        <div class="card-body">
            <div class="card-button">

            </div>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>

                            <th>Pickup Location</th>
                            <th>Mobile</th>
                            <th>SubTotal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach($client_orders as $value)

                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <td>{{$value->user_id}}</td>
                            <td> {{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->location}}</td>
                            <td>{{$value->contact}}</td>
                            <td>{{$value->subtotal}}</td>

                            <td>{{$value->total}}</td>
                            <td>{{$value->status}}</td>
                            <td>

                                <a href ="/admin-order/{{ $value->id }}" class="btn btn-info btn-sm">View</a>
                            </td>


                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {!! $client_orders->links() !!}
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection
