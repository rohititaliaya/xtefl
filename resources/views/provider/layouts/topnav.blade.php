<div class="header-margin"></div>
<header data-add-bg="" class="header -dashboard bg-white js-header shadow-1 border-bottom-light" data-x="header"
    data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="-left-side">
            <a href="/provider/dashboard" class="header-logo" data-x="header-logo" data-x-toggle="is-logo-dark">
                <img src="{{asset('assets/images/dashboard/logo-dark.png')}}" alt="logo icon">
                <img src="{{asset('assets/images/dashboard/logo-light.png')}}" alt="logo icon">
            </a>



        </div>

        <div class="row justify-between items-center pl-60 lg:pl-20">
            <div class="col-auto">
                <div class="d-flex items-center">
                    <button data-x-click="dashboard">
                        <i class="icon-menu-2 text-20"></i>
                    </button>


                </div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">

                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>

                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>

                            <div class="menu js-navList">
                                <ul class="menu__nav text-dark-1 fw-500 -is-active">





                                    <li>
                                        <a href="destinations.html">
                                            Destinations
                                        </a>




                                    </li>


                                    <li class="menu-item-has-children">
                                        <a data-barba href="">
                                            <span class="mr-10">Blog</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>





                                        <ul class="subnav">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Blog</a>
                                            </li>

                                            <li><a href="blog-list-1.html">Blog list v1</a>
                                            </li>

                                            <li><a href="blog-list-2.html">Blog list v2</a>
                                            </li>

                                            <li><a href="blog-single.html">Blog single</a>
                                            </li>

                                        </ul>

                                    </li>






                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                            </div>
                        </div>
                    </div>


                    <div class="row items-center x-gap-5 y-gap-20 pl-20 lg:d-none">
                        <div class="col-auto">
                            <button class="button -blue-1-05 size-50 rounded-22 flex-center">
                                <i class="icon-email-2 text-20"></i>
                            </button>




                        </div>

                        <div class="col-auto">
                            <button class="button -blue-1-05 size-50 rounded-22 flex-center">
                                <i class="icon-notification text-20"></i>
                            </button>




                        </div>
                    </div>

                    <div class="pl-15">
                        <img src="{{asset('assets/images/dashboard/avatars/3.png')}}" alt="image" class="size-50 rounded-22 object-cover">
                    </div>

                    <div class="d-none xl:d-flex x-gap-20 items-center pl-20" data-x="header-mobile-icons"
                        data-x-toggle="text-white">
                        <div><button class="d-flex items-center icon-menu text-20"
                                data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- <!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a href="{{route('provider.dashboard')}}" class="nav-link">
                Dashboard
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
     --}}