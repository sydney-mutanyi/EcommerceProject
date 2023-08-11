@extends('admin.layout')
@section('content')


<div class="container">
    <div class="card-header pt-3 text-center"><h4>Locations</h4></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Location Name</th>
                       <th>Amount</th>
                       <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($locations as $value)

                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>

                        <td>Ksh. {{$value->amount}}</td>
                       <td> <a href="/location/{{ $value->id }}" class="btn btn-danger">X</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



        <div class="card-title pt-3 text-center">
            <h3>Create Location</h3>
        </div>
        <div class="container">
            <div class="jumbotron p-5">
                <form action="{{ route('create-location') }}" method="POST" enctype="multipart/form-data" onsubmit="myFunction()">
                    @csrf
                    <div class="form-group">
                        <label> Pick Up Location </label>
                        <input type="text" name="name" class="form-control" aria-describedby="name"
                            required="">
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control " aria-describedby="name"
                            required="">
                    </div>



                    <div class="input-submit pt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


        <script>
            function myFunction() {
              alert("Confirm to Save Location");
            }

       </script>

@endsection
{{-- </html> --}}
