@extends('provider.layouts.app')

@section('content')
<div class="row y-gap-20 justify-between items-end pb-20">
    <div class="col-auto">

        <h1 class="text-30 lh-14 fw-600">Billing</h1>
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    </div>

    <div class="col-auto">

        <div class="row x-gap-20 y-gap-20 items-center">
            <div class="col-auto">
                <div class="w-230 single-field relative d-flex items-center">

                    <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01"
                        max="2018-12-31" class="date-input bg-white text-dark-1 h-50 rounded-8 pl-45">

                    <button class="absolute d-flex items-center h-full pointer-events-none">
                        <i class="icon-calendar text-20 px-15 text-dark-1"></i>
                    </button>
                </div>
            </div>

            <div class="col-auto">

                <div class="dropdown js-dropdown js-services-active">
                    <div class="dropdown__button d-flex items-center justify-between bg-white rounded-4 w-230 text-14 px-20 h-50 text-14"
                        data-el-toggle=".js-services-toggle" data-el-toggle-active=".js-services-active">
                        <span class="js-dropdown-title">Services</span>
                        <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                    </div>

                    <div class="toggle-element -dropdown  js-click-dropdown js-services-toggle">
                        <div class="text-14 y-gap-15 js-dropdown-list">

                            <div><a href="#" class="d-block js-dropdown-link">Animation</a></div>

                            <div><a href="#" class="d-block js-dropdown-link">Design</a></div>

                            <div><a href="#" class="d-block js-dropdown-link">Illustration</a></div>

                            <div><a href="#" class="d-block js-dropdown-link">Lifestyle</a></div>

                            <div><a href="#" class="d-block js-dropdown-link">Business</a></div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-auto">
                <div class="w-230 single-field relative d-flex items-center">
                    <input class="pl-50 bg-white text-dark-1 h-50 rounded-8" type="email" placeholder="Search">
                    <button class="absolute d-flex items-center h-full">
                        <i class="icon-search text-20 px-15 text-dark-1"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="tabs -underline-2 js-tabs">
        <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

            <div class="col-auto">
                <button
                    class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active"
                    data-tab-target=".-tab-item-1">All Booking</button>
            </div>

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button "
                    data-tab-target=".-tab-item-2">Completed</button>
            </div>

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button "
                    data-tab-target=".-tab-item-3">Processing</button>
            </div>



        </div>

        <div class="tabs__content pt-30 js-tabs-content">

            <div class="tabs__pane -tab-item-1 is-tab-el-active">
                <div class="overflow-scroll scroll-bar-1">
                    <table class="table-3 -border-bottom col-12">
                        <thead class="bg-light-2">
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Order Date</th>
                                <th>Execution Time</th>
                                <th>Paid</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                            <tr>
                                <td>{{$item->plan_id}}</td>
                                @php
                                    $listing = \App\Models\ProviderListing::where('reference_id',$item->reference_id)->first();
                                @endphp
                                <td>{{$listing->campaign}}</td>
                                <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                <td class="lh-16">Start : {{date('d-m-Y',strtotime($item->created_at))}}<br>End date : {{date('d-m-Y',strtotime($item->expiry_date))}}</td>

                                <td>${{$item->amount}}</td>
                         
                                <td>
                                    @if ($item->status == '1')
                                        
                                    <span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Success</span>
                                    @else
                                    <span
                                    class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-red-4 text-red-3">Success</span>
                                
                                    @endif
                                </td>
                                <td>
                                    <a target="_blank" href="{{route('checkout.download',$item->transaction_id)}}" class="btn btn-primary">
                                            Receipt
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tabs__pane -tab-item-2 ">
                <div class="overflow-scroll scroll-bar-1">
                    <table class="table-3 -border-bottom col-12">
                        <thead class="bg-light-2">
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Order Date</th>
                                <th>Execution Time</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Remain</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3">Pending</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Confirmed</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-red-3 text-red-2">Rejected</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Confirmed</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Confirmed</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tabs__pane -tab-item-3 ">
                <div class="overflow-scroll scroll-bar-1">
                    <table class="table-3 -border-bottom col-12">
                        <thead class="bg-light-2">
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Order Date</th>
                                <th>Execution Time</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Remain</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3">Pending</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Confirmed</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-red-3 text-red-2">Rejected</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Confirmed</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>Hotel</td>
                                <td>The May Fair Hotel</td>
                                <td>04/04/2022</td>
                                <td class="lh-16">Check in : 05/14/2022<br>Check out : 05/29/2022</td>
                                <td class="fw-500">$130</td>
                                <td>$0</td>
                                <td>$35</td>
                                <td><span
                                        class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">Confirmed</span>
                                </td>
                                <td>Actions</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>

    <div class="pt-30">
        <div class="row justify-between">
            <div class="col-auto">
                <button class="button -blue-1 size-40 rounded-full border-light">
                    <i class="icon-chevron-left text-12"></i>
                </button>
            </div>

            <div class="col-auto">
                <div class="row x-gap-20 y-gap-20 items-center">

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full">1</div>

                    </div>

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full bg-dark-1 text-white">2</div>

                    </div>

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full">3</div>

                    </div>

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full bg-light-2">4</div>

                    </div>

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full">5</div>

                    </div>

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full">...</div>

                    </div>

                    <div class="col-auto">

                        <div class="size-40 flex-center rounded-full">20</div>

                    </div>

                </div>
            </div>

            <div class="col-auto">
                <button class="button -blue-1 size-40 rounded-full border-light">
                    <i class="icon-chevron-right text-12"></i>
                </button>
            </div>
        </div>
    </div>
</div>
{{--     
   
    <section>
        <div class="container-fluid my-2">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-none border-0">
                                <h3 class="text-primary">Billing</h3>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th>Transaction Id</th>
                                    <th>Expiry date</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($transactions as $item)
                                <tr>
                                    <td>{{\App\Models\Plan::find($item->plan_id)->first()->name}}</td>
                                    <td>${{$item->amount}}</td>
                                    <td>{{$item->transaction_id}}</td>
                                    <td>
                                        @if (!is_null($item->expiry_date))
                                            {{date('d-m-Y',strtotime($item->expiry_date))}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">success</span>
                                        @else
                                            <span class="badge bg-danger">fail</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a href="{{route('checkout.download', $item->transaction_id)}}">Download PDF</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
