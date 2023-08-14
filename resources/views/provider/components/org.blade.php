<div data-anim-child="fade" class="section-bg__item -w-1500 rounded-4 bg-blue-2"></div>
<div class="container">
    <div class="row y-gap-30 items-center justify-between">
        <div data-anim-child="slide-up delay-2" class="col-xl-5 col-lg-6">
            <p class="uppercase underline">Featured Organization</p>
            <h4 class="text-30 lh-15 mt-20">{{$org_listing->provider->name}}</h4>
            <p class="mt-15 text-18">{{$org_listing->description}}</p>
            <div class="d-flex items-center mt-20">
                <a href="{{$org_listing->url}}" class="button px-30 fw-400 text-14 -dark-1 bg-blue-1 text-white h-50">Learn More</a>
            </div>
        </div>
        <div data-anim-child="slide-up delay-3" class="col-lg-6"> <img src="{{ asset('/uploads/' . $org_listing->image) }}" alt="image"
                class="rounded-4"> </div>
    </div>
</div>
