@extends('front.layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container">
        <h1>Available Surveys</h1>
        <a href="{{ route('surveys.create') }}" class="btn btn-success mb-2 btn-sm">
            Take Survey
        </a>
        <ul>
            @foreach ($surveys as $survey)
                <li>
                    <a href="{{ route('surveys.show', $survey->id) }}">{{ $survey->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('js')
@endsection
