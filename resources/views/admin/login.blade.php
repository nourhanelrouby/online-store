
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Dashboard / login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.ico')}}" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/admin/css/ltr.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{asset('assets/admin/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
preloader -->

    <!--=================================
login-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: {{asset('assets/admin//Admin/images/login-bg.jpg')}};">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image: {{asset('assets/admin//images/login-inner-bg.jpg')}};">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white" style="font-size: larger">Welcome Back</p>
{{--                          <ul class="list-unstyled  pos-bot pb-30">--}}
{{--                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of </a> </li>--}}
{{--                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">Login</h3>
                        @if(session()->has('error'))<p class="alert alert-danger">{{ session()->get('error') }}</p>@endif
                        <form method="POST" action="{{route('admin.postLogin')}}">
                            @csrf
                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">Email</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30"><input type="checkbox" class="form-control" name="remember" id="two" /><label for="two"> Remember me </label>
                                </div>
                            </div>
                            <button class="button"><span>Submit</span><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
<!-- jquery -->
<script src="{{ URL::asset('assets/admin//js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/admin//js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/admin//js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/admin//js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/admin/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/admin/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/admin/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/admin/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/admin/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/admin/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/admin/js/custom.js') }}"></script>

</body>

</html>
