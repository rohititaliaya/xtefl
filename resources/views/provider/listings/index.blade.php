@extends('provider.layouts.app')

@section('content')
    <div class="row y-gap-20 justify-between items-end pb-20">
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
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-20">
            <div class="row y-gap-20">
                <div class="col-12">
                    <!-- one listing -->
                    <div class="row x-gap-20 y-gap-30">
                        <div class="col-md-auto">
                            <div class="cardImage ratio ratio-1:1 w-200 md:w-1/1 rounded-4">
                                <div class="cardImage__content">

                                    <img class="rounded-4 col-12" src="{{ asset('uploads/' . $item->recomm_image) }}"
                                        alt="{{ $item->title }}">

                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <h3 class="text-18 lh-14 fw-500">{{ $item->title }}</h3>
                            <div class="row x-gap-10 y-gap-10 items-center pt-30">
                                @if (has_active_plan($item->reference_id))
                                    <div class="col-auto">
                                        <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-green-1 text-green-2">Status:
                                            Active
                                        </div>
                                    </div>
                                @else
                                    <div class="col-auto">
                                        <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-red-3 text-red-1 ">Status: Not
                                            Active
                                        </div>
                                    </div>
                                @endif
                                @if (has_active_plan($item->reference_id))
                                    @php
                                        $plan = get_plan($item->reference_id);
                                    @endphp
                                    <div class="col-auto">
                                        <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-blue-2 text-blue-1">Plan:
                                            {{ $plan->name }}</div>
                                    </div>
                                @else
                                    <div class="col-auto">
                                        <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-red-3 text-red-1 ">No Plan
                                            Active
                                        </div>
                                    </div>
                                @endif
                                <div class="col-auto">
                                    <div class="rounded-100 py-10 px-20 text-14 lh-14 bg-blue-3 text-blue-1 ">Impressions:
                                        4598
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
                                            <a href="{{route('provider.edit',$item->id)}}">
                                                <i class="icon-eye text-16 text-white lh-16"></i>
                                            </a>
                                        </div>
                                        <div class="text-14 text-dark-1 fw-500 ml-10">
                                            <a href="{{route('provider.edit',$item->id)}}">
                                                Edit
                                            </a>
                                        </div>

                                        <div
                                            class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white ml-30">
                                            <a href="#">
                                                <i class="icon-eye text-16 text-white lh-16"></i>
                                            </a>
                                        </div>
                                        <div class="text-14 text-dark-1 fw-500 ml-10">
                                            <a href="#">
                                                Stats
                                            </a>
                                        </div>

                                        <div
                                            class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white ml-30">
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
                                                    <a href="{{ route('plans', $item->reference_id) }}">
                                                        Upgrade Plan
                                                    </a>
                                                </div>
                                            @endif
                                        @else
                                            <div class="text-14 text-dark-1 fw-500 ml-10">
                                                <a href="{{ route('plans', $item->reference_id) }}">
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
@endsection
