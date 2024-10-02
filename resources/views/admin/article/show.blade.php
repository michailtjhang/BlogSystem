@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
            </ol>
        </nav>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-stripped">
                    <tr>
                        <th>Title</th>
                        <th>: {{ $article->title }}</th>
                    </tr>
                    <tr></tr>
                    <th>Category</th>
                    <th>: {{ $article->category->name }}</th>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <th>: {!! $article->desc !!}</th>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <th>
                            <a href="{{ asset('storage/article/' . $article->img) }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('storage/article/' . $article->img) }}" alt="" width="500">
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>Views</th>
                        <th>: {{ $article->views }}</th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        @if ($article->status == 1)
                            <th>: <span class="badge badge-success">Published</span></th>
                        @else
                            <th>: <span class="badge badge-danger">Draft</span></th>
                        @endif
                    </tr>
                    <tr>
                        <th>Published Date</th>
                        <th>: {{ $article->published_date }}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
