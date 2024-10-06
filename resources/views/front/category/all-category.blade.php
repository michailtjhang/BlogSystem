@extends('front.layouts.app')

@push('metaSeO')
    <meta name="author" content="BlogSystem" />
    <meta name="description"
        content="All Category Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru" />
    <meta name="keywords" content="list category BlogSystem, Kategori BlogSystem, daftar kategori BlogSystem">
    <meta name="og:title" content="{{ $page_title ?? 'Blog' }} - {{ config('app.name', 'BlogSystem') }}">
    <meta name="og:description"
        content="All Category Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:site_name" content="Blog System">
    <meta name="og:type" content="website">
@endpush

@section('content')
    <!-- Page content-->
    <div class="container">

        <p>Showing all results with Category</p>

        <div class="row">
            @foreach ($categories as $item)
                <div class="col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ route('category', $item->slug) }}" class="unstyled-link text-dark">
                                    <span>
                                        <i class="fas fa-folder fa-4x"></i>
                                    </span>
                                    <h5 class="card-title mt-2">
                                        {{ $item->name }} ( {{ $item->articles_count }} )
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
