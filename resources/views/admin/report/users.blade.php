@extends('admin.layout')
@section('content')

<div class="col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header text-center"><h4>Manage Users</h4></div>
        <div class="card-body">
            <div class="card-button">

            </div>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>Name</th>
                            <th>Date</th>
                            <th>Email</th>





                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $value)

                        <tr>
                            <th scope="row">{{$value->id}}</th>

                            <td> {{$value->name}}</td>
                           <td> {{ $value->created_at->format('d/m/Y') }}</td>
                            <td>{{$value->email}}</td>
                         

      


                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>
                 </div>
            </div>

        </div>
    </div>
</div>

@endsection
