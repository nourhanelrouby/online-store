@extends('website.layouts.main')
@section('title', 'Contact-us')

@section('content')
    <section class="blog-banner-area" id="contact">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section-margin--small">
        <div class="container">

            <!-- Google Map -->
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 420px; width: 100%;"></div>
                <script>
                    function initMap() {
                        var location = { lat: 30.7135, lng: 30.6776 }; // Itay El-Baroud, Beheira, Egypt

                        var grayStyles = [
                            {
                                featureType: "all",
                                stylers: [
                                    { saturation: -90 },
                                    { lightness: 50 }
                                ]
                            },
                            { elementType: 'labels.text.fill', stylers: [{ color: '#A3A3A3' }] }
                        ];

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: location,
                            zoom: 12, // Adjust zoom level
                            styles: grayStyles,
                            scrollwheel: false
                        });

                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            title: "Itay El-Baroud, Beheira, Egypt"
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_REAL_API_KEY&callback=initMap" async defer></script>
            </div>

            <!-- Contact Information -->
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Itay El-Baroud, Beheira, Egypt</h3>
                            <p>Itay El-Baroud</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:01102617603">01102617603</a></h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@ruby.com">support@ruby.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-8 col-lg-9">
                    @include('admin.layouts.success')
                    <form action="{{route('contact.store')}}" class="form-contact contact_form" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" placeholder="Enter your name">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder="Enter email address">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" type="text" placeholder="Enter Subject">
                                    @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100 @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
