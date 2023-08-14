<div data-anim-child="fade" class="section-bg__item -w-1500 rounded-4 bg-blue-2"></div>
<div class="container">
    <div class="row y-gap-30 items-center justify-between">
        <div data-anim-child="slide-up delay-2" class="col-xl-5 col-lg-6">
            <p class="uppercase underline">Video of the month</p>
            <h4 class="text-20 lh-15 mt-20">
                {{$video_listing->title}}
            </h4>
            <p class="mt-15">Organization: {{$video_listing->provider->name}}</p>
            <div class="d-flex items-center mt-20">
                <a href="{{$video_listing->url}}"
                    class="button px-30 fw-400 text-14 -dark-1 bg-blue-1 text-white h-50">Learn More</a>
            </div>
        </div>
        <div data-anim-child="slide-up delay-3" class="col-lg-6"> 
            {{-- <img src="/preview/img/header/1.jpg" alt="image" class="rounded-4"> --}}
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_listing->video_id }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
         </div>
    </div>
</div>