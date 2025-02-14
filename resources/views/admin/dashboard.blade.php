@extends('admin.layouts.main')
@section('title', 'Home')
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 style="font-size: larger; font-weight: bold;" class="mb-0"> Dashboard</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right"></ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fa fa-list highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p  style="font-size: larger; font-weight: bold;" class="card-text text-dark">Categories</p>
                            <h4>{{\App\Models\Category::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <span class="text-warning">
                            <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark" style="font-size: larger; font-weight: bold;">Orders</p>
                            <h4>{{ \App\Models\Order::count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <span class="text-primary">
                            <i class="fa fa-product-hunt highlight-icon" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark" style="font-size: larger; font-weight: bold;">Products</p>
                            <h4>{{ \App\Models\Product::count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                        <span class="text-danger">
                            <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark" style="font-size: larger; font-weight: bold;">Users</p>
                            <h4>{{ \App\Models\User::count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Order Status Chart -->
        <div class="col-xl-6 mb-30">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Order Status Chart</h5>
                    <canvas id="orderStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Product Status Chart -->
        <div class="col-xl-6 mb-30">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Product Status Chart</h5>
                    <canvas id="productStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="{{asset('https://cdn.jsdelivr.net/npm/chart.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Order Status Chart
            var orderCtx = document.getElementById('orderStatusChart').getContext('2d');
            new Chart(orderCtx, {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Canceled', 'Done'],
                    datasets: [{
                        label: 'Orders',
                        data: [
                            {{ \App\Models\Order::where('status', 'pending')->count() }},
                            {{ \App\Models\Order::where('status', 'canceled')->count() }},
                            {{ \App\Models\Order::where('status', 'done')->count() }}
                        ],
                        backgroundColor: ['#f39c12', '#e74c3c', '#2ecc71']
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            // Product Status Chart
            var productCtx = document.getElementById('productStatusChart').getContext('2d');
            new Chart(productCtx, {
                type: 'pie',
                data: {
                    labels: ['Active', 'Non-Active'],
                    datasets: [{
                        label: 'Products',
                        data: [
                            {{ \App\Models\Product::where('status', '1')->count() }},
                            {{ \App\Models\Product::where('status', '0')->count() }}
                        ],
                        backgroundColor: ['#3498db', '#95a5a6']
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>

@endsection
