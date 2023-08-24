@extends('provider.layouts.app')

@section('content')
<div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">
        <h1 class="text-30 lh-14 fw-600">Add Listing</h1>
    </div>
</div>

<div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-50">
    <div class="col-xl-10">

        <div class="row x-gap-20 y-gap-20">
            <div class="col-12">
                <div class="form-input ">
                    <input type="text" required>
                    <label class="lh-1 text-16 text-light-1">Campaign Name</label>
                </div>
                <div>
                    <p class="text-14 text-light-1">This is an identifier, helping you identify the listings. If you have two listings, you can name the campaign accordingly. Ex: "Online TEFL" for an Online TEFL course listing, and "Teach Abroad in Spain" for one such listing. Should be less than 70 characters.</p>
                </div>

            </div>
            
            <div class="col-12 mt-20">
                <div class="form-input ">
                    <input type="text" required>
                    <label class="lh-1 text-16 text-light-1">Target URL</label>
                </div>
                <div>
                    <p class="text-14 text-light-1">Enter a valid URL. Begin with https://</p>
                </div>

            </div>
        </div>
        <div class="row x-gap-20 y-gap-20 mt-30 mb-30">
            <div class="col-12">
                <div class="form-radio d-flex items-center ">
                    <div class="radio">
                        <input type="radio" name="name" wfd-id="id8">
                        <div class="radio__mark">
                            <div class="radio__icon"></div>
                        </div>
                    </div>
                    <div class="text-16 lh-1 ml-10 fw-600">Use global UTM parameters</div>

                </div>
                <div class="text-light-1 mt-4">(Ex: https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings)</div>
            </div>
            <div class="col-12">
                <div class="form-radio d-flex items-center ">
                    <div class="radio">
                        <input type="radio" name="name" wfd-id="id8">
                        <div class="radio__mark">
                            <div class="radio__icon"></div>
                        </div>
                    </div>
                    <div class="text-16 lh-1 ml-10 fw-600">Use listing specific UTM parameters</div>
                </div>
                <div class="text-light-1 mt-4">(Ex: https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=top_featured_listings)</div>
            </div>
            <div class="col-12">
                <div class="form-radio d-flex items-center ">
                    <div class="radio">
                        <input type="radio" name="name" wfd-id="id8">
                        <div class="radio__mark">
                            <div class="radio__icon"></div>
                        </div>
                    </div>
                    <div class="text-16 lh-1 ml-10 fw-600">Do not use UTM parameters</div>
                </div>
                <div class="text-light-1 mt-4">(Ex: https://yourdomain.com)</div>
            </div>
            <div class="col-12">
                <div class="text-light-1"><a href="#" class="text-blue-1 underline">Click here</a> for more information on UTM parameters.</div>
            </div>
        </div>
    
    </div>
</div>


<div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-50">
    <div class="tabs -underline-2 js-tabs">

        <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">1. Basic</button>
            </div>

            <div class="col-auto">
                <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button " data-tab-target=".-tab-item-2">2. Premium</button>
            </div>

        </div>

        <div class="tabs__content pt-30 js-tabs-content">

            <div class="tabs__pane -tab-item-1 is-tab-el-active">

                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">1. Listing Info: <span class="text-blue-1">Recommended Programs</span>
                    </div>

                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Title:</label>
                            </div>
                            <div>
                                <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                            </div>

                        </div>
                        <div class="col-12 mt-20">

                            <div class="form-input ">
                                <textarea required rows="2" class="bg-light-2 pt-50 lh-14" disabled>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=recommended_listings</textarea>
                                <label class="lh-1 text-16 text-light-1">Target URL:</label>
                            </div>

                        </div>

                    </div>


                    <div class="mt-50">
                        <div class="fw-500">Image</div>

                        <div class="row x-gap-20 y-gap-20 pt-15">
                            <div class="col-auto">
                                <div class="w-200">
                                    <div class="d-flex ratio ratio-1:1">
                                        <div class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                            <a href="#">
                                                <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                <div class="text-blue-1 fw-500">Upload Images</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than 800px wide and tall.</div>
                                </div>
                            </div>


                            <div class="col-auto">
                                <div class="d-flex ratio ratio-1:1 w-200">
                                    <img src="{{asset('assets/images/dashboard/avatars/3.png')}}" alt="image" class="img-ratio rounded-4">

                                    <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                        <div class="size-40 bg-white rounded-4 flex-center">
                                            <a href="#"><i class="icon-trash text-16"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="border-top-light mt-50 mb-50"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Listing Info: <span class="text-green-2">Popular Programs</span>
                    </div>

                    <div class="row x-gap-20 y-gap-20 mt-20 mb-30">
                        <div class="col-12">

                            <div class="d-flex items-center">
                                <div class="form-checkbox ">
                                    <input type="checkbox" name="name">
                                    <div class="form-checkbox__mark">
                                        <div class="form-checkbox__icon icon-check"></div>
                                    </div>
                                </div>

                                <div class="text-15 lh-11 ml-10">Same as above</div>

                            </div>

                        </div>
                    </div>


                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Title:</label>
                            </div>
                            <div>
                                <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                            </div>

                        </div>
                        <div class="col-12 mt-20">

                            <div class="form-input ">
                                <textarea required rows="2" class="bg-light-2 pt-50 lh-14" disabled>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=popular_listings</textarea>
                                <label class="lh-1 text-16 text-light-1">Target URL:</label>
                            </div>

                        </div>

                    </div>


                    <div class="mt-50">
                        <div class="fw-500">Image</div>

                        <div class="row x-gap-20 y-gap-20 pt-15">
                            <div class="col-auto">
                                <div class="w-200">
                                    <div class="d-flex ratio ratio-1:1">
                                        <div class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                            <a href="#">
                                                <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                <div class="text-blue-1 fw-500">Upload Images</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than 800px wide and tall.</div>
                                </div>
                            </div>


                            <div class="col-auto">
                                <div class="d-flex ratio ratio-1:1 w-200">
                                    <img src="{{asset('assets/images/dashboard/avatars/3.png')}}" alt="image" class="img-ratio rounded-4">

                                    <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                        <div class="size-40 bg-white rounded-4 flex-center">
                                            <a href="#"><i class="icon-trash text-16"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                

            </div>

            <div class="tabs__pane -tab-item-2">
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Listing Info: <span class="text-red-2">Top Featured Programs</span>
                    </div>

                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Title:</label>
                            </div>
                            <div>
                                <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                            </div>

                        </div>
                        <div class="col-12 mt-20">

                            <div class="form-input ">
                                <textarea required rows="2" class="bg-light-2 pt-50 lh-14" disabled>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=premium_listings&utm_content=top_featured_listings</textarea>
                                <label class="lh-1 text-16 text-light-1">Target URL:</label>
                            </div>

                        </div>

                    </div>


                    <div class="mt-50">
                        <div class="fw-500">Image</div>

                        <div class="row x-gap-20 y-gap-20 pt-15">
                            <div class="col-auto">
                                <div class="w-200">
                                    <div class="d-flex ratio ratio-1:1">
                                        <div class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                            <a href="#">
                                                <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                <div class="text-blue-1 fw-500">Upload Images</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than 800px wide and tall.</div>
                                </div>
                            </div>


                            <div class="col-auto">
                                <div class="d-flex ratio ratio-1:1 w-200">
                                    <img src="{{asset('assets/images/dashboard/avatars/3.png')}}" alt="image" class="img-ratio rounded-4">

                                    <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                        <div class="size-40 bg-white rounded-4 flex-center">
                                            <a href="#"><i class="icon-trash text-16"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="border-top-light mt-50 mb-50"></div>

                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Featured Organization</div>

                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <textarea required rows="2"></textarea>
                                <label class="lh-1 text-16 text-light-1">Description</label>
                            </div>
                            <div>
                                <p class="text-14 text-light-1">Organization description should be less than 120 characters.</p>
                            </div>

                        </div>
                        <div class="col-12 mt-20">

                            <div class="form-input ">
                                <textarea required rows="2" class="bg-light-2 pt-50 lh-14" disabled>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=premium_listings&utm_content=top_organization</textarea>
                                <label class="lh-1 text-16 text-light-1">Target URL:</label>
                            </div>

                        </div>

                    </div>


                    <div class="mt-50">
                        <div class="fw-500">Image</div>

                        <div class="row x-gap-20 y-gap-20 pt-15">
                            <div class="col-auto">
                                <div class="w-200">
                                    <div class="d-flex ratio ratio-1:1">
                                        <div class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                            <a href="#">
                                                <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                <div class="text-blue-1 fw-500">Upload Images</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than 800px wide and tall.</div>
                                </div>
                            </div>


                            <div class="col-auto">
                                <div class="d-flex ratio ratio-1:1 w-200">
                                    <img src="{{asset('assets/images/dashboard/avatars/3.png')}}" alt="image" class="img-ratio rounded-4">

                                    <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                        <div class="size-40 bg-white rounded-4 flex-center">
                                            <a href="#"><i class="icon-trash text-16"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="border-top-light mt-50 mb-50"></div>

                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">3. Featured Video</div>

                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <textarea required rows="2"></textarea>
                                <label class="lh-1 text-16 text-light-1">Description</label>
                            </div>
                            <div>
                                <p class="text-14 text-light-1">Video description should be less than 120 characters.</p>
                            </div>

                        </div>
                        <div class="col-12 mt-20">

                            <div class="form-input ">
                                <input type="text" required>
                                <label class="lh-1 text-16 text-light-1">Youtube URL</label>
                            </div>

                        </div>
                        <div class="col-12 mt-20">

                            <div class="form-input ">
                                <textarea required rows="2" class="bg-light-2 pt-50 lh-14" disabled>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=premium_listings&utm_content=featured_video</textarea>
                                <label class="lh-1 text-16 text-light-1">Target URL:</label>
                            </div>

                        </div>

                    </div>



                </div>
                

            </div>

        </div>
    </div>
</div>

<div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-30">
    <div class="col-xl-10">
        
        <div class="row x-gap-20 y-gap-20 mt-20 mb-30">
            <div class="col-12">
                <div class="form-radio d-flex items-center ">
                    <div class="radio">
                        <input type="radio" name="name" wfd-id="id8">
                        <div class="radio__mark">
                            <div class="radio__icon"></div>
                        </div>
                    </div>
                    <div class="text-16 lh-1 ml-10 fw-600">Make listing live (Activate)</div>

                </div>
                
            </div>
            <div class="col-12">
                <div class="form-radio d-flex items-center ">
                    <div class="radio">
                        <input type="radio" name="name" wfd-id="id8">
                        <div class="radio__mark">
                            <div class="radio__icon"></div>
                        </div>
                    </div>
                    <div class="text-16 lh-1 ml-10 fw-600">Pause listing (De-activate)</div>
                </div>
                <div class="text-light-1 mt-20">Note: To stop the payment, please visit the "Billing" page, and cancel the subscription.</div>
            </div>
            
        </div>
    </div>
</div>

<div class="row x-gap-20 y-gap-20 mt-10">
    <div class="col-12">
        <div class="d-flex items-center pt-30">
            <a href="#" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white" title="Save and return to the dashboard">Save and Return</a>
            <a href="#" class="button px-30 fw-400 text-14 bg-yellow-1 h-50 text-dark-1 ml-20" title="Save and continue entering the data">Save and Continue</a>
        </div>
    </div>
</div>    
{{-- <section>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-6 col-md-6">

                    <h2>{{ __('Add a Listing') }}</h2>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-none border-0">
                                <h3 class="text-primary">Basic Listing</h3>
                            </div>
                            <!-- getting the records if available -->
                            @php
                                $basic =\App\Models\Listing::where('provider_id', Auth::user()->id)->where('type','basic')->first();
                            @endphp
                            
                            <form action="{{ route('provider.addlisting') }}" method="post" enctype="multipart/form-data"
                            class="listingform">
                            @csrf
                            @method('POST')
                            <input type="text" name="type" value="basic" hidden>
                            <input type="text" name="provider_id" value="{{Auth::user()->id}}" hidden>
                            <div class="mt-3">
                                <label for="basic_title">Title:</label><br>
                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                    Do not add too many punctuations or exclamations.</span>
                                <input type="text" name="basic_title" id="basic_title" class="form-control"
                                    value="{{($basic)?$basic->title:old('basic_title')}}">
                                <p>Characters: <span id="counts">0/75</span></p>
                                @error('basic_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3 row">
                                <div class="col-9 col-md-9">

                                    <label for="basic_image">Image:</label><br>
                                    <span class="infotxt">File size should be less than 2MB.<br>
                                        Approximate dimensions: 800px W - 500px H</span>
                                    <input type="file" name="basic_image" id="listing_image" class="form-control"
                                        onchange="readURL(this)">
                                    <p class="image-danger text-danger"></p>
                                    <p class="image-ok"></p>
                                    @error('basic_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-3">
                                    @if ($basic && !is_null($basic->image))
                                    <img id="img-preview" src="{{ asset('/uploads/' . $basic->image) }}"
                                        style="width:100px;" />
                                        @else
                                        <img id="img-preview"
                                        src="https://dummyimage.com/100x100/adadad/000000&text=no+image" />
                                        @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="basic_url">URL:</label><br>
                                <span class="infotxt">Start typing the domain name, with 'http' or
                                    'https'.</span>
                                <input type="text" class="form-control" name="basic_url" value="{{ ($basic)?$basic->url:old('basic_url') }}">
                                @error('basic_url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="basic_tag">Tag:</label><br>
                                <input type="radio" class="" name="basic_tag" id="top-rated" value="TOP RATED" @if ($basic && $basic->tag == 'TOP RATED')
                                    checked
                                @endif>
                                <label for="top-rated">TOP RATED</label>
                                <br>
                                <input type="radio" class="" name="basic_tag" id="FEATURED" value="FEATURED" @if ($basic && $basic->tag == 'FEATURED')
                                    checked
                                @endif>
                                <label for="FEATURED">FEATURED</label>
                                <br>
                                <input type="radio" class="" name="basic_tag" id="POPULER" value="POPULER" @if ($basic && $basic->tag == 'POPULER')
                                    checked
                                @endif>
                                <label for="POPULER">POPULER</label>
                                @error('basic_tag')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-none border-0">
                                <h3 class="text-primary">Featured</h3>
                            </div>
                            <!-- getting the records if available -->
                            @php
                                $featured =\App\Models\Listing::where('provider_id', Auth::user()->id)->where('type','featured')->first();
                            @endphp

                            <form action="{{ route('provider.addlisting') }}" method="post" enctype="multipart/form-data"
                            class="listingform">
                            @csrf
                            @method('POST')
                            <input type="text" name="type" value="featured" hidden>
                            <input type="text" name="provider_id" value="{{Auth::user()->id}}" hidden>
                            <div class="mt-3">
                                <label for="featured_title">Title:</label><br>
                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                    Do not add too many punctuations or exclamations.</span>
                                <input type="text" name="featured_title" id="featured_title" class="form-control"
                                    value="{{($featured)?$featured->title:old('featured_title')}}">
                                <p>Characters: <span id="counts">0/75</span></p>
                                @error('featured_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3 row">
                                <div class="col-9 col-md-9">

                                    <label for="featured_image">Image:</label><br>
                                    <span class="infotxt">File size should be less than 2MB.<br>
                                        Approximate dimensions: 800px W - 500px H</span>
                                    <input type="file" name="featured_image" id="listing_image" class="form-control"
                                        onchange="readURL(this)">
                                    <p class="image-danger text-danger"></p>
                                    <p class="image-ok"></p>
                                    @error('featured_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-3">
                                    @if ($featured && !is_null($featured->image))
                                    <img id="img-preview" src="{{ asset('/uploads/' . $featured->image) }}"
                                        style="width:100px;" />
                                        @else
                                        <img id="img-preview"
                                        src="https://dummyimage.com/100x100/adadad/000000&text=no+image" />
                                        @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="featured_url">URL:</label><br>
                                <span class="infotxt">Start typing the domain name, with 'http' or
                                    'https'.</span>
                                <input type="text" class="form-control" name="featured_url" value="{{($featured)?$featured->url:old('featured_url')}}">
                                @error('featured_url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="featured_tag">Tag:</label><br>
                                <input type="radio" class="" name="featured_tag" id="ftop-rated" value="TOP RATED" @if ($featured && $featured->tag == "TOP RATED")
                                    checked
                                @endif>
                                <label for="ftop-rated">TOP RATED</label>
                                <br>
                                <input type="radio" class="" name="featured_tag" id="fFEATURED" value="FEATURED" @if ($featured && $featured->tag == "FEATURED")
                                    checked
                                @endif>
                                <label for="fFEATURED">FEATURED</label>
                                <br>
                                <input type="radio" class="" name="featured_tag" id="fPOPULER" value="POPULER" @if ($featured && $featured->tag == "POPULER")
                                    checked
                                @endif>
                                <label for="fPOPULER">POPULER</label>
                                @error('featured_tag')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-none border-0">
                                <h3 class="text-primary">Organization</h3>
                            </div>
                            <!-- getting the records if available -->
                            @php
                                $org =\App\Models\Listing::where('provider_id', Auth::user()->id)->where('type','org')->first();
                            @endphp

                            <form action="{{ route('provider.addlisting') }}" method="post" enctype="multipart/form-data"
                            class="listingform">
                            @csrf
                            @method('POST')
                            <input type="text" name="type" value="org" hidden>
                            <input type="text" name="provider_id" value="{{Auth::user()->id}}" hidden>
                            <div class="mt-3">
                                <label for="org_description">Description:</label><br>
                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                    Do not add too many punctuations or exclamations.</span>
                                <textarea name="org_description" id="org_description" class="form-control">{{($org)?$org->description:old('org_description')}}</textarea>
                                <p>Characters: <span id="counts">0/75</span></p>
                                @error('org_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3 row">
                                <div class="col-9 col-md-9">
                                    <label for="org_image">Image:</label><br>
                                    <span class="infotxt">File size should be less than 2MB.<br>
                                        Approximate dimensions: 800px W - 500px H</span>
                                    <input type="file" name="org_image" id="listing_image" class="form-control"
                                        onchange="readURL(this)">
                                    <p class="image-danger text-danger"></p>
                                    <p class="image-ok"></p>
                                    @error('org_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-3">
                                    @if ($org && !is_null($org->image))
                                    <img id="img-preview" src="{{ asset('/uploads/' . $org->image) }}"
                                        style="width:100px;" />
                                        @else
                                        <img id="img-preview"
                                        src="https://dummyimage.com/100x100/adadad/000000&text=no+image" />
                                        @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="org_url">URL:</label><br>
                                <span class="infotxt">Start typing the domain name, with 'http' or
                                    'https'.</span>
                                <input type="text" class="form-control" name="org_url" value="{{($org)?$org->url:old('org_url')}}">
                                @error('org_url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-none border-0">
                                <h3 class="text-primary">Video</h3>
                            </div>
                            <!-- getting the records if available -->
                            @php
                                $video =\App\Models\Listing::where('provider_id', Auth::user()->id)->where('type','video')->first();
                            @endphp

                            <form action="{{ route('provider.addlisting') }}" method="post" enctype="multipart/form-data"
                            class="listingform">
                            @csrf
                            @method('POST')
                            <input type="text" name="type" value="video" hidden>
                            <input type="text" name="provider_id" value="{{Auth::user()->id}}" hidden>
                            <div class="mt-3">
                                <label for="video_title">Title:</label><br>
                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                    Do not add too many punctuations or exclamations.</span>
                                <input type="text" name="video_title" id="video_title" class="form-control"
                                    value="{{($video)?$video->title:old('video_title')}}">
                                <p>Characters: <span id="counts">0/75</span></p>
                                @error('video_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-3 row">
                                <label for="video_id">Youtube Video URL ID:</label><br>
                                    <span class="infotxt">Copy only the video ID. <br>
                                        Ex: <span class="text-dark">ABC123EFG</span> from the URL
                                        https://www.youtube.com/watch?v=<span class="text-dark">ABC123EFG</span></span>
                                    <div class="input-group">
                                        <span class="input-group-text">https://www.youtube.com/watch?v=</span>

                                        <input type="text" name="video_id" class="form-control"
                                            value="{{($video)?$video->video_id:old('video_id')}}">
                                    </div>
                                    @error('video_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mt-3">
                                <label for="video_url">URL:</label><br>
                                <span class="infotxt">Start typing the domain name, with 'http' or
                                    'https'.</span>
                                <input type="text" class="form-control" name="video_url" value="{{($video)?$video->url:old('video_url')}}">
                                @error('video_url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                           
                            <div class="mt-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
