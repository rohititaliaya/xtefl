@extends('provider.layouts.app')

@section('content')
    <style>
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        a,
        a:active,
        a:focus {
            color: #333;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /*--blog----*/

        .sec-title {
            position: relative;
            margin-bottom: 70px;
        }

        .sec-title .title {
            position: relative;
            display: block;
            font-size: 16px;
            line-height: 1em;
            color: #ff8a01;
            font-weight: 500;
            background: rgb(247, 0, 104);
            background: -moz-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
            background: -webkit-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
            background: linear-gradient(to left, rgba(247, 0, 104) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F70068', endColorstr='#441066', GradientType=1);
            color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 15px;
        }

        .sec-title h2 {
            position: relative;
            display: inline-block;
            font-size: 48px;
            line-height: 1.2em;
            color: #1e1f36;
            font-weight: 700;
        }

        .sec-title .text {
            position: relative;
            font-size: 16px;
            line-height: 28px;
            color: #888888;
            margin-top: 30px;
        }

        .sec-title.light h2,
        .sec-title.light .title {
            color: #ffffff;
            -webkit-text-fill-color: inherit;
        }

        .pricing-section {
            position: relative;
            /* padding: 100px 0 80px; */
            overflow: hidden;
        }

        .pricing-section .outer-box {
            max-width: 1100px;
            margin: 0 auto;
        }


        .pricing-section .row {
            margin: 0 -30px;
        }

        .pricing-block {
            position: relative;
            padding: 0 30px;
            margin-bottom: 40px;
        }

        .pricing-block .inner-box {
            position: relative;
            background-color: #ffffff;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            padding: 0 0 30px;
            max-width: 370px;
            margin: 0 auto;
            border-bottom: 20px solid #40cbb4;
        }

        .pricing-block .icon-box {
            position: relative;
            padding: 50px 30px 0;
            background-color: #40cbb4;
            text-align: center;
        }

        .pricing-block .icon-box:before {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 75px;
            width: 100%;
            border-radius: 50% 50% 0 0;
            background-color: #ffffff;
            content: "";
        }


        .pricing-block .icon-box .icon-outer {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: #ffffff;
            border-radius: 50%;
            margin: 0 auto;
            padding: 10px;
        }

        .pricing-block .icon-box i {
            position: relative;
            display: block;
            height: 130px;
            width: 130px;
            line-height: 120px;
            border: 5px solid #40cbb4;
            border-radius: 50%;
            font-size: 50px;
            color: #40cbb4;
            -webkit-transition: all 600ms ease;
            -ms-transition: all 600ms ease;
            -o-transition: all 600ms ease;
            -moz-transition: all 600ms ease;
            transition: all 600ms ease;
        }

        .pricing-block .inner-box:hover .icon-box i {
            transform: rotate(360deg);
        }

        .pricing-block .price-box {
            position: relative;
            text-align: center;
            padding: 10px 20px;
        }

        .pricing-block .title {
            position: relative;
            display: block;
            font-size: 24px;
            line-height: 1.2em;
            color: #222222;
            font-weight: 600;
        }

        .pricing-block .price {
            display: block;
            font-size: 30px;
            color: #222222;
            font-weight: 700;
            color: #40cbb4;
        }


        .pricing-block .features {
            position: relative;
            max-width: 200px;
            margin: 0 auto 20px;
        }

        .pricing-block .features li {
            position: relative;
            display: block;
            font-size: 14px;
            line-height: 30px;
            color: #848484;
            font-weight: 500;
            padding: 5px 0;
            padding-left: 30px;
            border-bottom: 1px dashed #dddddd;
        }

        .pricing-block .features li:before {
            position: absolute;
            left: 0;
            top: 50%;
            font-size: 16px;
            color: #2bd40f;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
            content: "\f058";
            font-family: "Font Awesome 5 Free";
            margin-top: -8px;
        }

        .pricing-block .features li.false:before {
            color: #e1137b;
            content: "\f057";
        }

        .pricing-block .features li a {
            color: #848484;
        }

        .pricing-block .features li:last-child {
            border-bottom: 0;
        }

        .pricing-block .btn-box {
            position: relative;
            text-align: center;
        }

        .pricing-block .btn-box a {
            position: relative;
            display: inline-block;
            font-size: 14px;
            line-height: 25px;
            color: #ffffff;
            font-weight: 500;
            padding: 8px 30px;
            background-color: #40cbb4;
            border-radius: 10px;
            border-top: 2px solid transparent;
            border-bottom: 2px solid transparent;
            -webkit-transition: all 400ms ease;
            -moz-transition: all 400ms ease;
            -ms-transition: all 400ms ease;
            -o-transition: all 400ms ease;
            transition: all 300ms ease;
        }

        .pricing-block .btn-box a:hover {
            color: #ffffff;
        }

        .pricing-block .inner-box:hover .btn-box a {
            color: #40cbb4;
            background: none;
            border-radius: 0px;
            border-color: #40cbb4;
        }

        .pricing-block:nth-child(2) .icon-box i,
        .pricing-block:nth-child(2) .inner-box {
            border-color: #1d95d2;
        }

        .pricing-block:nth-child(2) .btn-box a,
        .pricing-block:nth-child(2) .icon-box {
            background-color: #1d95d2;
        }

        .pricing-block:nth-child(2) .inner-box:hover .btn-box a {
            color: #1d95d2;
            background: none;
            border-radius: 0px;
            border-color: #1d95d2;
        }

        .pricing-block:nth-child(2) .icon-box i,
        .pricing-block:nth-child(2) .price {
            color: #1d95d2;
        }

        .pricing-block:nth-child(3) .icon-box i,
        .pricing-block:nth-child(3) .inner-box {
            border-color: #ffc20b;
        }

        .pricing-block:nth-child(3) .btn-box a,
        .pricing-block:nth-child(3) .icon-box {
            background-color: #ffc20b;
        }

        .pricing-block:nth-child(3) .icon-box i,
        .pricing-block:nth-child(3) .price {
            color: #ffc20b;
        }

        .pricing-block:nth-child(3) .inner-box:hover .btn-box a {
            color: #ffc20b;
            background: none;
            border-radius: 0px;
            border-color: #ffc20b;
        }
    </style>
    <section class="layout-pt-sm layout-pb-md">
		<div data-anim-wrap="" class="container animated">
			

			<div class="row y-gap-30">


				<div class="col-md-6 col-lg-5 offset-lg-1">
					<div class="priceCard -type-1 rounded-16 bg-white shadow-2">
						<div class="priceCard__content py-45 px-60 text-center">
							<div class="priceCard__type text-18 lh-11 fw-500 text-dark-1">Basic</div>
							<div class="priceCard__price text-50 lh-11 fw-700 text-dark-1 mt-15">$10</div>
							<div class="priceCard__period">per month</div>
							<img class="mt-30" src="img/pricing/2.svg" alt="icon">
							<div class="priceCard__text text-left pr-15 mt-40">Standard listing submission, active for 30 dayss</div>

							<div class="text-left y-gap-15 mt-35">

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									All Operating Supported
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									Great Interface
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									Allows encryption
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									Face recognized system
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									24/7 Full support
								</div>

							</div>

							<div class="d-inline-block mt-30">
                                @auth
                                    @if (has_active_plan($refid))
                                        @php
                                            $plan = get_plan($refid);
                                        @endphp
                                        @if ($plan->slug == 'basic' || $plan->slug == 'premium')
                                            <a href="#" class="button -md -blue-1 bg-blue-1 text-white">Activated</a>
                                        @endif
                                    @else
                                        <a href="{{ route('checkout', ['basic',$refid]) }}" class="button -md -blue-1 bg-blue-1 text-white">Subscribe</a>
                                    @endif
                                @endauth
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5">
					<div class="priceCard -type-1 rounded-16 bg-white shadow-2">
						<div class="priceCard__content py-45 px-60 text-center">
							<div class="priceCard__type text-18 lh-11 fw-500 text-dark-1">Premium</div>
							<div class="priceCard__price text-50 lh-11 fw-700 text-dark-1 mt-15">$20</div>
							<div class="priceCard__period">per month</div>
							<img class="mt-30" src="img/pricing/3.svg" alt="icon">
							<div class="priceCard__text text-left pr-15 mt-40">Standard listing submission, active for 30 dayss</div>

							<div class="text-left y-gap-15 mt-35">

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									All Operating Supported
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									Great Interface
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									Allows encryption
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									Face recognized system
								</div>

								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-purple-1 pr-8">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									24/7 Full support
								</div>

							</div>

							<div class="d-inline-block mt-30">
                                @auth
                                    @if (has_active_plan($refid))
                                        @php
                                            $plan = get_plan($refid);
                                        @endphp
                                        @if ($plan->slug == 'premium')
                                            <a class="button -md -blue-1 bg-blue-1 text-white disabled" href="#">Subscribe</a>
                                        @else
                                            <a href="{{ route('checkout', ['premium',$refid]) }}" class="button -md -blue-1 bg-blue-1 text-white">Upgrade</a>
                                        @endif
                                    @else
                                        <a class="button -md -blue-1 bg-blue-1 text-white" href="{{ route('checkout', ['premium',$refid]) }}">Subscribe</a>
                                    @endif
                                @endauth
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>
    <section class="pricing-section">
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="container">
            <div class="sec-title text-center">
                <span class="title">Get plan</span>
                <h2>Choose a Plan</h2>
            </div>

            <div class="outer-box">
                <div class="row d-md-flex justify-content-center">
                    <!-- Pricing Block -->
                    <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fas fa-paper-plane"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Basic</div>
                                <h4 class="price">$10<span class="fs-6 text-dark">/ month</span></h4>
                            </div>
                            <ul class="features">
                                <li class="true">Conference plans</li>
                                <li class="true">Free Lunch And Coffee</li>
                                <li class="true">Certificate</li>
                                <li class="false">Easy Access</li>
                                <li class="false">Free Contacts</li>
                            </ul>

                            <div class="btn-box">
                                @auth
                                    @if (has_active_plan($refid))
                                        @php
                                            $plan = get_plan($refid);
                                        @endphp
                                        @if ($plan->slug == 'basic' || $plan->slug == 'premium')
                                            <a href="#" class="theme-btn disabled" disabled>Activated</a>
                                        @endif
                                    @else
                                        <a href="{{ route('checkout', ['basic',$refid]) }}" class="theme-btn">BUY plan</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Block -->
                    <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fas fa-gem"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Premium</div>
                                <h4 class="price">$20 <span class="fs-6 text-dark">/ month</span></h4>
                            </div>
                            <ul class="features">
                                <li class="true">Conference plans</li>
                                <li class="true">Free Lunch And Coffee</li>
                                <li class="true">Certificate</li>
                                <li class="true">Easy Access</li>
                                <li class="false">Free Contacts</li>
                            </ul>
                            <div class="btn-box">
                                @auth
                                    @if (has_active_plan($refid))
                                        @php
                                            $plan = get_plan($refid);
                                        @endphp
                                        @if ($plan->slug == 'premium')
                                            <a href="#" class="theme-btn disabled" disabled>Activated</a>
                                        @else
                                            <a href="{{ route('checkout', ['premium',$refid]) }}" class="theme-btn">Upgrade</a>
                                        @endif
                                    @else
                                        <a href="{{ route('checkout', ['premium',$refid]) }}" class="theme-btn">BUY plan</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
