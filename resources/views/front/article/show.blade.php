@extends('front.layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4" data-aos="fade-up">
                    <a href="{{ route('p', $article->slug) }}"><img class="card-img-top single-img" src="{{ asset('storage/article/' . $article->img) }}"
                            alt="{{ $article->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="ml-2">{{ $article->created_at->format('M d, Y') }}</span>
                            <span class="ml-2">{{ $article->user->name ?? '' }}</span>
                            <span class="ml-2"><a href="{{ route('category', $article->category->slug) }}">{{ $article->category->name }}</a></span>
                            <span class="ml-2">views {{ $article->views }}</span>
                        </div>
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="card-text">{!! $article->desc !!}</p>
                    </div>
                </div>
            </div>

            @include('front.layouts.side-widget')

        </div>
    </div>
@endsection
