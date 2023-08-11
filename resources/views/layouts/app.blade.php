<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Silk & Cotton</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row py-2 px-xl-5" style="background-color:#B08C76">

            <div class="col-lg-6 text-center text-lg-right">

            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

                <a href="/" class="text-decoration-none ">
                    {{-- <h3 class="m-0 display-5 font-weight-semi-bold " 
                    style="background-color: #B08C76;font-family: Copperplate Gothic Light; font-size: 30px;">
                        <span class=" font-weight-bold  px-1 mr-1"
                         style="background-color: #1C1C1C ;color: #B08C76; ">SILK &</span>COTTON</h3>
           --}}
                         <img src="{{ asset('uploads/casuals/ecomerce_logo1.png') }}" alt="Image"
                         style="max-height: 440px;">
     
                        </a>
    


            </div>
            <div class="col-lg-6 col-6 text-left">

 



            </div>

            <div class="col-lg-3 col-6 text-right">
   
                <a href="{{ route('cart.list1') }}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ Cart::getTotalQuantity()}}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


  @yield('content')



    <!-- Footer Start -->
    <div class="container-fluid text-dark mt-5 pt-5" style="background-color:#B08C76">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">Silk &</span>Cotton</h1>
                </a>

                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Nairobi</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@crescentSilk & Cotton.co.ke</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0722528938</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Home</a>

                            <a class="text-dark mb-2" href="/about-us"><i class="fa fa-angle-right mr-2"></i>About us</a>
                            <a class="text-dark mb-2" href="/contact-us"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Home</a>

                            <a class="text-dark mb-2" href="/about-us"><i class="fa fa-angle-right mr-2"></i>About us</a>
                            <a class="text-dark mb-2" href="/contact-us"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form  action="{{ route('save_contact') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4"  name="name" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" name="email" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site</a>. All Rights Reserved. Designed
                    by SYdtech Solns

                </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js')}}"></script>
</body>

</html>



