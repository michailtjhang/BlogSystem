@extends('front.layouts.app')

@push('metaSeO')
    <meta name="author" content="BlogSystem" />
    <meta name="description" content="Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru" />
    <meta name="keywords" content="BlogSystem, informasi">
    <meta name="og:title" content="{{ $page_title ?? 'Blog' }} - {{ config('app.name', 'BlogSystem') }}">
    <meta name="og:description" content="Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:site_name" content="Blog System">
    <meta name="og:type" content="website">
@endpush

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm" data-aos="fade-in">
                    <a href="{{ route('p', $last_articles->slug) }}"><img class="card-img-top feature-img"
                            src="{{ asset('storage/article/' . $last_articles->img) }}"
                            alt="{{ $last_articles->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $last_articles->created_at->format('M d, Y') }}
                            |
                            <a href="{{ route('category', $last_articles->category->slug) }}">
                                {{ $last_articles->category->name }}
                            </a>
                            |
                            {{ $last_articles->user->name ?? '' }}
                        </div>
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
                                        |
                                        <a href="{{ route('category', $item->category->slug) }}">
                                            {{ $item->category->name }}
                                        </a>
                                        |
                                        {{ $item->user->name ?? '' }}
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
