@extends('front.layouts.app')

@push('metaSeO')
    <meta name="author" content="BlogSystem" />
    <meta name="description"
        content="Category Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru" />
    <meta name="keywords" content="Category BlogSystem, Kategori BlogSystem">
    <meta name="og:title" content="{{ $page_title ?? 'Blog' }} - {{ config('app.name', 'BlogSystem') }}">
    <meta name="og:description"
        content="Category Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:site_name" content="Blog System">
    <meta name="og:type" content="website">
@endpush

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-4">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Articles..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Search!</button>
                </div>
            </form>
        </div>

        <p>Showing results for Category "<b>{{ $categories }}</b>"</p>

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-4">
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
            @empty
                <p>Not found</p>
            @endforelse

        </div>

        <div class="pagination justify-content-center my-4">
            {{ $articles->links() }}
        </div>

    </div>
@endsection
