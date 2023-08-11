@extends('admin.layout')
@section('content')

<div class="col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header text-center"><h4>Products List</h4></div>
        <div class="card-body">
            <div class="card-button">

            </div>

            <a href="{{ route('create_product') }}" class="btn btn-block btn-sm btn-primary font-weight-bold py-3"> Create New Product</a>

<br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>

                            <th>Quantity</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($product as $value)

                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <td>{{$value->name}}</td>
                            <td>Ksh. {{$value->price}}</td>
                            <td>{{$value->category}}</td>
                            <td>{{$value->quantity}}</td>
                            <td> <a href="/products-listing/{{ $value->id }}" class="btn btn-sm btn-info">view</a></td>
                            <td> <a href="/update_product/{{ $value->id }}" class="btn btn-sm btn-secondary">update</a></td>


                            <td> <a href="/remove-product/{{ $value->id }}" class="btn btn-sm btn-danger">X</a></td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {!! $product->links() !!}
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection
