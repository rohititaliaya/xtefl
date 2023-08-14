<div class="container">
    <div data-anim-child1="slide-up" class="row y-gap-20 justify-between items-end">
        <div class="col-auto">
            <div class="sectionTitle -md">
                <h2 class="sectionTitle__title">Popular TEFL Courses</h2>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex x-gap-15 items-center justify-center pt-40 sm:pt-20">
                <div class="col-auto">
                    <button class="d-flex items-center text-24 arrow-left-hover js-featured2-prev"> <i
                            class="icon icon-arrow-left"></i> </button>
                </div>
                <div class="col-auto">
                    <div class="pagination -dots text-border js-featured2-pag"></div>
                </div>
                <div class="col-auto">
                    <button class="d-flex items-center text-24 arrow-right-hover js-featured2-next"> <i
                            class="icon icon-arrow-right"></i> </button>
                </div>
            </div>
        </div>
    </div>
    <div data-anim-wrap class="pt-40 overflow-hidden js-section-slider swiper-container" data-gap="30"
        data-slider-cols="xl-5 lg-4 md-3 sm-2 base-1" data-nav-prev="js-featured2-prev"
        data-pagination="js-featured2-pag" data-nav-next="js-featured2-next">
        <div class="swiper-wrapper">
            @foreach ($basic_listing as $item)
            <div data-anim-child="slide-left delay-4" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="{{ asset('/uploads/' . $item->image) }}" alt="image"> </div>
                            <div class="cardImage__leftBadge">
                                <div
                                    class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                                    {{Str::upper($item->tag)}} </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                        <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500"> <span>{{$item->title}}</span> </h4>
                        <p class="text-light-1 lh-14 text-14 mt-5">{{$item->provider->name}}</p>
                        <div class="d-flex items-center mt-20"> <a href="{{ route('basic-clicks') }}?url={{ $item->url }}&listing={{ $item->id }}&attribute=link&country={{$country}}&mobile={{$mobile}}&ip={{$ip}}"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
