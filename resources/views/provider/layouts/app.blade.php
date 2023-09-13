<!DOCTYPE html>
<html lang="en">
    @include('provider.layouts.head')
    <body data-barba="wrapper">
        @include('provider.layouts.preloader')

        @include('provider.layouts.topnav')
        <div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
            <div class="dashboard__main">
                <div class="dashboard__content bg-light-2 pb-30">
                    @include('provider.layouts.navbar')
                    @if (Session::has('success'))
                    <div class="d-flex items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                        <div class="text-success-2 lh-1 fw-500">{{Session::get('success')}}</div>
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="d-flex items-center justify-between bg-error-1 pl-30 pr-20 py-30 rounded-8">
                        <div class="text-error-2 lh-1 fw-500">{{Session::get('error')}}</div>
                    </div>
                    @endif
                    @yield('content')
                    @include('provider.layouts.footer')
                </div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
        <script src="{{asset('js/vendors.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @stack('scripts')
    </body>
</html>
    

