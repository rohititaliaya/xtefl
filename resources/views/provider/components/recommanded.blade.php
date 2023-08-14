<div class="container">
    <div data-anim-child1="slide-up" class="row y-gap-20 justify-between items-end">
        <div class="col-auto">
            <div class="sectionTitle -md">
                <h2 class="sectionTitle__title">Recommended TEFL Courses</h2>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex x-gap-15 items-center justify-center pt-40 sm:pt-20">
                <div class="col-auto">
                    <button class="d-flex items-center text-24 arrow-left-hover js-featured-prev"> <i
                            class="icon icon-arrow-left"></i> </button>
                </div>
                <div class="col-auto">
                    <div class="pagination -dots text-border js-featured-pag"></div>
                </div>
                <div class="col-auto">
                    <button class="d-flex items-center text-24 arrow-right-hover js-featured-next"> <i
                            class="icon icon-arrow-right"></i> </button>
                </div>
            </div>
        </div>
    </div>
    <div data-anim-wrap class="pt-40 overflow-hidden js-section-slider" data-gap="30"
        data-slider-cols="xl-4 lg-3 md-2 sm-2 base-1" data-nav-prev="js-featured-prev"
        data-pagination="js-featured-pag" data-nav-next="js-featured-next">
        <div class="swiper-wrapper">
            @foreach ($basic_listing as $item)
                
            <div data-anim-child="slide-left delay-4" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="{{ asset('/uploads/' . $item->image) }}" alt="{{$item->title}}"> </div>
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
                        <div class="d-flex items-center mt-20"> <a href="#"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            <!--
            <div data-anim-child="slide-left delay-5" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="/preview/img/featured/2.jpg" alt="image"> </div>
                            <div class="cardImage__leftBadge">
                                <div
                                    class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                                    Popular </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                        <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500"> <span>Get TEFL
                                Certified & Teach English Abroad & Online</span> </h4>
                        <p class="text-light-1 lh-14 text-14 mt-5">TEFL Provider Name</p>
                        <div class="d-flex items-center mt-20"> <a href="#"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>



                        </div>
                    </div>
                </a>
            </div>
            <div data-anim-child="slide-left delay-6" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="/preview/img/featured/3.jpg" alt="image"> </div>
                            <div class="cardImage__leftBadge">
                                <div
                                    class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark-1">
                                    Top Rated </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                        <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500"> <span>Get TEFL
                                Certified & Teach English Abroad & Online</span> </h4>
                        <p class="text-light-1 lh-14 text-14 mt-5">TEFL Provider Name</p>
                        <div class="d-flex items-center mt-20"> <a href="#"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>



                        </div>
                    </div>
                </a>
            </div>
            <div data-anim-child="slide-left delay-7" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="/preview/img/featured/4.jpg" alt="image"> </div>
                            <div class="cardImage__leftBadge">
                                <div
                                    class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                                    Popular </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                        <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500"> <span>Get TEFL
                                Certified & Teach English Abroad & Online</span> </h4>
                        <p class="text-light-1 lh-14 text-14 mt-5">TEFL Provider Name</p>
                        <div class="d-flex items-center mt-20"> <a href="#"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>



                        </div>
                    </div>
                </a>
            </div>
            <div data-anim-child="slide-left delay-8" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="/preview/img/featured/5.jpg" alt="image"> </div>
                            <div class="cardImage__leftBadge">
                                <div
                                    class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white">
                                    Best Seller </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                        <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500"> <span>The Westin
                                New York at Times Square</span> </h4>
                        <p class="text-light-1 lh-14 text-14 mt-5">Manhattan, New York</p>
                        <div class="d-flex items-center mt-20"> <a href="#"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>



                        </div>
                    </div>
                </a>
            </div>
            <div data-anim-child="slide-left delay-9" class="swiper-slide">
                <a href="hotel-single-1.html" class="hotelsCard -type-1 ">
                    <div class="hotelsCard__image">
                        <div class="cardImage ratio ratio-1:1">
                            <div class="cardImage__content"> <img class="rounded-4 col-12"
                                    src="/preview/img/featured/6.jpg" alt="image"> </div>
                            <div class="cardImage__leftBadge">
                                <div
                                    class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark-1">
                                    Top Rated </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                        <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500"> <span>DoubleTree by
                                Hilton Hotel New York Times Square West</span> </h4>
                        <p class="text-light-1 lh-14 text-14 mt-5">Vaticano Prati, Rome</p>
                        <div class="d-flex items-center mt-20"> <a href="#"
                                class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                Learn More <div class="icon-arrow-top-right ml-15"></div>
                            </a>



                        </div>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</div>