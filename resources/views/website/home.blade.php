@extends('website.layouts.main')
@section('title','Home')

@section('content')
    <!--================ Hero banner start =================-->
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{asset('assets/site/img/home/hero-banner.png')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Shop is fun</h4>
                        <h1>Browse Our Premium Product</h1>
                        <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
        <div class="owl-carousel owl-theme hero-carousel">
            <div class="hero-carousel__slide">
                <img src="{{asset('assets/site/img/home/hero-slide1.png')}}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="{{asset('assets/site/img/home/hero-slide2.png')}}}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="{{asset('assets/site/img/home/hero-slide3.png')}}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
        </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Trending <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{asset('storage/'.$product->image)}}" width="20%" alt="">
                            <ul class="card-product__imgOverlay">
                                @php($user = \Illuminate\Support\Facades\Auth::guard('web')->user())
                                <form action="{{route('cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    @auth('web')
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                    @endauth
                                <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                                </form>
                                <form action="{{route('favorite')}}" method="POST">
                                    @csrf
                                    @auth('web')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    @endauth
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                <li><button type="submit"><i class="ti-heart"></i></button></li>
                                </form>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>{{$product->category->name}}</p>
                            <h4 class="card-product__title"><a href="{{route('product.details',$product->id)}}">{{$product->name}}</a></h4>
                            <p class="card-product__price">{{$product->price}} EGP</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="offer__content text-center">
                        <h3>Up To 50% Off</h3>
                        <h4>Winter Sale</h4>
                        <p>Him she'd let them sixth saw light</p>
                        <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ offer section end ================= -->

    <!-- ================ Best Selling item  carousel ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Offer Item in the market</p>
                <h2>Best <span class="section-intro__style">Offers</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                @foreach($productsHasOffers as $productsHasOffer)
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('storage/'.$productsHasOffer->image)}}" alt="">
                        <ul class="card-product__imgOverlay">
                            @php($user = \Illuminate\Support\Facades\Auth::guard('web')->user())
                            <form action="{{route('cart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                @auth('web')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                @endauth
                                <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                            </form>
                            <form action="{{route('favorite')}}" method="POST">
                                @csrf
                                @auth('web')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                @endauth
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <li><button type="submit"><i class="ti-heart"></i></button></li>
                            </form>
                        </ul>

                    </div>
                    <div class="card-body">
                        <p>{{$productsHasOffer->category->name}}</p>
                        <h4 class="card-product__title"><a href="{{route('product.details',$productsHasOffer->id)}}">{{$productsHasOffer->name}}</a></h4>
                        <p class="card-product__price">{{$productsHasOffer->price }} EGP</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->

    <!-- ================ Blog section start ================= -->
    <section class="blog">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Latest <span class="section-intro__style">News</span></h2>
            </div>

            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card card-blog">
                        <div class="card-blog__img">
                            <img width="50" class="card-img rounded-0" src="{{asset('storage/'.$blog->image)}}" alt="">
                        </div>
                        <div class="card-body">
                            <ul class="card-blog__info">
                                <li><a href="#">By Admin</a></li>
                            </ul>
                            <h4 class="card-blog__title"><a href="{{route('blog.details',$blog->id)}}">{{$blog->title}}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
