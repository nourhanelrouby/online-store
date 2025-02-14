@extends('website.layouts.main')
@section('title', 'Blog details')
@section('content')

    <!-- Blog Section -->
    <section class="blog_area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <!-- Blog Image -->
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top rounded-top" alt="{{ $blog->title }}">

                        <!-- Blog Content -->
                        <div class="card-body p-4">
                            <!-- Blog Title -->
                            <h1 class="card-title mb-3">{{ $blog->title }}</h1>

                            <!-- Blog Meta (e.g., date, author) -->
                            <div class="d-flex align-items-center mb-4">
                                <small class="text-muted me-3"><i class="fas fa-calendar-alt me-2"></i>{{ $blog->created_at->format('M d, Y') }}</small>
                                <br>
                                <small class="text-muted"><i class="fas fa-user me-2"></i>By {{ 'ADMIN' }}</small>
                            </div>

                            <!-- Blog Description -->
                            <div class="card-text">
                                {!! $blog->description !!}
                            </div>
                        </div>

                        <!-- Optional: Blog Tags or Categories -->
                        <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-secondary">Technology</span>
                                <span class="badge bg-secondary">Web Development</span>
                                <span class="badge bg-secondary">Laravel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
