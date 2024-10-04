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

                        <div class="mt-5">
                            <p style="font-size: 16px"><b>Share this article</b></p>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="btn btn-primary" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></a>
                            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a></a>
                        </div>
                    </div>
                </div>
            </div>

            @include('front.layouts.side-widget')

        </div>
    </div>
@endsection
