@extends('app-layout.index')
@section('content')

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

            </div>
            <div class="col-lg-9">
                @include('app-layout.navbar')
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    {{-- <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Contact</p>
            </div>
        </div>
    </div> --}}
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">About Us</span></h2>
        </div>


        <div class="row px-xl-5">


            <div class="col-lg-7 mb-5">


                    <div class="position-relative" style="z-index: 1;">
                        <h4 class="text-uppercase text-primary mb-3 text-center">Our Mission</h4>
                        <p class="mb-4 font-weight-semi-bold">
                            At Crescent Silk & Cotton, we aim to run professionally managed auctioneering firm by closely working with our clients to satisfy their expectations and provide best quality debt recovery services.

                            Being a Class ‘B’ licensed by the Silk & Cotton Licensing board of Kenya to operate in the Republic of Kenya.
                        </p>

                    </div>


                    <div class="position-relative pt-5" style="z-index: 1;">
                        <h4 class="text-uppercase text-primary mb-3 text-center">Experience</h4>
                        <p class="mb-4 font-weight-semi-bold">
                            The proprietor Associates’ are academically and qualified Silk & Cotton bringing together a wide exposure and useful experience gained over the years.
                            <br>

                            We are a team of experienced staff who will collaborate with your office/credit department to ensure that accounts placed with us are dealt with within the shortest practicable time and to a logical conclusion.
                        </p>

                    </div>


            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p> Directions to Us.</p>
                <div class="d-flex flex-column mb-3">

                    <div class="bg-light p-30 mb-30">
                        <iframe style="width: 100%; height: 250px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d510568.0076564096!2d36.8268237!3d-1.2865228!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f112868e2d369%3A0xb83a685588e80edb!2sKTDA%20Plaza%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1658391797833!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        {{-- src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" --}}
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>


                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Store</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Nairobi</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+254 777777</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
