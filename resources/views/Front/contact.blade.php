@extends('Front.layout.layouts')
@section('title')
Contact us
@endsection

@section('style')



@endsection

@section('content')
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0" class="">


    <!-- Header -->
    <header class="header header-inverse" style="background-image: url({{asset('contact.jpg')}});" data-overlay="8">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1>Contactez-nous</h1>
                    <p class="fs-20 opacity-70">On est la pour toi</p>

                </div>
            </div>

        </div>
    </header>
    <!-- END Header -->




    <!-- Main container -->
    <main class="main-content">




        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Contact form
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section">
            <div class="container">

                <div class="row gap-y">
                    <div class="col-12 col-md-6">
                        <div class="alert alert-danger" id="contact-error" style="display: none;"></div>
                        <div class="alert alert-success" id="contact-success" style="display: none;">We received your message and will contact you back soon.</div>


                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" id="contact-name" placeholder="Your Name">
                        </div>

                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" id="contact-email" placeholder="Your Email Address">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" id="contact-message"></textarea>
                        </div>


                        <button class="btn btn-lg btn-primary btn-block" id="contact-send">Send Enquiry</button>
                    </div>


                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="bg-grey h-full p-20">
                            <p>Give us a call or stop by our door anytime, we try to answer all enquiries within 24 hours on business days.</p>
                            <p>We are open from 9am — 5pm week days.</p>

                            <hr class="w-80">

                            <p class="lead">6FST de Settat, Km 3, B.P. <br> 577 Route de Casablanca
                            </p>

                            <div>
                                <span class="d-inline-block w-20 text-lighter" title="Email">E:</span>
                                <span class="fs-14">contact_fsts@uhp.ac.ma</span>
                            </div>

                            <div>
                                <span class="d-inline-block w-20 text-lighter" title="Phone">P:</span>
                                <span class="fs-14">+ (212) 5 23.40.09.69</span>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>




        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Map
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->





    </main>
    <!-- END Main container -->








    </body>
@endsection
