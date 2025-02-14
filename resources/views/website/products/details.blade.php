@extends('website.layouts.main')
@section('title','product details')
@section('content')
<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Shop Single</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{asset('storage/'.$product->image)}}" alt="">
                    </div>
                    <!-- <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div> -->
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$product->name}}</h3>
                    <h2>{{$product->price}} EGP</h2>
                    <ul class="list">
                        <li><a class="active" ><span>Category</span> : {{$product->category->name}}</a></li>
                        <li><a ><span>Availability</span> : @if($product->quantity>0) {{'In stock'}}@else {{'Out of stock'}} @endif</a></li>
                    </ul>
                    <p>{{$product->description}}</p>
                    <div class="product_count">
                        <form action="{{route('cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            @auth('web')
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::guard('web')->user()->id}}">
                            @endauth
                            <button class="button primary-btn" type="submit">Add to Cart</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                   aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                   aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <h5>Quantity</h5>
                            </td>
                            <td>
                                <h5>{{$product->quantity}}</h5>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>Status</h5>
                            </td>
                            <td>
                                <h5>@if($product->status==1) {{'Active'}}@else {{'Non-active'}} @endif</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Category</h5>
                            </td>
                            <td>
                                <h5>{{$product->category->name}}</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Overall</h5>
                                    <h4>{{$productReviews->count()}}</h4>
                                    <h6>({{$productReviews->count()}} Reviews)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Based on 3 Reviews</h3>
                                    <ul class="list">
                                        <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i>{{$productReviews->where('rating',5)->count()}}</a></li>
                                        <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i> {{$productReviews->where('rating',4)->count()}}</a></li>
                                        <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i> {{$productReviews->where('rating',3)->count()}}</a></li>
                                        <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i> {{$productReviews->where('rating',2)->count()}}</a></li>
                                        <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i> {{$productReviews->where('rating',1)->count()}}</a></li>
                                        <li><a href="#">0 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i> {{$productReviews->where('rating',0)->count()}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            @foreach($productReviews as $productReview)
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/site/img/product/review.jpeg')}}" width="60" height="60" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>{{$productReview->name}}</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>{{$productReview->message}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <ul class="list" id="starRating">
                                <li><a href="#" data-value="1"><i class="fa fa-star"></i></a></li>
                                <li><a href="#" data-value="2"><i class="fa fa-star"></i></a></li>
                                <li><a href="#" data-value="3"><i class="fa fa-star"></i></a></li>
                                <li><a href="#" data-value="4"><i class="fa fa-star"></i></a></li>
                                <li><a href="#" data-value="5"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <p id="ratingText">Outstanding</p>
                            @include('admin.layouts.success')
                            <form action="{{route('review.store',$product->id)}}" method="POST" class="form-contact form-review mt-3" id="reviewForm">
                                @csrf
                                <input class="@error('rating') is-invalid @enderror" type="hidden" name="rating" id="ratingInput" value="0" >
                                @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Enter your name" >
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror"  name="email" type="email" placeholder="Enter email address" >
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('subject') is-invalid @enderror"   name="subject" type="text" placeholder="Enter Subject">
                                    @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100 @error('message') is-invalid @enderror" name="message" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group text-center text-md-right mt-3">
                                    <button type="submit" class="button button--active button-review">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>                </div>
            </div>
        </div>
    </div>
</section>
<section class="related-product-area section-margin--small mt-0">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>related Item in the market</p>
            <h2>Top <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row mt-30">
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    @foreach($relatedProducts as $relatedProduct) @endforeach
                    <div class="single-search-product d-flex">
                        <a><img width="50" src="{{asset('storage/'.$relatedProduct->image)}}" alt=""></a>
                        <div class="desc">
                            <a href="{{route('product.details',$relatedProduct->id)}}" class="title">{{$relatedProduct->name}}</a>
                            <div class="price">{{$relatedProduct->price}} EGP</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ end related Product area =================-->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#starRating a');
        const ratingInput = document.getElementById('ratingInput');
        const ratingText = document.getElementById('ratingText');

        // Rating text based on the selected value
        const ratingTexts = {
            1: 'Poor',
            2: 'Fair',
            3: 'Good',
            4: 'Very Good',
            5: 'Outstanding'
        };

        stars.forEach(star => {
            star.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default link behavior

                const value = this.getAttribute('data-value');
                ratingInput.value = value; // Update the hidden input
                ratingText.textContent = ratingTexts[value]; // Update the rating text

                // Highlight the selected stars
                stars.forEach((s, index) => {
                    if (index < value) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });
            });
        });
    });
</script>
