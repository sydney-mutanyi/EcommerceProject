@extends('app-layout.index')
@section('content')




    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">

                @include('app-layout.navbar')

            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">



            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8 pt-4">
                <div class="row pb-3">
   

                    <div class="col-md-6">
                        <div class="product-item bg-light mb-4">

                            <div class="card">
                                <div class="card-header" style="background-color:  #B08C76">
                                    <h4>Account Details</h4>
                                </div>
                                <div class="card-body">
                                    <p>User Id : {{ Auth::user()->id }}</p>

                                    <p>Name : {{ Auth::user()->name }}</p>
                                    <p>Email : {{ Auth::user()->email }}</p>
                            <br>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-item bg-light mb-4">

                            <div class="card">
                                <div class="card-header" style="background-color:  #B08C76">
                                    <h4>Address Book</h4>
                                </div>
                                <div class="card-body">

                                    <p>Contact : {{ Auth::user()->contact }}</p>

                                    <p>Nationality : {{ Auth::user()->nationality }}</p>
                                    <p>Location : {{ Auth::user()->location }}</p>




                                </div>
                            </div>

                        </div>
                    </div>



                </div>


            </div>
            <!-- Shop Product End -->

            @include('account.navbar')

                    <!-- Shop Sidebar Start -->

                    <!-- Shop Sidebar End -->
        </div>

    </div>
    <!-- Shop End -->
@endsection
