@extends('front.layouts.app')

@push('metaSeO')
    <meta name="author" content="BlogSystem" />
    <meta name="description"
        content="About Blog System, Seputar Informasi Teknologi, Artis, Model, Idol dan sejenisnya Terbaru" />
    <meta name="keywords" content="About BlogSystem, Tentang BlogSystem, Apa itu BlogSystem">
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
                <div class="card mb-4 shadow-sm">
                    <a href=""><img class="card-img-top single-img" src="{{ asset('assets/front/img/about.jpg') }}"
                            alt="" /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('M d, Y') }}</div>
                        <h2 class="card-title">About Blogs</h2>
                        <p class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas consequuntur quae culpa similique
                            harum, praesentium doloremque quasi cum dolore neque. Aperiam quia facilis dolor odio rem
                            voluptatem voluptas? Tempora, nemo!
                        </p>

                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius minus reprehenderit neque
                            quisquam quis quibusdam iure nisi dolorem amet, officia hic soluta consectetur, qui quasi nobis
                            ducimus! Rerum, sint praesentium.
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit quam quia ipsum alias similique
                            consequuntur explicabo, quis ratione quos animi error ducimus, amet illo provident eum ea
                            tempore fuga dolores.
                        </p>

                        <ul>
                            <li><a href="https://www.youtube.com">Youtube</a></li>
                            <li><a href="https://www.instagram.com">Instagram</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layouts.side-widget')

        </div>
    </div>
@endsection
