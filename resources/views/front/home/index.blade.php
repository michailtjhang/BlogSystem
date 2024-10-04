@extends('front.layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm" data-aos="fade-in">
                    <a href="{{ route('p', $last_articles->slug) }}"><img class="card-img-top feature-img" src="{{ asset('storage/article/' . $last_articles->img) }}"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $last_articles->created_at->format('M d, Y') }}</div>
                        <h2 class="card-title">{{ $last_articles->title }}</h2>
                        <p class="card-text">{{ Str::limit(strip_tags($last_articles->desc), 200, '...') }}</p>
                        <a class="btn btn-primary" href="{{ route('p', $last_articles->slug) }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($articles as $item)
                        <div class="col-lg-6" data-aos="fade-up">
                            <!-- Blog post-->

                            <div class="card mb-4 shadow-sm">
                                <a href="{{ route('p', $item->slug) }}"><img class="card-img-top post-img"
                                        src="{{ asset('storage/article/' . $item->img) }}" alt="..." /></a>
                                <div class="card-body card-height">
                                    <div class="small text-muted">
                                        {{ $item->created_at->format('M d, Y') }}
                                        {{-- <a href="{{ route('category', $item->category->slug) }}"> --}}
                                            {{ $item->category->name }}
                                        {{-- </a> --}}
                                    </div>
                                    <h2 class="card-title h4">{{ $item->title }}</h2>
                                    <p class="card-text">{{ Str::limit(strip_tags($item->desc), 100, '...') }}</p>
                                    <a class="btn btn-primary" href="{{ route('p', $item->slug) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination justify-content-center my-4">
                    {{ $articles->links() }}
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layouts.side-widget')

        </div>
    </div>
@endsection
