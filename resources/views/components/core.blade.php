@extends('front.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{ $url->title }}</h1>
            </div>
            <div class="col-lg-8">
                {!! $url->body !!}
            </div>
        </div>
        <hr>
        @include('components.category', [$categories, ($type = '1')])
        <hr>
        @include('components.category', [$categories, ($type = '2')])
        <hr>
        @include('components.category', [$categories, ($type = '3')])

        <hr>
        <h1>Featured Programs</h1>
        @include('components.listing', [$featured, ($type = 'featured')])

        <hr>

        <h1>Basic Programs</h1>
        @include('components.listing', [$basic, ($type = 'basic')])

        <hr>
        <h1>Featured Banner</h1>
        @include('components.listing', [$featured_banner, ($type = 'featured_banner')])

        <hr>
        <h1>Video Banner</h1>
        @include('components.listing', [$video, ($type = 'video')])
    </div>
@endsection
