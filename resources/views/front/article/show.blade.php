@extends('front.layouts.app')

@push('metaSeO')
    <meta name="author" content="{{ $article->user->name }}" />
    <meta name="description" content="{{ Str::limit(strip_tags($article->desc), 150, '...') }}" />
    <meta name="keywords" content="{{ $article->title }} - {{ config('app.name', 'BlogSystem') }}">
    <meta name="og:title" content="{{ $page_title ?? 'Blog' }} - {{ config('app.name', 'BlogSystem') }}">
    <meta name="og:description" content="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:image" content="{{ asset('storage/article/' . $article->img) }}">
    <meta name="og:site_name" content="Blog System">
    <meta name="og:type" content="article">
@endpush

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4" data-aos="fade-up">
                    <a href="{{ route('p', $article->slug) }}"><img class="card-img-top single-img"
                            src="{{ asset('storage/article/' . $article->img) }}" alt="{{ $article->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="ml-2">{{ $article->created_at->format('M d, Y') }}</span>
                            <span class="ml-2">{{ $article->user->name ?? '' }}</span>
                            <span class="ml-2"><a
                                    href="{{ route('category', $article->category->slug) }}">{{ $article->category->name }}</a></span>
                            <span class="ml-2">views {{ $article->views }}</span>
                        </div>
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="card-text">{!! $article->desc !!}</p>

                        <div class="mt-5">
                            <p style="font-size: 16px"><b>Share this article</b></p>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                class="btn btn-primary" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></a>
                            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-success"
                                target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a></a>
                        </div>
                        <div id="disqus_thread" class="mt-5"></div>
                    </div>
                </div>
            </div>

            @include('front.layouts.side-widget')

        </div>
    </div>
@endsection

@section('js')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://blogsytem.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
@endsection
