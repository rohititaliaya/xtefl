@extends('provider.layouts.app')

@section('content')
<div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">
        <h1 class="text-30 lh-14 fw-600">Settings</h1>
    </div>
</div>


<div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="tabs -underline-2 js-tabs">
        <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">1. Business Information</button>
            </div>

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button " data-tab-target=".-tab-item-2">2. Location Information</button>
            </div>

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button " data-tab-target=".-tab-item-3">3. Change Password</button>
            </div>
            
            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button " data-tab-target=".-tab-item-4">4. Other Info</button>
            </div>

        </div>

        <div class="tabs__content pt-30 js-tabs-content">
            <div class="tabs__pane -tab-item-1 is-tab-el-active">
                <div class="row y-gap-30 items-center">
                    <div class="col-auto">
                        <div class="d-flex ratio ratio-1:1 w-200">
                            <img src="{{asset('assets/images/dashboard/featured/2.jpg')}}" alt="image" class="img-ratio rounded-4">

                            <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                <div class="size-40 bg-white rounded-4 flex-center">
                                    <i class="icon-trash text-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <h4 class="text-16 fw-500">Logo</h4>
                        <div class="text-14 mt-5">PNG or JPG no bigger than 150px wide and tall.</div>

                        <div class="d-inline-block mt-15">
                            <button class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
        <i class="icon-upload-file text-20 mr-10"></i>
        Browse
      </button>
                        

                        </div>
                    </div>
                </div>

                <div class="border-top-light mt-30 mb-30"></div>

                <div class="col-xl-9">
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Business Name</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" disabled class="bg-light-2">
                                <label class="lh-1 text-16 text-light-1">User Name</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">First Name</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Last Name</label>
                            </div>

                        </div>

                        <div class="col-md-6">


                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Job Title</label>
                            </div>

                        </div>
                        
                        <div class="col-md-6">


                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Email</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Phone Number</label>
                            </div>

                        </div>


                        <div class="col-12">

                            <div class="form-input ">
                                <textarea required rows="5"></textarea>
                                <label class="lh-1 text-16 text-light-1">About the company</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="tabs__pane -tab-item-2">
                <div class="col-xl-9">
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Address Line 1</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Address Line 2</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">City</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">State</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Select Country</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">ZIP Code</label>
                            </div>

                        </div>

                        
                    </div>
                </div>
            </div>

            
            
            <div class="tabs__pane -tab-item-3">
                <div class="col-xl-9">
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Current Password</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">New Password</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">New Password Again</label>
                            </div>

                        </div>

                        
                    </div>
                </div>
            </div>
            
            <div class="tabs__pane -tab-item-4">
                <div class="col-xl-9">
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Exclude IP</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Something else</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Something else again</label>
                            </div>

                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row x-gap-10 y-gap-10 mt-40">
    <div class="col-auto">
        <a href="#" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
            Save Changes <div class="icon-arrow-top-right ml-15"></div>
          </a>
    </div>

    <div class="col-auto">
        <button class="button h-50 px-24 -blue-1 bg-blue-1-05 text-blue-1">Cancel</button>
    </div>
</div>
    {{-- <section>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-6 col-md-6">

                    <h2>{{ __('Settings') }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            @if (Session::has('success'))
                <div class="my-3 alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-md-6 col-12">

                <div class="card ">
                    <div class="card-header">
                        <h1>Profile</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('provider.settings.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="mt-3">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="{{auth()->user()->name}}" class="form-control" autocomplete="off">
                            </div>
                            <div class="mt-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}" autocomplete="off">
                            </div>
                            <div class="mt-3 row">
                                <div class="col-md-8 col-12">
                                    <label for="logo">Logo:</label>
                                    <input type="file" name="logo" id="logo" value="{{auth()->user()->logo}}" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-4 col-12">
                                    @php
                                        $logo = 'https://dummyimage.com/100x100/adadad/000000&text=no+image';
                                        if (!is_null(auth()->user()->logo)) {
                                            $logo = asset('uploads/'.auth()->user()->logo);
                                        }
                                    @endphp
                                    <div class="preview">
                                        <img src="{{$logo}}" alt="{{auth()->user()->name}}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="website">Website Url:</label>
                                <input type="text" name="website" id="website" class="form-control" value="{{auth()->user()->website}}" autocomplete="off">
                            </div>
                            <div class="mt-3">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">

                <div class="card">
                    <div class="card-header">
                        <h1>Active Plans</h1>
                    </div>
                    @php
                        $plan = get_plan();
                        // dd($plan);
                    @endphp
                    <div class="card-body">
                        @if (has_active_plan())
                        <p class="text-success">

                            ${{$plan->price}}
                            {{$plan->name}} plan is active
                            @if ($plan->slug=='basic')
                            <a href="{{route('plans')}}" class="btn btn-primary">Upgrade</a>
                            @endif
                        </p>
                        @else
                            <p class="text-danger">No Plan Active

                                <a href="{{route('plans')}}" class="btn btn-primary">Subscribe</a>
                            </p>

                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section> --}}
@endsection
