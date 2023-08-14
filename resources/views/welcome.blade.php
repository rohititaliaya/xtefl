@extends('front.app')
@section('content')
<div id="teachenglish">
    <div class="container">
        <div class="row">
            
        </div>
    </div>
</div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>Xplore Abroad: International Study and Travel Programs</h1>
                <p>Shortly coming up with program listings for:</p>
                <ul>
                    <li>Study Abroad</li>
                    <li>Interships Abroad</li>
                    <li>Volunteer Abroad</li>
                    <li>Teach Abroad</li>
                    <li>High School Abroad</li>
                    <li>Gap Year Abroad</li>
                    <li>Degrees Abroad</li>
                    <li>TEFL Courses</li>
                    <li>Language Schools</li>
                    <li>Adventure &amp; Travel</li>
                </ul>

                <p>Smart travelers know that when it comes to cultural immersion, nothing beats travel abroad. But with the
                    cost of study abroad programs skyrocketing, most families aren’t able to afford such a
                    once-in-a-lifetime experience. That’s where XploreAbroad.com steps in: we enable young people from all
                    backgrounds and income levels to go on an authentic cross-cultural adventure by leveraging scholarships
                    and internships with top universities around the world—basically making their résumés look like they
                    went on a full scholarship! </p>

                <p>What we’ve done is create a home for all of your travel needs. XploreAbroad.com houses hundreds of
                    international internship and study abroad programs right at your fingertips! We know how difficult it
                    can be to find the perfect program that suits you, which is why we bundle resources like application
                    tips, test prep guides, and language lessons into one spot on our website.
                </p>
            </div>
        </div>
        <hr>
        {{-- <div class="row">
            <div class="col-12">
                
                
                <ul>
                @foreach ($urls as $item)
                    <li>
                        <a href="{{ $item->slug }}">{{ $item->title }}</a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div> --}}
        {{-- <hr>
            @include('components.category', [$categories, $type='1'])
        <hr>
            @include('components.category', [$categories, $type='2'])
        <hr>
            @include('components.category', [$categories, $type='3'])

            <hr> --}}
        {{-- <h1>Featured Programs</h1>
        @include('components.listing', [$featured, $type='featured'])
        
        <hr>

        <h1>Basic Programs</h1>
        @include('components.listing', [$basic, $type='basic'])

        <hr>
        <h1>Featured Banner</h1>
        @include('components.listing', [$featured_banner, $type='featured_banner'])

        <hr>
        <h1>Video Banner</h1>
        @include('components.listing', [$video, $type='video'])
    </div> --}}
@endsection
