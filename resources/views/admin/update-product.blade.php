
@extends('admin.layout')
@section('content')
<div class="card-header">
    <div class="card-title pt-2 text-center">
        <h3>Update Product</h3>
    </div>

</div>

    <div class="container">
        <div class="jumbotron p-5">
            <form action="{{ route('product_update') }}" method="POST" enctype="multipart/form-data" onsubmit="myFunction()">
                @csrf

                <input  type="hidden"  value="{{$product->id}}" name="product_id">

                <div class="form-group">
                    <label> Product Name</label>
                    <input type="text" name="name" value ="{{$product->name}}" class="form-control" aria-describedby="name" required="">
                </div>



                <div class="form-group pt-3">
                    <label>Current Price (Ksh)</label>
                    <input type="number" min="0" name="price" value ="{{$product->price}}" class="form-control" aria-describedby="emailHelp"
                        required="">
                </div>
       
                <div class="form-group pt-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" min="0"  value ="{{$product->quantity}}"class="form-control" aria-describedby="emailHelp"
                        required="">
                </div>
                <div class="form-group pt-3">
                    <label>Product Description</label>
                    <input type="text" name="description" value ="{{$product->description}}" class="form-control" aria-describedby="emailHelp"
                        required="">
                </div>



                <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Stock Status</label>
                    <select name="stock_status" id="stock_status" class="form-select" required="">
                    
                     
                            <option value="outofstock">Out of Stock</option>
                            <option value="instock">In Stock</option>


                    
                    </select>
      
                </div>



                <div class="input-submit pt-5">


                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function myFunction() {
          alert("Confirm to Update Product");
        }

   </script>
@endsection

