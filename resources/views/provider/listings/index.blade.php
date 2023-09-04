@extends('provider.layouts.app')

@section('content')
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
        <div class="col-auto">
            <h1 class="text-30 lh-14 fw-600">Listings</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('provider.addlisting') }}" class="button -md h-60 -blue-1 bg-blue-1 text-white">Create Listing
                <span class="icon-arrow-top-right ml-15"></span></a>
        </div>
        @if (Session::has('success'))
            <div class="my-3 alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="my-3 alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
</div>


@foreach ($listings as $item)
    <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-50">
        <div class="row y-gap-20">
            <div class="col-12">
                <!-- one listing -->
                <div class="row x-gap-20 y-gap-30">
                    <div class="col-md-auto">
                        <div class="cardImage ratio ratio-1:1 w-200 md:w-1/1 rounded-4">
                            <div class="cardImage__content">

                                <img class="rounded-4 col-12" src="{{asset('uploads/'.$item->recomm_image)}}"
                                    alt="{{$item->title}}">

                            </div>
                        </div>
                    </div>

                    <div class="col-md">
                        <h3 class="text-18 lh-14 fw-500">{{$item->title}}</h3>
                        <div class="row x-gap-10 y-gap-10 items-center pt-30">
                            @if (has_active_plan($item->reference_id))
                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-green-1 text-green-2">Status: Active
                                </div>
                            </div>
                            @else
                                <div class="col-auto">
                                    <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-red-3 text-red-1 ">Status: Not Active
                                    </div>
                                </div>
                            @endif
                            @if (has_active_plan($item->reference_id))    
                            @php
                                $plan = get_plan($item->reference_id);
                            @endphp
                                <div class="col-auto">
                                    <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-blue-2 text-blue-1">Plan: {{$plan->name}}</div>
                                </div>
                            @else
                                <div class="col-auto">
                                    <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-red-3 text-red-1 ">No Plan Active
                                    </div>
                                </div>
                            @endif
                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-blue-3 text-blue-1 ">Impressions: 4598
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-yellow-4">Clicks: 587</div>
                            </div>
                        </div>

                        <div class="row x-gap-10 y-gap-10 pt-10 mt-40 border-top-light">

                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">
                                        <a href="edit-listings.php">
                                            <i class="icon-eye text-16 text-white lh-16"></i>
                                        </a>
                                    </div>
                                    <div class="text-14 text-dark-1 fw-500 ml-10">
                                        <a href="edit-listings.php">
                                            Edit
                                        </a>
                                    </div>

                                    <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white ml-30">
                                        <a href="#">
                                            <i class="icon-eye text-16 text-white lh-16"></i>
                                        </a>
                                    </div>
                                    <div class="text-14 text-dark-1 fw-500 ml-10">
                                        <a href="#">
                                            Stats
                                        </a>
                                    </div>

                                    <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white ml-30">
                                        <a href="#">
                                            <i class="icon-eye text-16 text-white lh-16"></i>
                                        </a>
                                    </div>
                                    @if (has_active_plan($item->reference_id))
                                        @php
                                            $plan = get_plan($item->reference_id);
                                        @endphp
                                        @if ($plan->slug == 'basic')                                            
                                            <div class="text-14 text-dark-1 fw-500 ml-10">
                                                <a href="{{route('plans', $item->reference_id)}}">
                                                    Upgrade Plan
                                                </a>
                                            </div>
                                        @endif
                                        
                                    @else
                                    <div class="text-14 text-dark-1 fw-500 ml-10">
                                        <a href="{{route('plans', $item->reference_id)}}">
                                            Pay now
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach




       <!--  <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-50">
        <div class="row y-gap-20">
            <div class="col-12">
            one listing
                <div class="row x-gap-20 y-gap-30">
                    <div class="col-md-auto">

                        <div class="cardImage ratio ratio-1:1 w-200 md:w-1/1 rounded-4">
                            <div class="cardImage__content">

                                <img class="rounded-4 col-12" src="{{ asset('assets/images/dashboard/featured/2.jpg') }}"
                                    alt="image">

                            </div>
                        </div>
                    </div>

                    <div class="col-md">
                        <h3 class="text-18 lh-14 fw-500">Great Northern Hotel, a Tribute Portfolio Hotel, London</h3>

                        <div class="row x-gap-10 y-gap-10 items-center pt-30">
                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-green-1 text-green-2">Status: Active
                                </div>

                            </div>
                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-blue-2 text-blue-1">Plan: Basic</div>
                            </div>
                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-red-3 text-red-1 ">Impressions: 4598
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-yellow-4">Clicks: 587</div>
                            </div>
                        </div>

                        <div class="row x-gap-10 y-gap-10 pt-10 mt-40 border-top-light">

                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">
                                        <a href="edit-listings.php">
                                            <i class="icon-eye text-16 text-white lh-16"></i>
                                        </a>
                                    </div>
                                    <div class="text-14 text-dark-1 fw-500 ml-10">
                                        <a href="edit-listings.php">
                                            Edit
                                        </a>
                                    </div>

                                    <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white ml-30">
                                        <a href="#">
                                            <i class="icon-eye text-16 text-white lh-16"></i>
                                        </a>
                                    </div>
                                    <div class="text-14 text-dark-1 fw-500 ml-10">
                                        <a href="#">
                                            Stats
                                        </a>
                                    </div>

                                    <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white ml-30">
                                        <a href="#">
                                            <i class="icon-eye text-16 text-white lh-16"></i>
                                        </a>
                                    </div>
                                    <div class="text-14 text-dark-1 fw-500 ml-10">
                                        <a href="#">
                                            Change Plan
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div> -->
    </div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Listings</h1>
                        @if (Session::has('success'))
                            <div class="my-3 alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="my-3 alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        {{-- <a href="{{ route('admin.url.create') }}" class="btn btn-primary">Add Content</a> -- }}
<table>

    <tr>
        <th>Title</th>
        <th style="width: 10%;">Image</th>
        <th>URL</th>
        <th>Payment status</th>
        <th></th>
    </tr>
    @foreach ($listings as $item)
    <tr>
        <td>{{$item->title}}</td>
        <td style="width: 10%;">
            <img src="{{asset('uploads/'.$item->image)}}" alt="{{$item->title}}" class="w-75 h-75">
        </td>
        <td>{{$item->listing_url}}</td>
        <td>
            {{$item->payment_status}}
        </td>
        <td>
            <a href="{{route('plans', $item->reference_id)}}" class="btn btn-primary">Pay now </a>
        </td>
    </tr>
    @endforeach
</table>
</div>
                </div>

            </div>
        </div>
       
        <!-- Modal -->
        <div class="modal fade" id="monthsModal" tabindex="-1" aria-labelledby="monthsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="monthform">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="monthsModalLabel">Enter no of months:</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="rowid" id="rowid">
                            <input type="hidden" class="form-control" name="package" id="package">
                            <input type="number" class="form-control" name="months" id="months" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> --}}
@endsection
