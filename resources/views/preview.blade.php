<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('preview/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('preview/css/main.css') }}">
    <title>XploreTEFL</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        const isMobileDevice = window.innerWidth <= 768;
        var country = "Unknown";
        var ip = "Unknown";
        // $.ajax({
        //     type: "GET",
        //     url: "https://ipapi.co/json/",
        //     data: {
        //         get: "ip"
        //     },
        //     dataType: "json",
        //     context: document.body,
        //     async: true,
        //     success: function(res, stato) {
        //         ip = res.ip;
        //         country = res.country_name;
        //         myCallback();
        //     },
        //     error: function(res, stato) {
        //         alert("IP thing didn't work.");
        //     }
        // });

     
        // function myCallback(){

            $.ajax({
            type: 'GET',
            url: "{{ route('showlistings') }}",
            data: {
                'mobile': isMobileDevice,
                'ip': ip,
                'country': country
            },
            dataType: 'json',
            error: function(Err) {
                alert('error occured');
            },
            success: function(result) {
                console.log(result);
                if (result.status == true) {
                    $('#recommanded-section').append(result.recommanded);
                    $('#popular-section').append(result.basic);
                    $('#teachenglish').append(result.featured);
                    $('#organization').append(result.org);
                    $('#videoOfMonth').append(result.video);

                    const cookieName = 'impressionCount';
                    const expiration = new Date(Date.now() + 1 * 60 * 1000); // 1 min from now
                    let impressionCount = parseInt(getCookie(cookieName)) || 0;

                    if (!parseInt(getCookie(cookieName))) {
                        impressionCount++;
                        setCookie(cookieName, impressionCount, expiration);


                        // $.ajax({
                        //     type: 'GET',
                        //     url: "{{ route('recordimpression') }}",
                        //     data: {
                        //         'listing': result.data,
                        //         'mobile': isMobileDevice,
                        //         'ip': ip,
                        //         'country': country
                        //     },
                        //     dataType: 'json',
                        //     error: function(Err) {

                        //     },
                        //     success: function(result) {
                        //         console.log(result);
                        //     }
                        // });


                    }
                }
            }
        });
    // }
        // $.ajax({
        //     type: 'GET',
        //     url: "{{ route('showBasicListings') }}",
        //     data: {
        //         'mobile': isMobileDevice,
        //         'ip': ip,
        //         'country': country
        //     },
        //     dataType: 'json',
        //     error: function(Err) {
        //         alert('error occured');
        //     },
        //     success: function(result) {
        //         console.log(result);
        //         if (result.status == true) {
        //             $('#popular-section').append(result.html);

        //             const cookieName = 'impressionbasicCount';
        //             const expiration = new Date(Date.now() + 1 * 60 * 1000); // 1 min from now
        //             let impressionCount = parseInt(getCookie(cookieName)) || 0;

        //             if (!parseInt(getCookie(cookieName))) {
        //                 impressionCount++;
        //                 setCookie(cookieName, impressionCount, expiration);


        //                 $.ajax({
        //                     type: 'GET',
        //                     url: "{{ route('recordbasicimpression') }}",
        //                     data: {
        //                         'listing': result.data,
        //                         'mobile': isMobileDevice,
        //                         'ip': ip,
        //                         'country': country
        //                     },
        //                     dataType: 'json',
        //                     error: function(Err) {

        //                     },
        //                     success: function(result) {
        //                         console.log(result);
        //                     }
        //                 });

        //             }
        //         }
        //     }
        // });
  
     
        

        function getCookie(name) {
            const match = document.cookie.match(new RegExp(`(^| )${name}=([^;]+)`));
            if (match) return match[2];
        }

        // Function to set a cookie value with a name and expiration date
        function setCookie(name, value, expiration) {
            document.cookie = `${name}=${value};expires=${expiration.toUTCString()};path=/`;
        }
    </script>
</head>

<body>
    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon">
                <svg width="38" height="37" viewBox="0 0 38 37" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1_41)">
                        <path
                            d="M32.9675 13.9422C32.9675 6.25436 26.7129 0 19.0251 0C11.3372 0 5.08289 6.25436 5.08289 13.9422C5.08289 17.1322 7.32025 21.6568 11.7327 27.3906C13.0538 29.1071 14.3656 30.6662 15.4621 31.9166V35.8212C15.4621 36.4279 15.9539 36.92 16.561 36.92H21.4895C22.0965 36.92 22.5883 36.4279 22.5883 35.8212V31.9166C23.6849 30.6662 24.9966 29.1071 26.3177 27.3906C30.7302 21.6568 32.9675 17.1322 32.9675 13.9422V13.9422ZM30.7699 13.9422C30.7699 16.9956 27.9286 21.6204 24.8175 25.7245H23.4375C25.1039 20.7174 25.9484 16.7575 25.9484 13.9422C25.9484 10.3587 25.3079 6.97207 24.1445 4.40684C23.9229 3.91841 23.6857 3.46886 23.4347 3.05761C27.732 4.80457 30.7699 9.02494 30.7699 13.9422ZM20.3906 34.7224H17.6598V32.5991H20.3906V34.7224ZM21.0007 30.4014H17.0587C16.4167 29.6679 15.7024 28.8305 14.9602 27.9224H16.1398C16.1429 27.9224 16.146 27.9227 16.1489 27.9227C16.152 27.9227 23.0902 27.9224 23.0902 27.9224C22.3725 28.8049 21.6658 29.6398 21.0007 30.4014ZM19.0251 2.19765C20.1084 2.19765 21.2447 3.33365 22.1429 5.3144C23.1798 7.60078 23.7508 10.6649 23.7508 13.9422C23.7508 16.6099 22.8415 20.6748 21.1185 25.7245H16.9322C15.2086 20.6743 14.2994 16.6108 14.2994 13.9422C14.2994 10.6649 14.8706 7.60078 15.9075 5.3144C16.8057 3.33365 17.942 2.19765 19.0251 2.19765V2.19765ZM7.28053 13.9422C7.28053 9.02494 10.3184 4.80457 14.6157 3.05761C14.3647 3.46886 14.1273 3.91841 13.9059 4.40684C12.7425 6.97207 12.102 10.3587 12.102 13.9422C12.102 16.7584 12.9462 20.7176 14.6126 25.7245H13.2259C9.33565 20.6126 7.28053 16.5429 7.28053 13.9422Z"
                            fill="#3554D1" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_41">
                            <rect width="36.92" height="36.92" fill="white" transform="translate(0.540039)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="preloader__title">XploreTEFL</div>
    </div>
    <main>

        <!-- menu -->
        <div class="header-margin"></div>
        <header data-add-bg="" class="header bg-dark-3 js-header" data-x="header" data-x-toggle="is-menu-opened">
            <div data-anim="fade" class="header__container px-30 sm:px-20">
                <div class="row justify-between items-center">
                    <div class="col-auto">
                        <div class="d-flex items-center"> <a href="index.html" class="header-logo mr-20"
                                data-x="header-logo" data-x-toggle="is-logo-dark"> <img
                                    src="/preview/img/general/logo-light.svg" alt="logo icon"> <img
                                    src="/preview/img/general/logo-dark.svg" alt="logo icon"> </a>
                            <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                                <div class="mobile-overlay"></div>
                                <div class="header-menu__content">
                                    <div class="mobile-bg js-mobile-bg"></div>
                                    <div class="menu js-navList">
                                        <ul class="menu__nav text-white -is-active">
                                            <li class="menu-item-has-children"> <a data-barba href=""> <span
                                                        class="mr-10">Home</span> <i
                                                        class="icon icon-chevron-sm-down"></i> </a>
                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back"> <a href="#"><i
                                                                class="icon icon-chevron-sm-down"></i> Home</a> </li>
                                                    <li><a href="index.html">Home 1</a>
                                                    </li>
                                                    <li><a href="home-2.html">Home 2</a>
                                                    </li>
                                                    <li><a href="home-3.html">Home 3</a>
                                                    </li>
                                                    <li><a href="home-4.html">Home 4</a>
                                                    </li>
                                                    <li><a href="home-5.html">Home 5</a>
                                                    </li>
                                                    <li><a href="home-6.html">Home 6</a>
                                                    </li>
                                                    <li><a href="home-7.html">Home 7</a>
                                                    </li>
                                                    <li><a href="home-8.html">Home 8</a>
                                                    </li>
                                                    <li><a href="home-9.html">Home 9</a>
                                                    </li>
                                                    <li><a href="home-10.html">Home 10</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children -has-mega-menu"> <a data-barba
                                                    href="#">
                                                    <span class="mr-10">Categories</span> <i
                                                        class="icon icon-chevron-sm-down"></i> </a>
                                                <div class="mega">
                                                    <div class="tabs -underline-2 js-tabs">
                                                        <div
                                                            class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 pb-30 js-tabs-controls">
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button is-tab-el-active"
                                                                    data-tab-target=".-tab-item-1">Hotel</button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button "
                                                                    data-tab-target=".-tab-item-2">Tour</button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button "
                                                                    data-tab-target=".-tab-item-3">Activity</button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button "
                                                                    data-tab-target=".-tab-item-4">Holiday
                                                                    Rentals</button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button "
                                                                    data-tab-target=".-tab-item-5">Car</button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button "
                                                                    data-tab-target=".-tab-item-6">Cruise</button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button
                                                                    class="tabs__button text-light-1 fw-500 js-tabs-button "
                                                                    data-tab-target=".-tab-item-7">Flights</button>
                                                            </div>
                                                        </div>
                                                        <div class="tabs__content js-tabs-content">
                                                            <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Hotel List
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="hotel-list-1.html">Hotel
                                                                                        List v1</a>
                                                                                </div>
                                                                                <div><a href="hotel-list-2.html">Hotel
                                                                                        List v2</a>
                                                                                </div>
                                                                                <div><a href="hotel-half-map.html">Hotel
                                                                                        List v3</a>
                                                                                </div>
                                                                                <div><a href="hotel-grid-1.html">Hotel
                                                                                        List v4</a>
                                                                                </div>
                                                                                <div><a href="hotel-grid-2.html">Hotel
                                                                                        List v5</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Hotel Single
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="hotel-single-1.html">Hotel
                                                                                        Single v1</a>
                                                                                </div>
                                                                                <div><a href="hotel-single-2.html">Hotel
                                                                                        Single v2</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Hotel Booking
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="booking-pages.html">Booking
                                                                                        Page</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="#"
                                                                            data-src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4 js-lazy">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tabs__pane -tab-item-2">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Tour List</div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="tour-list-1.html">Tour
                                                                                        List v1</a>
                                                                                </div>
                                                                                <div><a href="tour-grid-1.html">Tour
                                                                                        List v2</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Tour Pages
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="tour-map.html">Tour
                                                                                        Map</a>
                                                                                </div>
                                                                                <div><a href="tour-single.html">Tour
                                                                                        Single</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tabs__pane -tab-item-3">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Activity List
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="activity-list-1.html">Activity
                                                                                        List v1</a>
                                                                                </div>
                                                                                <div><a href="activity-grid-1.html">Activity
                                                                                        List v2</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Activity Pages
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="activity-map.html">Activity
                                                                                        Map</a>
                                                                                </div>
                                                                                <div><a href="activity-single.html">Activity
                                                                                        Single</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tabs__pane -tab-item-4">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Rental List
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="rental-list-1.html">Rental
                                                                                        List v1</a>
                                                                                </div>
                                                                                <div><a href="rental-grid-1.html">Rental
                                                                                        List v2</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Rental Pages
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="rental-map.html">Rental
                                                                                        Map</a>
                                                                                </div>
                                                                                <div><a href="rental-single.html">Rental
                                                                                        Single</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tabs__pane -tab-item-5">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Car List</div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="car-list-1.html">Car List
                                                                                        v1</a>
                                                                                </div>
                                                                                <div><a href="car-grid-1.html">Car List
                                                                                        v2</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Car Pages</div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="car-map.html">Car Map</a>
                                                                                </div>
                                                                                <div><a href="car-single.html">Car
                                                                                        Single</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tabs__pane -tab-item-6">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Cruise List
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="cruise-list-1.html">Cruise
                                                                                        List v1</a>
                                                                                </div>
                                                                                <div><a href="cruise-grid-1.html">Cruise
                                                                                        List v2</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Cruise Pages
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="cruise-map.html">Cruise
                                                                                        Map</a>
                                                                                </div>
                                                                                <div><a href="cruise-single.html">Cruise
                                                                                        Single</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tabs__pane -tab-item-7">
                                                                <div class="mega__content">
                                                                    <div class="mega__grid">
                                                                        <div class="mega__item">
                                                                            <div class="text-15 fw-500">Flight List
                                                                            </div>
                                                                            <div class="y-gap-5 text-15 pt-5">
                                                                                <div><a href="flights-list.html">Flight
                                                                                        list v1</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mega__image d-flex relative"> <img
                                                                            src="/preview/img/backgrounds/7.png"
                                                                            alt="image" class="rounded-4">
                                                                        <div
                                                                            class="absolute w-full h-full px-30 py-24">
                                                                            <div
                                                                                class="text-22 fw-500 lh-15 text-white">
                                                                                Things to do on <br> your trip</div>
                                                                            <button
                                                                                class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="subnav mega-mobile">
                                                    <li class="subnav__backBtn js-nav-list-back"> <a href="#"><i
                                                                class="icon icon-chevron-sm-down"></i> Category</a>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Hotel</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i>
                                                                    Hotel</a>
                                                            </li>
                                                            <li><a href="hotel-list-1.html">Hotel List v1</a>
                                                            </li>
                                                            <li><a href="hotel-list-2.html">Hotel List v2</a>
                                                            </li>
                                                            <li><a href="hotel-single-1.html">Hotel Single v1</a>
                                                            </li>
                                                            <li><a href="hotel-single-2.html">Hotel Single v2</a>
                                                            </li>
                                                            <li><a href="booking-pages.html">Booking Page</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Tour</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i> Tour</a>
                                                            </li>
                                                            <li><a href="tour-list-1.html">Tour List v1</a>
                                                            </li>
                                                            <li><a href="tour-grid-1.html">Tour List v2</a>
                                                            </li>
                                                            <li><a href="tour-map.html">Tour Map</a>
                                                            </li>
                                                            <li><a href="tour-single.html">Tour Single</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Activity</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i>
                                                                    Activity</a> </li>
                                                            <li><a href="activity-list-1.html">Activity List v1</a>
                                                            </li>
                                                            <li><a href="activity-grid-1.html">Activity List v2</a>
                                                            </li>
                                                            <li><a href="activity-map.html">Activity Map</a>
                                                            </li>
                                                            <li><a href="activity-single.html">Activity Single</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Rental</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i>
                                                                    Rental</a> </li>
                                                            <li><a href="rental-list-1.html">Rental List v1</a>
                                                            </li>
                                                            <li><a href="rental-grid-1.html">Rental List v2</a>
                                                            </li>
                                                            <li><a href="rental-map.html">Rental Map</a>
                                                            </li>
                                                            <li><a href="rental-single.html">Rental Single</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Car</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i> Car</a>
                                                            </li>
                                                            <li><a href="car-list-1.html">Car List v1</a>
                                                            </li>
                                                            <li><a href="car-grid-1.html">Car List v2</a>
                                                            </li>
                                                            <li><a href="car-map.html">Car Map</a>
                                                            </li>
                                                            <li><a href="car-single.html">Car Single</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Cruise</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i>
                                                                    Cruise</a> </li>
                                                            <li><a href="cruise-list-1.html">Cruise List v1</a>
                                                            </li>
                                                            <li><a href="cruise-grid-1.html">Cruise List v2</a>
                                                            </li>
                                                            <li><a href="cruise-map.html">Cruise Map</a>
                                                            </li>
                                                            <li><a href="cruise-single.html">Cruise Single</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"> <a data-barba href="#">
                                                            <span class="mr-10">Flights</span> <i
                                                                class="icon icon-chevron-sm-down"></i> </a>
                                                        <ul class="subnav">
                                                            <li class="subnav__backBtn js-nav-list-back"> <a
                                                                    href="#"><i
                                                                        class="icon icon-chevron-sm-down"></i>
                                                                    Flights</a> </li>
                                                            <li><a href="flights-list.html">Flights List v1</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li> <a href="destinations.html"> Destinations </a> </li>
                                            <li class="menu-item-has-children"> <a data-barba href=""> <span
                                                        class="mr-10">Blog</span> <i
                                                        class="icon icon-chevron-sm-down"></i> </a>
                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back"> <a href="#"><i
                                                                class="icon icon-chevron-sm-down"></i> Blog</a> </li>
                                                    <li><a href="blog-list-1.html">Blog list v1</a>
                                                    </li>
                                                    <li><a href="blog-list-2.html">Blog list v2</a>
                                                    </li>
                                                    <li><a href="blog-single.html">Blog single</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"> <a data-barba href=""> <span
                                                        class="mr-10">Pages</span> <i
                                                        class="icon icon-chevron-sm-down"></i> </a>
                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back"> <a href="#"><i
                                                                class="icon icon-chevron-sm-down"></i> Pages</a> </li>
                                                    <li><a href="404.html">404</a>
                                                    </li>
                                                    <li><a href="about.html">About</a>
                                                    </li>
                                                    <li><a href="become-expert.html">Become expert</a>
                                                    </li>
                                                    <li><a href="help-center.html">Help center</a>
                                                    </li>
                                                    <li><a href="login.html">Login</a>
                                                    </li>
                                                    <li><a href="signup.html">Register</a>
                                                    </li>
                                                    <li><a href="terms.html">Terms</a>
                                                    </li>
                                                    <li><a href="invoice.html">Invoice</a>
                                                    </li>
                                                    <li><a href="ui-elements.html">UI elements</a>







                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"> <a data-barba href=""> <span
                                                        class="mr-10">Dashboard</span> <i
                                                        class="icon icon-chevron-sm-down"></i> </a>
                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back"> <a href="#"><i
                                                                class="icon icon-chevron-sm-down"></i> Dashboard</a>
                                                    </li>
                                                    <li><a href="db-dashboard.html">Dashboard</a>
                                                    </li>
                                                    <li><a href="db-booking.html">Booking</a>
                                                    </li>
                                                    <li><a href="db-settings.html">Settings</a>
                                                    </li>
                                                    <li><a href="db-wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a href="db-vendor-dashboard.html">Vendor dashboard</a>
                                                    </li>
                                                    <li><a href="db-vendor-add-hotel.html">Vendor add hotel</a>
                                                    </li>
                                                    <li><a href="db-vendor-booking.html">Vendor booking</a>
                                                    </li>
                                                    <li><a href="db-vendor-hotels.html">Vendor hotels</a>
                                                    </li>
                                                    <li><a href="db-vendor-recovery.html">Vendor recovery</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li> <a href="contact.html">Contact</a> </li>
                                        </ul>
                                    </div>
                                    <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex items-center">
                            <div class="row x-gap-20 items-center xxl:d-none">
                                <div class="col-auto">
                                    <button class="d-flex items-center text-14 text-white" data-x-click="currency">
                                        <span class="js-currencyMenu-mainTitle">USD</span> <i
                                            class="icon-chevron-sm-down text-7 ml-10"></i> </button>
                                </div>
                                <div class="col-auto">
                                    <div class="w-1 h-20 bg-white-20"></div>
                                </div>
                                <div class="col-auto">
                                    <button class="d-flex items-center text-14 text-white" data-x-click="lang"> <img
                                            src="/preview/img/general/lang.png" alt="image"
                                            class="rounded-full mr-10">
                                        <span class="js-language-mainTitle">United Kingdom</span> <i
                                            class="icon-chevron-sm-down text-7 ml-15"></i> </button>
                                </div>
                            </div>
                            <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none"> <a href="login.html"
                                    class="button px-30 fw-400 text-14 -blue-1 bg-white h-50 text-dark-1">Become An
                                    Expert</a> <a href="signup.html"
                                    class="button px-30 fw-400 text-14 border-white -blue-1 h-50 text-white ml-20">Sign
                                    In / Register</a> </div>
                            <div class="d-none xl:d-flex x-gap-20 items-center pl-30 text-white"
                                data-x="header-mobile-icons" data-x-toggle="text-white">
                                <div><a href="login.html"
                                        class="d-flex items-center icon-user text-inherit text-22"></a>
                                </div>
                                <div>
                                    <button class="d-flex items-center icon-menu text-inherit text-20"
                                        data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



        <!-- breadcrumbs -->
        <section class="py-10 d-flex items-center bg-light-2">
            <div class="container">
                <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">
                        <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                            <div class="col-auto">
                                <div class="">Home</div>
                            </div>
                            <div class="col-auto">
                                <div class="">/</div>
                            </div>
                            <div class="col-auto">
                                <div class="">Teaching English Guides</div>
                            </div>
                            <div class="col-auto">
                                <div class="">/</div>
                            </div>
                            <div class="col-auto">
                                <div class="text-dark-1">Argentina</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- page title -->
        <section data-anim="slide-up" class="layout-pt-md">
            <div class="container">
                <div class="row y-gap-40 justify-center text-center">
                    <div class="col-auto">
                        <div class="text-15 fw-500 text-blue-1 mb-8">Teach Abroad</div>
                        <h1 class="text-50 sm:text-30 fw-600">A Guide To Teaching English In Argentina</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="layout-pt-md layout-pb-md" id="teachenglish">

        </section>

        <!-- intro -->
        <section class="layout-pb-md intro">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <h3>Overview</h3>
                        <p>
                            Buenos Dias Argentina! Land of polo, glaciers, wine and the biggest waterfalls in the world.
                            Teach English in Argentina and find out why lots of English teachers get enchanted with the
                            birthplace of the captivating Tango dance.
                        </p>
                        <p>You'll need to have a TEFL certificate if you want to be an English teacher in Argentina. A
                            degree and teaching experience is not compulsory but may help you find better teaching
                            positions with higher salaries. The average ESL teacher in Argentina earns between US$650
                            and US$850 per month.</p>
                        <p>Teach English in Argentina for a rewarding experience. The country's mouth-watering cuisines,
                            incredible wine from home-grown grapes, hugely rich artistic culture spread over a beautiful
                            landscape, and a great climate are only a few of the reasons most ESL teachers stay in
                            Argentina.</p>
                    </div>
                </div>


            </div>
        </section>

        <!-- featured course listing -->
        <section class="layout-pb-lg layout-pt-md bg-light-3" id="recommanded-section">
            
        </section>


        <!-- content 1 -->
        <section class="layout-pb-lg layout-pt-lg content">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-lg-10 offset-lg-1">

                        <h3>English Teaching Prospects and Demand in Argentina</h3>
                        <p>
                            English teachers are in high demand in Argentina. In fact, the demand for English teachers
                            in Argentina is usually greater than the teachers in supply. Although teaching opportunities
                            are available throughout the country, most ESL teachers choose Bueno Aires since it has the
                            highest concentration of English teaching jobs in Argentina.</p>
                        <p>There are more teaching jobs with more business experts attracted to the country for its
                            abundant natural resources. You can find opportunities to teach English to business people
                            who need to learn the English language for their international trade transactions.</p>
                        <p>There is also the demand for teachers in the hospitality and tourism community to help
                            officials learn English to communicate better with tourists. There is a high demand for
                            English teachers in Argentina with a preference for native English speakers and TEFL
                            certificate holders.</p>

                    </div>
                    <div class="col-lg-10 offset-lg-1">

                        <div class="accordion -simple row y-gap-20 pt-30 js-accordion">

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">
                                            <h3>Requirements to Teach in Argentina</h3>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">
                                            <h3>Requirements to Teach English in Italy</h3>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">
                                            <h3>Type of Teaching Jobs in Italy</h3>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- featured organization -->
        <section data-anim-wrap class="section-bg layout-pb-lg layout-pt-lg" id="organization">
            
        </section>

        <!-- content 2 -->
        <section class="layout-pb-lg layout-pt-lg content">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-lg-10 offset-lg-1">

                        <h3>Salary and Benefits for English Teachers in Italy</h3>
                        <p>
                            Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac
                            nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et
                            adipiscing erat. Curabitur this is a text link libero tempus congue.
                            <br><br> Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor
                            sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna
                            semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus
                            posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta
                            in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.
                        </p>
                    </div>
                    <div class="col-lg-10 offset-lg-1">

                        <div class="accordion -simple row y-gap-20 pt-30 js-accordion">

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">
                                            <h3>Visa Requirements for Teachers in Italy</h3>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">
                                            <h3>How to Find a Teaching Job in Italy?</h3>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">
                                            <h3>Cost of Living in Italy</h3>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- basic listings small thumbnails -->
        <section class="layout-pb-lg layout-pt-md bg-light-3" id="popular-section">

        </section>

        <!-- featured video -->
        <section data-anim-wrap class="section-bg layout-pb-lg layout-pt-lg" id="videoOfMonth">
           
        </section>

        <!-- content 3: activities and faqs -->
        <section class="layout-pb-lg layout-pt-lg">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-lg-6">
                        <div class="text-22 fw-500">Frequently Asked Questions</div>

                        <div class="accordion -simple row y-gap-20 pt-30 js-accordion">

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">Is it possible to teach English in Italy
                                            without
                                            a degree?</div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">Do you offer special pricing for big teams?
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">What is the past experience of your teachers?
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">What is the course refund policy?</div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="accordion__item px-20 py-20 border-light rounded-4">
                                    <div class="accordion__button d-flex items-center">
                                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                                            <i class="icon-plus"></i>
                                            <i class="icon-minus"></i>
                                        </div>

                                        <div class="button text-dark-1">Do you offer discounts for non-profits?</div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="pt-20 pl-60">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="text-22 fw-500">More Information</div>

                        <div class="tabs -pills-3 pt-30 js-tabs">
                            <div class="tabs__controls row x-gap-10 y-gap-10 js-tabs-controls">

                                <div class="col-auto">
                                    <button
                                        class="tabs__button text-14 fw-500 px-20 py-10 rounded-4 bg-light-2 js-tabs-button is-tab-el-active"
                                        data-tab-target=".-tab-item-1">Art and culture</button>
                                </div>

                                <div class="col-auto">
                                    <button
                                        class="tabs__button text-14 fw-500 px-20 py-10 rounded-4 bg-light-2 js-tabs-button "
                                        data-tab-target=".-tab-item-2">Beaches</button>
                                </div>

                                <div class="col-auto">
                                    <button
                                        class="tabs__button text-14 fw-500 px-20 py-10 rounded-4 bg-light-2 js-tabs-button "
                                        data-tab-target=".-tab-item-3">Adventure travel</button>
                                </div>

                            </div>

                            <div class="tabs__content pt-15 js-tabs-content">

                                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                    <p class="text-15 text-dark-1">
                                        Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh
                                        sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis
                                        sed pretium. Morbi sed arcu proin quis tortor non risus.
                                        <br><br> Elementum lectus a porta commodo suspendisse arcu, aliquam lectus
                                        faucibus.
                                    </p>
                                </div>

                                <div class="tabs__pane -tab-item-2 ">
                                    <p class="text-15 text-dark-1">
                                        Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh
                                        sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis
                                        sed pretium. Morbi sed arcu proin quis tortor non risus.
                                        <br><br> Elementum lectus a porta commodo suspendisse arcu, aliquam lectus
                                        faucibus.
                                    </p>
                                </div>

                                <div class="tabs__pane -tab-item-3 ">
                                    <p class="text-15 text-dark-1">
                                        Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh
                                        sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis
                                        sed pretium. Morbi sed arcu proin quis tortor non risus.
                                        <br><br> Elementum lectus a porta commodo suspendisse arcu, aliquam lectus
                                        faucibus.
                                    </p>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <!-- tefl locations in that country thumbnails -->
        <section class="layout-pb-lg layout-pt-lg bg-yellow-4">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-up" class="row y-gap-20 justify-between items-end">
                    <div class="col-auto">
                        <div class="sectionTitle -md">
                            <h2 class="sectionTitle__title">TEFL Course Locations in Italy</h2>
                            <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer
                            </p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex x-gap-15 items-center justify-center pt-40 sm:pt-20">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover js-locations-prev"> <i
                                        class="icon icon-arrow-left"></i> </button>
                            </div>
                            <div class="col-auto">
                                <div class="pagination -dots text-border js-locations-pag"></div>
                            </div>
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover js-locations-next"> <i
                                        class="icon icon-arrow-right"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-40 overflow-hidden js-section-slider" data-gap="30"
                    data-slider-cols="xl-6 lg-5 md-4 sm-3 base-2" data-nav-prev="js-locations-prev"
                    data-pagination="js-locations-pag" data-nav-next="js-locations-next">
                    <div class="swiper-wrapper">
                        <div data-anim-child="slide-left delay-4" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/uk.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">United Kingdom</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-5" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/italy.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Italy</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-6" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/france.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">France</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-7" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/turkey.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Turkey</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-8" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/spain.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Spain</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-9" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/germany.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Germany</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-10" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/china.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">China</h4>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-11" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-1:1"> <img
                                        class="img-ratio rounded-4 js-lazy"
                                        data-src="/preview/img/guides/hongkong.jpg" src="#" alt="image">
                                </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Hong Kong</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- country guides -->
        <section class="layout-pb-lg layout-pt-lg">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-up" class="row y-gap-20 justify-between items-end">
                    <div class="col-auto">
                        <div class="sectionTitle -md">
                            <h2 class="sectionTitle__title">English Teaching Guides</h2>
                            <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer
                            </p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex x-gap-15 items-center justify-center pt-40 sm:pt-20">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover js-guides-prev"> <i
                                        class="icon icon-arrow-left"></i> </button>
                            </div>
                            <div class="col-auto">
                                <div class="pagination -dots text-border js-guides-pag"></div>
                            </div>
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover js-guides-next"> <i
                                        class="icon icon-arrow-right"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-40 overflow-hidden js-section-slider" data-gap="30"
                    data-slider-cols="xl-5 lg-3 md-2 sm-2 base-1" data-nav-prev="js-guides-prev"
                    data-pagination="js-guides-pag" data-nav-next="js-guides-next">
                    <div class="swiper-wrapper">
                        <div data-anim-child="slide-left delay-4" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/uk.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">United Kingdom</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-5" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/italy.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Italy</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-6" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/france.jpg"
                                        src="#" alt="image">
                                </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">France</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-7" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/turkey.jpg"
                                        src="#" alt="image">
                                </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Turkey</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-8" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/spain.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Spain</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-9" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/germany.jpg"
                                        src="#" alt="image">
                                </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Germany</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-10" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy" data-src="/preview/img/guides/china.jpg"
                                        src="#" alt="image"> </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">China</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                        <div data-anim-child="slide-left delay-11" class="swiper-slide">
                            <a href="#" class="citiesCard -type-2 ">
                                <div class="citiesCard__image rounded-4 ratio ratio-3:4"> <img
                                        class="img-ratio rounded-4 js-lazy"
                                        data-src="/preview/img/guides/hongkong.jpg" src="#" alt="image">
                                </div>
                                <div class="citiesCard__content mt-10">
                                    <h4 class="text-18 lh-13 fw-500 text-dark-1">Hong Kong</h4>
                                    <div class="text-14 text-light-1">147,681 travellers</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- blog -->
        <section class="layout-pb-lg layout-pt-lg bg-light-2">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
                    <div class="col-auto">
                        <div class="sectionTitle -md">
                            <h2 class="sectionTitle__title">Keep On Reading</h2>
                            <p class=" sectionTitle__text mt-5 sm:mt-0">Articles from our blog</p>
                        </div>
                    </div>

                </div>

                <div class="row y-gap-30 pt-40">

                    <div data-anim-child="slide-up delay-2" class="col-lg-4 col-sm-6">

                        <a href="" class="blogCard -type-1 d-block ">
                            <div class="blogCard__image">
                                <div class="ratio ratio-4:3 rounded-4 rounded-8">
                                    <img class="img-ratio js-lazy" src="#"
                                        data-src="/preview/img/others/blog1.jpg" alt="image">
                                </div>
                            </div>

                            <div class="mt-20">
                                <h4 class="text-dark-1 text-18 fw-500">10 European ski destinations you should visit
                                    this winter</h4>
                                <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
                            </div>
                        </a>

                    </div>

                    <div data-anim-child="slide-up delay-3" class="col-lg-4 col-sm-6">

                        <a href="" class="blogCard -type-1 d-block ">
                            <div class="blogCard__image">
                                <div class="ratio ratio-4:3 rounded-4 rounded-8">
                                    <img class="img-ratio js-lazy" src="#"
                                        data-src="/preview/img/others/blog2.jpg" alt="image">
                                </div>
                            </div>

                            <div class="mt-20">
                                <h4 class="text-dark-1 text-18 fw-500">Booking travel during Corona: good advice in an
                                    uncertain time</h4>
                                <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
                            </div>
                        </a>

                    </div>


                    <div class="col-lg-4">
                        <div class="row y-gap-30">

                            <div data-anim-child="slide-up delay-4" class="col-lg-12 col-md-6">
                                <a href="blog-single.html" class="blogCard -type-1 d-flex items-center">
                                    <div class="blogCard__image size-130 rounded-8">
                                        <img src="/preview/img/others/blog3.jpg" alt="image"
                                            class="object-cover size-130">
                                    </div>

                                    <div class="ml-24">
                                        <h4 class="text-18 lh-14 fw-500 text-dark-1">The world’s most romantic
                                            destinations</h4>
                                        <p class="text-15">December 16, 2022</p>
                                    </div>
                                </a>
                            </div>

                            <div data-anim-child="slide-up delay-5" class="col-lg-12 col-md-6">
                                <a href="blog-single.html" class="blogCard -type-1 d-flex items-center">
                                    <div class="blogCard__image size-130 rounded-8">
                                        <img src="/preview/img/others/blog4.jpg" alt="image"
                                            class="object-cover size-130">
                                    </div>

                                    <div class="ml-24">
                                        <h4 class="text-18 lh-14 fw-500 text-dark-1">The world’s most romantic
                                            destinations</h4>
                                        <p class="text-15">December 16, 2022</p>
                                    </div>
                                </a>
                            </div>

                            <div data-anim-child="slide-up delay-6" class="col-lg-12 col-md-6">
                                <a href="blog-single.html" class="blogCard -type-1 d-flex items-center">
                                    <div class="blogCard__image size-130 rounded-8">
                                        <img src="/preview/img/others/blog1.jpg" alt="image"
                                            class="object-cover size-130">
                                    </div>

                                    <div class="ml-24">
                                        <h4 class="text-18 lh-14 fw-500 text-dark-1">The world’s most romantic
                                            destinations</h4>
                                        <p class="text-15">December 16, 2022</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row justify-center pt-40">
                    <div class="col-auto">

                        <a href="#" class="button px-40 h-50 -outline-blue-1 text-blue-1">
                            View All <div class="icon-arrow-top-right ml-15"></div>
                        </a>







                    </div>
                </div>
            </div>
        </section>


        <!-- search -->
        <section class="layout-pb-lg layout-pt-lg bg-dark-4">
            <div class="container">
                <div class="row y-gap-30 justify-between items-center">
                    <div class="col-auto">
                        <div class="row y-gap-20  flex-wrap items-center">
                            <div class="col-auto">
                                <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
                            </div>
                            <div class="col-auto">
                                <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                                <div class="text-white">Sign up and we'll send the best deals to you</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
                            <div>
                                <input class="bg-white h-60" type="text" placeholder="Your Email">
                            </div>
                            <div>
                                <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- footer -->
        <footer class="footer -type-1">
            <div class="container">
                <div class="pt-60 pb-60">
                    <div class="row y-gap-40 justify-between xl:justify-start">
                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Contact Us</h5>
                            <div class="mt-30">
                                <div class="text-14 mt-30">Toll Free Customer Care</div>
                                <a href="#" class="text-18 fw-500 text-blue-1 mt-5">+(1) 123 456 7890</a>
                            </div>
                            <div class="mt-35">
                                <div class="text-14 mt-30">Need live support?</div>
                                <a href="#" class="text-18 fw-500 text-blue-1 mt-5">hi@gotrip.com</a>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Company</h5>
                            <div class="d-flex y-gap-10 flex-column"> <a href="#">About Us</a> <a
                                    href="#">Careers</a> <a href="#">Blog</a> <a
                                    href="#">Press</a> <a href="#">Gift Cards</a> <a
                                    href="#">Magazine</a> </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Support</h5>
                            <div class="d-flex y-gap-10 flex-column"> <a href="#">Contact</a> <a
                                    href="#">Legal Notice</a> <a href="#">Privacy Policy</a> <a
                                    href="#">Terms and Conditions</a> <a href="#">Sitemap</a> </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Other Services</h5>
                            <div class="d-flex y-gap-10 flex-column"> <a href="#">Car hire</a> <a
                                    href="#">Activity Finder</a> <a href="#">Tour List</a> <a
                                    href="#">Flight finder</a> <a href="#">Cruise Ticket</a> <a
                                    href="#">Holiday Rental</a> <a href="#">Travel Agents</a> </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Mobile</h5>
                            <div class="d-flex items-center px-20 py-10 rounded-4 border-light">
                                <div class="icon-apple text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14 text-light-1">Download on the</div>
                                    <div class="text-15 lh-1 fw-500">Apple Store</div>
                                </div>
                            </div>
                            <div class="d-flex items-center px-20 py-10 rounded-4 border-light mt-20">
                                <div class="icon-play-market text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14 text-light-1">Get in on</div>
                                    <div class="text-15 lh-1 fw-500">Google Play</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-20 border-top-light">
                    <div class="row justify-between items-center y-gap-10">
                        <div class="col-auto">
                            <div class="row x-gap-30 y-gap-10">
                                <div class="col-auto">
                                    <div class="d-flex items-center"> © 2022 GoTrip LLC All rights reserved. </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex x-gap-15"> <a href="#">Privacy</a> <a
                                            href="#">Terms</a> <a href="#">Site Map</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row y-gap-10 items-center">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <button class="d-flex items-center text-14 fw-500 text-dark-1 mr-10"> <i
                                                class="icon-globe text-16 mr-10"></i> <span
                                                class="underline">English (US)</span> </button>
                                        <button class="d-flex items-center text-14 fw-500 text-dark-1"> <i
                                                class="icon-usd text-16 mr-10"></i> <span
                                                class="underline">USD</span> </button>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex x-gap-20 items-center"> <a href="#"><i
                                                class="icon-facebook text-14"></i></a> <a href="#"><i
                                                class="icon-twitter text-14"></i></a> <a href="#"><i
                                                class="icon-instagram text-14"></i></a> <a href="#"><i
                                                class="icon-linkedin text-14"></i></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- JavaScript -->
    

   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="{{ asset('preview/js/vendors.js') }}"></script>
    <script src="{{ asset('preview/js/main.js') }}"></script>
</body>

</html>
