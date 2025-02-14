@extends('website.layouts.main')
@section('title','Favorites Products')
@section('content')
    <!-- ================ favorites products section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Favorites</p>
                <h2>Favorite <span class="section-intro__style">Products</span></h2>
            </div>
            <div class="row">
                @if($favorites->count() > 0)
                    @foreach($favorites as $favorite)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset('storage/'.$favorite->image) }}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        {{--                                        <li><button><i class="ti-search"></i></button></li>--}}
                                        <li><button><i class="ti-shopping-cart"></i></button></li>
                                        <form action="{{route('favorite')}}" method="POST">
                                            @csrf
                                            @if(auth('web')->user())
                                                <input type="hidden" name="user_id" value="{{auth('web')->user()->id}}">
                                            @endif
                                            <input type="hidden" name="product_id" value="{{$favorite->id}}">
                                            <li><button type="submit"><i class="ti-heart"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{$favorite->category->name}}</p>
                                    <h4 class="card-product__title"><a href="{{route('product.details',$favorite->name)}}">{{$favorite->name}}</a></h4>
                                    <p class="card-product__price">{{$favorite->price}} EGP</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert-danger">Favorites is empty</p>
                @endif

            </div>
        </div>
    </section>
    <!-- ================ All product section end ================= -->



@stop
