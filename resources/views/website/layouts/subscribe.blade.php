<!-- ================ Subscribe section start ================= -->
<section class="subscribe-position">
    <div class="container">
        <div class="subscribe text-center">
            <h3 class="subscribe__title">Get Update From Anywhere</h3>
            <p>Bearing Void gathering light light his evening unto dont afraid</p>
            <div id="mc_embed_signup">
                <form target="_blank" action="{{ route('subscribe') }}" method="POST" class="subscribe-form form-inline mt-5 pt-1">
                    @csrf <!-- Add CSRF token for Laravel -->
                    <div class="form-group ml-sm-auto">
                        <input class="form-control mb-1" type="email" name="email" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
                        <div class="info"></div>
                    </div>
                    <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ Subscribe section end ================= -->
