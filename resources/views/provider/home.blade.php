@extends('provider.layouts.app')

@section('content')
<div class="row y-gap-20 justify-between items-end pb-20">
    <div class="col-auto">

        <h1 class="text-30 lh-14 fw-600">Dashboard</h1>

    </div>

    <div class="col-auto">

    </div>
</div>


<div class="row y-gap-30">

    <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="fw-500 lh-14">Pending</div>
                    <div class="text-26 lh-16 fw-600 mt-5">$12,800</div>
                    <div class="text-15 lh-14 text-light-1 mt-5">Total pending</div>
                </div>

                <div class="col-auto">
                    <img src="{{asset('assets/images/dashboard/dashboard/icons/1.svg')}}" alt="icon">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="fw-500 lh-14">Earnings</div>
                    <div class="text-26 lh-16 fw-600 mt-5">$14,200</div>
                    <div class="text-15 lh-14 text-light-1 mt-5">Total earnings</div>
                </div>

                <div class="col-auto">
                    <img src="{{asset('assets/images/dashboard/dashboard/icons/2.svg')}}" alt="icon">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="fw-500 lh-14">Bookings</div>
                    <div class="text-26 lh-16 fw-600 mt-5">$8,100</div>
                    <div class="text-15 lh-14 text-light-1 mt-5">Total bookings</div>
                </div>

                <div class="col-auto">
                    <img src="{{asset('assets/images/dashboard/dashboard/icons/3.svg')}}" alt="icon">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="fw-500 lh-14">Services</div>
                    <div class="text-26 lh-16 fw-600 mt-5">22,786</div>
                    <div class="text-15 lh-14 text-light-1 mt-5">Total bookable services</div>
                </div>

                <div class="col-auto">
                    <img src="{{asset('assets/images/dashboard/dashboard/icons/4.svg')}}" alt="icon">
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row y-gap-30 pt-20">
    <div class="col-12 mb-40">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="d-flex justify-between items-center">
                <h2 class="text-18 lh-1 fw-500">
                    Earning Statistics
                </h2>



                <div class="dropdown js-dropdown js-category-active">
                    <div class="dropdown__button d-flex items-center bg-white border-light rounded-100 px-15 py-10 text-14 lh-12"
                        data-el-toggle=".js-category-toggle" data-el-toggle-active=".js-category-active">
                        <span class="js-dropdown-title">This Week</span>
                        <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                    </div>

                    <div class="toggle-element -dropdown  js-click-dropdown js-category-toggle">
                        <div class="text-14 y-gap-15 js-dropdown-list">

                            <div><a href="#" class="d-block js-dropdown-link">Animation</a>
                            </div>

                            <div><a href="#" class="d-block js-dropdown-link">Design</a>
                            </div>

                            <div><a href="#" class="d-block js-dropdown-link">Illustration</a>
                            </div>

                            <div><a href="#" class="d-block js-dropdown-link">Business</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="pt-30">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="d-flex justify-between items-center">
                <h2 class="text-18 lh-1 fw-500">
                    Recent Bookings
                </h2>


                <div class="">
                    <a href="#" class="text-14 text-blue-1 fw-500 underline">View All</a>
                </div>
            </div>

            <div class="overflow-scroll scroll-bar-1 pt-30">
                <table class="table-2 col-12">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>#1</td>
                            <td>New York<br> Discover America</td>
                            <td class="fw-500">$130</td>
                            <td>$0</td>
                            <td>
                                <div
                                    class="rounded-100 py-4 text-center col-12 text-14 fw-500 bg-yellow-4 text-yellow-3">
                                    Pending</div>
                            </td>
                            <td>04/04/2022<br>08:16</td>
                        </tr>

                        <tr>
                            <td>#2</td>
                            <td>New York<br> Discover America</td>
                            <td class="fw-500">$130</td>
                            <td>$0</td>
                            <td>
                                <div
                                    class="rounded-100 py-4 text-center col-12 text-14 fw-500 bg-blue-1-05 text-blue-1">
                                    Confirmed</div>
                            </td>
                            <td>04/04/2022<br>08:16</td>
                        </tr>

                        <tr>
                            <td>#3</td>
                            <td>New York<br> Discover America</td>
                            <td class="fw-500">$130</td>
                            <td>$0</td>
                            <td>
                                <div
                                    class="rounded-100 py-4 text-center col-12 text-14 fw-500 bg-red-3 text-red-2">
                                    Rejected</div>
                            </td>
                            <td>04/04/2022<br>08:16</td>
                        </tr>

                        <tr>
                            <td>#4</td>
                            <td>New York<br> Discover America</td>
                            <td class="fw-500">$130</td>
                            <td>$0</td>
                            <td>
                                <div
                                    class="rounded-100 py-4 text-center col-12 text-14 fw-500 bg-blue-1-05 text-blue-1">
                                    Confirmed</div>
                            </td>
                            <td>04/04/2022<br>08:16</td>
                        </tr>

                        <tr>
                            <td>#5</td>
                            <td>New York<br> Discover America</td>
                            <td class="fw-500">$130</td>
                            <td>$0</td>
                            <td>
                                <div
                                    class="rounded-100 py-4 text-center col-12 text-14 fw-500 bg-blue-1-05 text-blue-1">
                                    Confirmed</div>
                            </td>
                            <td>04/04/2022<br>08:16</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                   
                        {{-- <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/basic.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.basic') }}" class="btn  fw-bold fs-5 border-0"> Basic</a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>
                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/org.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.org') }}" class="btn  fw-bold fs-5 border-0">
                                            Organization</a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>
                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/video.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.video') }}" class="btn  fw-bold fs-5 border-0">
                                            Video</a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>
                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/featured.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.featured') }}" class="btn  fw-bold fs-5 border-0"> Featured
                                        </a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>

                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div> -- }}
                        
                    <div class="row">
                        <div class="col-12">

                            <a href="{{ route('provider.basic') }}" class="btn btn-primary p-5 text-white fw-bold">
                                Add/Edit Listings</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section id="modals">
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">About the Listing and prompts</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Show a second modal and hide this one with the button below.
                        dfdsf
                    </div>
                    {{-- <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                </div> -- }}
                </div>
            </div>
        </div>
        {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button> -- }}
    </section> --}}
@endsection
{{-- @push('scripts')
    <script>
        function copyref(btn) {
            var textToCopy = btn.name;
            navigator.clipboard.writeText(textToCopy).then(function() {
                alert('Text copied to clipboard !');
            }, function(err) {
                console.error("Failed to copy text: ", err);
            });
        };
    </script>
@endpush --}}
