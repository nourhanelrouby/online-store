@extends('website.layouts.main')
@section('title', 'Blog')
@section('content')

    <!-- Blog Section -->
    <section class="blog_area py-5">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top rounded" alt="{{ $blog->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <a href="{{route('blog.details',$blog->id)}}" class="btn btn-primary read-more-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>

@endsection
