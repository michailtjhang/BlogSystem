@extends('front.layouts.app')

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
