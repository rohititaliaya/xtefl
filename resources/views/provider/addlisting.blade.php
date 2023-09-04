@extends('provider.layouts.app')

@section('content')
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
        <div class="col-auto">
            <h1 class="text-30 lh-14 fw-600">Add Listing</h1>
        </div>
    </div>
    <form action="{{ route('provider.addlisting') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name="type" value="basic" hidden>
        <input type="text" name="provider_id" value="{{ Auth::user()->id }}" hidden>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-50">
            <div class="col-xl-10">

                <div class="row x-gap-20 y-gap-20">
                    <div class="col-12">
                        <div class="form-input ">
                            <input type="text" name="campaign" id="campaign" required>
                            <label class="lh-1 text-16 text-light-1">Campaign Name</label>
                        </div>
                        <div>
                            <p class="text-14 text-light-1">This is an identifier, helping you identify the listings. If you
                                have two listings, you can name the campaign accordingly. Ex: "Online TEFL" for an Online
                                TEFL course listing, and "Teach Abroad in Spain" for one such listing. Should be less than
                                70 characters.</p>
                        </div>

                    </div>

                    <div class="col-12 mt-20">
                        <div class="form-input ">
                            <input type="text" name="target_url" id="target_url" required>
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
                                <input type="radio" name="utm" value="1" wfd-id="id8">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="text-16 lh-1 ml-10 fw-600">Use global UTM parameters</div>

                        </div>
                        <div class="text-light-1 mt-4">(Ex:
                            https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings)
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-radio d-flex items-center ">
                            <div class="radio">
                                <input type="radio" name="utm" value="2" wfd-id="id8">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="text-16 lh-1 ml-10 fw-600">Use listing specific UTM parameters</div>
                        </div>
                        <div class="text-light-1 mt-4">(Ex:
                            https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=top_featured_listings)
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-radio d-flex items-center ">
                            <div class="radio">
                                <input type="radio" name="utm" value="3" wfd-id="id8">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="text-16 lh-1 ml-10 fw-600">Do not use UTM parameters</div>
                        </div>
                        <div class="text-light-1 mt-4">(Ex: https://yourdomain.com)</div>
                    </div>
                    <div class="col-12">
                        <div class="text-light-1"><a href="#" class="text-blue-1 underline">Click here</a> for more
                            information on UTM parameters.</div>
                    </div>
                </div>

            </div>
        </div>



        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-50">
            <div class="tabs -underline-2 js-tabs">

                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

                    <div class="col-auto">
                        <button
                            class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active"
                            data-tab-target=".-tab-item-1">1. Basic</button>
                    </div>

                    <div class="col-auto">
                        <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button "
                            data-tab-target=".-tab-item-2">2. Premium</button>
                    </div>

                </div>

                <div class="tabs__content pt-30 js-tabs-content">

                    <div class="tabs__pane -tab-item-1 is-tab-el-active">

                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">1. Listing Info: <span
                                    class="text-blue-1">Recommended Programs</span>
                            </div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="recomm_title" id="recomm_title" required>
                                        <label class="lh-1 text-16 text-light-1">Title:</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                                        @error('basic_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12 mt-20">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="recomm_url" class="bg-light-2 pt-50 lh-14"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                    <p>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=recommended_listings</p>

                                </div>

                            </div>


                            <div class="mt-50">
                                <div class="fw-500">Image</div>

                                <div class="row x-gap-20 y-gap-20 pt-15">
                                    <div class="col-auto">
                                        <div class="w-200">
                                            {{-- <div class="d-flex ratio ratio-1:1">
                                                <div
                                                    class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                                    <a href="#">
                                                        <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                        <div class="text-blue-1 fw-500">Upload Images</div>
                                                    </a>
                                                </div>
                                            </div> --}}
                                            <input type="file" class="form-control" id="recomm_image" name="recomm_image">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('assets/images/dashboard/avatars/3.png') }}" alt="image"
                                                class="img-ratio rounded-4">

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
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Listing Info: <span
                                    class="text-green-2">Popular Programs</span>
                            </div>

                            <div class="row x-gap-20 y-gap-20 mt-20 mb-30">
                                <div class="col-12">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="same_as" id="same_as">
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
                                        <input type="text" name="popular_title" id="popular_title" required>
                                        <label class="lh-1 text-16 text-light-1">Title:</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                                    </div>

                                </div>
                                <div class="col-12 mt-20">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="popular_url" id="popular_url" class="bg-light-2 pt-50 lh-14"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                    <p>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=popular_listings</p>

                                </div>

                            </div>


                            <div class="mt-50">
                                <div class="fw-500">Image</div>

                                <div class="row x-gap-20 y-gap-20 pt-15">
                                    <div class="col-auto">
                                        <div class="w-200">
                                            {{-- <div class="d-flex ratio ratio-1:1">
                                                <div
                                                    class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                                    <a href="#">
                                                        <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                        <div class="text-blue-1 fw-500">Upload Images</div>
                                                    </a>
                                                </div>
                                            </div> --}}
                                            <input type="file" class="form-control" id="popular_image" name="popular_image">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('assets/images/dashboard/avatars/3.png') }}" alt="image"
                                                class="img-ratio rounded-4">

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
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Listing Info: <span
                                    class="text-red-2">Top Featured Programs</span>
                            </div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="featured_title" id="featured_title" required>
                                        <label class="lh-1 text-16 text-light-1">Title:</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                                    </div>

                                </div>
                                <div class="col-12 mt-20">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="featured_url" id="featured_url" class="bg-light-2 pt-50 lh-14"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                    <p>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=premium_listings&utm_content=top_featured_listings</p>

                                </div>

                            </div>


                            <div class="mt-50">
                                <div class="fw-500">Image</div>

                                <div class="row x-gap-20 y-gap-20 pt-15">
                                    <div class="col-auto">
                                        <div class="w-200">
                                            {{-- <div class="d-flex ratio ratio-1:1">
                                                <div
                                                    class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                                    <a href="#">
                                                        <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                        <div class="text-blue-1 fw-500">Upload Images</div>
                                                    </a>
                                                </div>
                                            </div> --}}
                                            <input type="file" class="form-control" id="featured_image" name="featured_image">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('assets/images/dashboard/avatars/3.png') }}" alt="image"
                                                class="img-ratio rounded-4">

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
                                        <textarea required name="org_description" id="org_description" rows="2"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Description</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Organization description should be less than 120
                                            characters.</p>
                                    </div>

                                </div>
                                <div class="col-12 mt-20">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="org_url" id="org_url" class="bg-light-2 pt-50 lh-14"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                    <p>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=premium_listings&utm_content=top_organization</p>

                                </div>

                            </div>


                            <div class="mt-50">
                                <div class="fw-500">Image</div>

                                <div class="row x-gap-20 y-gap-20 pt-15">
                                    <div class="col-auto">
                                        <div class="w-200">
                                            {{-- <div class="d-flex ratio ratio-1:1">
                                                <div
                                                    class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                                                    <a href="#">
                                                        <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                        <div class="text-blue-1 fw-500">Upload Images</div>
                                                    </a>
                                                </div>
                                            </div> --}}
                                            <input type="file" class="form-control" id="org_image" name="org_image">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('assets/images/dashboard/avatars/3.png') }}" alt="image"
                                                class="img-ratio rounded-4">

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
                                        <textarea required name="video_description" id="video_description" rows="2"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Description</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Video description should be less than 120
                                            characters.</p>
                                    </div>

                                </div>
                                <div class="col-12 mt-20">

                                    <div class="form-input ">
                                        <input type="text" name="youtube_url" id="youtube_url" required>
                                        <label class="lh-1 text-16 text-light-1">Youtube URL</label>
                                    </div>

                                </div>
                                <div class="col-12 mt-20">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="video_url" id="video_url" class="bg-light-2 pt-50 lh-14"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                    <p>https://yourdomain.com/?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=premium_listings&utm_content=featured_video</p>

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
                                <input type="radio" name="status" value="1" wfd-id="id8">
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
                                <input type="radio" name="status" value="2" wfd-id="id8">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="text-16 lh-1 ml-10 fw-600">Pause listing (De-activate)</div>
                        </div>
                        <div class="text-light-1 mt-20">Note: To stop the payment, please visit the "Billing" page, and
                            cancel the subscription.</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row x-gap-20 y-gap-20 mt-10">
            <div class="col-12">
                <div class="d-flex items-center pt-30">
                    <button type="submit" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white"
                        title="Save and return to the dashboard">Save and Return</button>
                    {{-- <a href="#" class="button px-30 fw-400 text-14 bg-yellow-1 h-50 text-dark-1 ml-20"
                        title="Save and continue entering the data">Save and Continue</a> --}}
                </div>
            </div>
        </div>
    </form>
@endsection
