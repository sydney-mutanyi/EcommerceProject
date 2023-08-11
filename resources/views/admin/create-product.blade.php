
@extends('admin.layout')
@section('content')
<div class="card-header">
    <div class="card-title pt-2 text-center">
        <h3>Create New Product</h3>
    </div>

</div>

    <div class="container">
        <div class="jumbotron p-5">
            <form action="{{ route('create_product') }}" method="POST" enctype="multipart/form-data" onsubmit="myFunction()">
                @csrf
                <div class="form-group">
                    <label> Product Name</label>
                    <input type="text" name="name" class="form-control" aria-describedby="name" required="">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Priority</label>
                    <select name="featured" id="featured" class="form-select" required="">

                        <option value="0">Normal Product</option>
                        <option value="1">Flash Sale</option>
                    </select>
                    <div class="valid-feedback">Right!</div>
                    <div class="invalid-feedback">Please select item</div>
                </div>

                <div class="form-group pt-3">
                    <label>Current Price (Ksh)</label>
                    <input type="number" min="0" name="price" class="form-control" aria-describedby="emailHelp"
                        required="">
                </div>
                <div class="form-group pt-3">
                    <label>Initial Price (Ksh)</label>
                    <input type="number" name="reg_price" min="0" value="0" class="form-control"
                        aria-describedby="emailHelp" required="">
                </div>
                <div class="form-group pt-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" min="0" class="form-control" aria-describedby="emailHelp"
                        required="">
                </div>
                <div class="form-group pt-3">
                    <label>Product Description</label>
                    <input type="text" name="description" class="form-control" aria-describedby="emailHelp"
                        required="">
                </div>



                <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select" required="">
                        <option disable selected>--select category--</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">Right!</div>
                    <div class="invalid-feedback">Please select item</div>
                </div>



                <div class="input-group pt-2">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" required>
                        <label class="custom-file-label">Choose Image</label>
                    </div>
                </div>


  

                <div class="input-submit pt-5">


                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function myFunction() {
          alert("Confirm to Save Product");
        }

   </script>
@endsection

