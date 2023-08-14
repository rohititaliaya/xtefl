<div class="container">
    <div class="row y-gap-20">
        @foreach ($featured_listing as $item)
            <div data-anim="slide-up" class="col-md-6 is-in-view">
                <div class="ctaCard -type-1 rounded-4 ">
                    <div class="ctaCard__image ratio ratio-63:55">
                        <img class="img-ratio js-lazy loaded" src="{{ asset('/uploads/' . $item->image) }}" alt="{{$item->title}}"
                            data-ll-status="loaded">
                    </div>

                    <div class="ctaCard__content py-70 px-70 lg:py-30 lg:px-30">

                        <div class="text-15 fw-500 text-white mb-10"> {{ $item->provider->name }}</div>
                        <h4 class="text-24 lg:text-18 text-white">{{ $item->title }}</h4>

                        <div class="d-inline-block mt-30">
                            <a href="{{ route('listingclicks') }}?url={{ $item->url }}&listing={{ $item->id }}&attribute=link&country={{$country}}&mobile={{$mobile}}&ip={{$ip}}"
                                class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="cardImage__leftBadge" style="z-index: 1;">
                        <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark">
                            {{ $item->tag }} </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
