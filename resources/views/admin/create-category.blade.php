@extends('admin.layout')
@section('content')


<div class="container">
    <div class="card-header pt-3 text-center"><h4>Categories</h4></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                       <th>Description</th>
                       <th>Actions </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($category as $value)

                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>

                        <td>{{$value->description}}</td>
                        <td> <a href="/remove-category/{{ $value->id }}" class="btn btn-sm btn-danger">X</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



        <div class="card-title pt-3 text-center">
            <h3>Create Category</h3>
        </div>
        <div class="container">
            <div class="jumbotron p-5">
                <form action="{{ route('create-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> Category Name</label>
                        <input type="text" name="name" class="form-control" aria-describedby="name"
                            required="">
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control " aria-describedby="name"
                            required="">
                    </div>

                    <div class="input-group pt-2">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" required>
                            <label class="custom-file-label">Choose Image</label>
                        </div>
                    </div>

                    <div class="input-submit pt-5">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
{{-- </html> --}}
