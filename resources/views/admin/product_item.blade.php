@extends('admin.layout')
@section('content')

    <div class="container-fluid pt-5">

        <div class="row">

            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5> Product Details</h5>
                    </div>


                    <div class="card-body">

                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Product Name
                                <span class="badge badge-primary badge-pill"
                                    style="color:black; font-size:14px">{{ $product->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Selling Price
                                <span class="badge badge-primary badge-pill"
                                    style="color:black; font-size:14px">{{ $product->price }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Regular Price
                                <span class="badge badge-primary badge-pill"
                                    style="color:black; font-size:14px">{{ $product->reg_price }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Category
                                <span class="badge badge-primary badge-pill"
                                    style="color:black; font-size:14px">{{ $product->category }}</span>
                            </li>




                        </ul>



                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Product Sizes</h5>
                    </div>


                    <div class="card-body">

                        <ul class="list-group">

                            @foreach ($product->sizes as $item)

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Size
                                <span class="badge badge-primary badge-pill"
                                    style="color:black; font-size:14px">{{ $item->product_size }}</span>
                            </li>
                            @endforeach

                        </ul>

                        <div class="card-header text-center">
                            <h5>Product Colors</h5>
                        </div>


                        <ul class="list-group">

                            @foreach ($product->colors as $item)

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Color
                                <span class="badge badge-primary badge-pill"
                                    style="color:black; font-size:14px">{{ $item->color_name }}</span>
                            </li>
                            @endforeach

                        </ul>


                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 text-center">

                <div class="card">

                    <div style="margin-top:30px">
                        @if ($message=Session::get('success'))
                         <div class="alert alert-success">
                             <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                             <strong>{{$message}}</strong>
                         </div>
                         @endif
            
                         @if ($message=Session::get('error'))
                         <div class="alert alert-danger">
                             <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                             <strong>{{$message}}</strong>
                         </div>
                         @endif
                        </div>

                    <div class="card-header text-center">
                        <h5>Add Images</h5>
                    </div>

                <div class="container-fluid text-center">

                <form action="{{ route('create.product.image') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <br>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="input-group pt-2">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" required>
                            <label class="custom-file-label">Choose Image</label>
                        </div>
                    </div>

                    <div class="input-submit pt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-6 text-center">

                <div class="card">
                    <div class="card-header text-center">
                        <h5>Product Images</h5>


                    </div>

                    <div class="container-fluid text-center">


                        <ol>
                            @foreach ($product->images as $item)
                            <li>
                                {{$item->image}}
                            </li>
                            @endforeach

                        </ol>

                    

         
              

                    </div>

                </div>
            </div>

            <div class="col-md-6 col-lg-6 text-center">

                <div class="card">
                    <div class="card-header text-center">
                        <h5>Add Product Color</h5>
                    </div>

                <div class="container-fluid text-center">

                <form action="{{ route('create.product.color') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <br>
        

                    <div class="col-md-9 form-group ">
                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group pl-3">
                            <label><strong> Add Color</strong> </label>
                            <br>
                            <input type="text" name="color_name" class="form-control" aria-describedby="name"
                                required="">
                        </div>
                    </div>

                    <div class="input-submit pt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Add Product Size</h5>
                    </div>


                    <div class="card-body">
                        <div class="container-fluid text-center">

                            <form action="{{ route('create.product.size') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <br>

                                <div class="col-md-9 form-group">
                                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="form-group">
                                        <label><strong>  Product Size</strong> </label>
                                        <br>
                                        <input type="text" name="product_size" class="form-control" aria-describedby="name"
                                            required="">
                                    </div>
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
