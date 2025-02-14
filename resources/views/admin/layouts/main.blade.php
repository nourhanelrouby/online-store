<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('admin.layouts.head')
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

@include('admin.layouts.header')

@include('admin.layouts.sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">

    @yield('page-header')

    @yield('content')

    <!--=================================
 wrapper -->

        <!--=================================
footer -->

        @include('admin.layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('admin.layouts.footer-scripts')
{{--@include('sweet::alert')--}}
</body>

</html>
