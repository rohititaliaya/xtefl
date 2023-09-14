@extends('provider.layouts.app')

@section('content')
    <div class="row y-gap-20 justify-between items-end pb-20 lg:pb-20 md:pb-20">
        <div class="col-auto">
            <h1 class="text-30 lh-14 fw-600">Edit Listing</h1>
        </div>
    </div>
    <form action="{{ route('provider.update',$listing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name="type" value="basic" hidden>
        <input type="text" name="provider_id" value="{{ Auth::user()->id }}" hidden>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-20">
            <div class="col-xl-10">

                <div class="row x-gap-20 y-gap-20">
                    <div class="col-12">
                        <div class="form-input ">
                            <input type="text" name="campaign" id="campaign" value="{{$listing->campaign}}" required>
                            <label class="lh-1 text-16 text-light-1">Campaign Name</label>
                        </div>
                        <div>
                            <p class="text-14 text-light-1">This is an identifier, helping you identify the listings. If you
                                have two listings, you can name the campaign accordingly. Ex: "Online TEFL" for an Online
                                TEFL course listing, and "Teach Abroad in Spain" for one such listing. Should be less than
                                70 characters.</p>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="form-input ">
                            <input type="text" name="target_url" id="target_url"  value="{{$listing->target_url}}" required>
                            <label class="lh-1 text-16 text-light-1">Target URL</label>
                        </div>
                        <div>
                            <p class="text-14 text-light-1">Enter a valid URL. Begin with https://</p>
                            <p id="error-success" class="text-success-2"></p>
                            <p id="error-danger" class="text-error-2"></p>
                        </div>

                    </div>
                </div>
                <div class="row x-gap-20 y-gap-20">
                    <div class="col-12">
                        <div class="form-radio d-flex items-center ">
                            <div class="radio">
                                <input type="radio" name="utm" id="utm1" value="1" wfd-id="id8" @if ($listing->utm == '1') checked @endif>
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="text-16 lh-1 ml-10 fw-600">Do not use UTM parameters</div>
                        </div>
                        <div class="text-light-1 mt-4">(Ex: https://yourdomain.com)</div>
                    </div>
                    <div class="col-12">
                        <div class="form-radio d-flex items-center ">
                            <div class="radio">
                                <input type="radio" name="utm" id="utm2" value="2" wfd-id="id8" @if ($listing->utm == '2') checked @endif>
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
                                <input type="radio" name="utm" id="utm3" value="3" wfd-id="id8" @if ($listing->utm == '3') checked @endif>
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
                        <div class="text-light-1"><a href="#" class="text-blue-1 underline">Click here</a> for more
                            information on UTM parameters.</div>
                    </div>
                </div>

            </div>
        </div>



        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-20">
            <div class="tabs -underline-2 js-tabs">

                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

                    <div class="col-auto">
                        <button
                            class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active"
                            data-tab-target=".-tab-item-1">1. Basic</button>
                    </div>

                </div>

                <div class="tabs__content js-tabs-content">

                    <div class="tabs__pane -tab-item-1 is-tab-el-active">

                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">1. Listing Info: <span
                                    class="text-blue-1">Recommended Programs</span>
                            </div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="recomm_title" id="recomm_title" value="{{$listing->recomm_title}}" required>
                                        <label class="lh-1 text-16 text-light-1">Title:</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                                        @error('basic_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="recomm_url" id="recomm_url" class="bg-light-2 pt-50 lh-14" readonly>{{$listing->recomm_url}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-20">
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
                                            <input type="file" class="form-control" id="recomm_image" name="recomm_image" onchange="readURL(this,'recomm')">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('uploads/'.$listing->recomm_image) }}" alt="image"
                                                class="img-ratio rounded-4" id="img-preview-recomm"> 

                                            <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                                <div class="size-40 bg-white rounded-4 flex-center">
                                                    <a onclick="clearFile('recomm')"><i class="icon-trash text-16"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="border-top-light mt-20 mb-20"></div>
                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Listing Info: <span
                                    class="text-green-2">Popular Programs</span>
                            </div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                        
                                            <input type="checkbox" name="same_as" id="same_as" onchange="sameAsAboveEvent(this)" @if ($listing->same_as == 1)
                                            checked        
                                            @endif>
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
                                        <input type="text" name="popular_title" id="popular_title" value="{{$listing->popular_title}}" required>
                                        <label class="lh-1 text-16 text-light-1">Title:</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea required rows="2" name="popular_url" id="popular_url" class="bg-light-2 pt-50 lh-14" readonly>{{$listing->popular_url}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-20">
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
                                            <input type="file" class="form-control" id="popular_image" name="popular_image" onchange="readURL(this,'popular')">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('uploads/'.$listing->popular_image) }}" alt="image"
                                                class="img-ratio rounded-4" id="img-preview-popular">

                                            <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                                <div class="size-40 bg-white rounded-4 flex-center">
                                                    <a onclick="clearFile('popular')"><i class="icon-trash text-16"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                  

                </div>
            </div>
        </div>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-20">
            <div class="tabs -underline-2 js-tabs">

                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">


                    <div class="col-auto">
                        <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active"
                            data-tab-target=".-tab-item-2">2. Premium</button>
                    </div>

                </div>

                <div class="tabs__content  js-tabs-content">

              
                    <div class="tabs__pane -tab-item-2 is-tab-el-active">
                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Listing Info: <span
                                    class="text-red-2">Top Featured Programs</span>
                            </div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="featured_title" id="featured_title" value="{{$listing->featured_title}}">
                                        <label class="lh-1 text-16 text-light-1">Title:</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Title should be less than 70 characters.</p>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea  rows="2" name="featured_url" id="featured_url" class="bg-light-2 pt-50 lh-14" readonly>{{$listing->featured_url}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                    <p></p>

                                </div>

                            </div>


                            <div class="mt-20">
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
                                            <input type="file" class="form-control" id="featured_image" name="featured_image" onchange="readURL(this,'featured')">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('uploads/'.$listing->featured_image) }}" alt="image"
                                                class="img-ratio rounded-4" id="img-preview-featured">

                                            <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                                <div class="size-40 bg-white rounded-4 flex-center">
                                                    <a onclick="clearFile('featured')"><i class="icon-trash text-16"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="border-top-light mt-20 mb-20"></div>

                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">2. Featured Organization</div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea name="org_description" id="org_description" rows="2">{{$listing->org_description}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Description</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Organization description should be less than 120
                                            characters.</p>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea rows="2" name="org_url" id="org_url" class="bg-light-2 pt-50 lh-14" readonly>{{$listing->org_url}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>

                                </div>

                            </div>


                            <div class="mt-20">
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
                                            <input type="file" class="form-control" id="org_image" name="org_image" onchange="readURL(this,'org')">
                                            <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than
                                                800px wide and tall.</div>
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200">
                                            <img src="{{ asset('uploads/'.$listing->org_image) }}" alt="image"
                                                class="img-ratio rounded-4" id="img-preview-org">

                                            <div class="d-flex justify-end px-10 py-10 h-100 w-1/1 absolute">
                                                <div class="size-40 bg-white rounded-4 flex-center">
                                                    <a  onclick="clearFile('org')"><i class="icon-trash text-16"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="border-top-light mt-20 mb-20"></div>

                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10 bg-light-3 pl-10 py-5">3. Featured Video</div>

                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea name="video_description" id="video_description" rows="2">{{$listing->video_description}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Description</label>
                                    </div>
                                    <div>
                                        <p class="text-14 text-light-1">Video description should be less than 120
                                            characters.</p>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="youtube_url" id="youtube_url" value="{{$listing->youtube_url}}">
                                        <label class="lh-1 text-16 text-light-1">Youtube URL</label>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-input ">
                                        <textarea  rows="2" name="video_url" id="video_url" class="bg-light-2 pt-50 lh-14" readonly>{{$listing->video_description}}</textarea>
                                        <label class="lh-1 text-16 text-light-1">Target URL:</label>
                                    </div>
                                </div>

                            </div>



                        </div>


                    </div>

                </div>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-20">
            <div class="col-xl-10">

                <div class="row x-gap-20 y-gap-20">
                    <div class="col-12">
                        <div class="form-radio d-flex items-center ">
                            <div class="radio">
                                <input type="radio" name="status" value="1" wfd-id="id8" @if ($listing->status == '1') checked @endif>
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
                                <input type="radio" name="status" value="2" wfd-id="id8" @if ($listing->status == '2') checked @endif>
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="text-16 lh-1 ml-10 fw-600">Pause listing (De-activate)</div>
                        </div>
                        <div class="text-light-1">Note: To stop the payment, please visit the "Billing" page, and
                            cancel the subscription.</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row x-gap-20 y-gap-20 mt-10">
            <div class="col-12">
                <div class="d-flex items-center">
                    <button type="submit" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white"
                        title="Save and return to the dashboard">Save and Return</button>
                    {{-- <a href="#" class="button px-30 fw-400 text-14 bg-yellow-1 h-50 text-dark-1 ml-20"
                        title="Save and continue entering the data">Save and Continue</a> --}}
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>    
    const target_url = document.getElementById('target_url');
    
    const recomm_url = document.getElementById('recomm_url');
    const popular_url = document.getElementById('popular_url');
    const featured_url = document.getElementById('featured_url');
    const org_url = document.getElementById('org_url');
    const video_url = document.getElementById('video_url');
    
    // const radioUtm = document.getElementsByName('utm');

    target_url.addEventListener('input', function() {
        const selectedRadio = document.querySelector('input[name="utm"]:checked').value;

        if (selectedRadio == 2) {
            var url = target_url.value+"?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign="
            recomm_url.value = url+"recommended_listings";
            popular_url.value = url+"popular_listings";
            featured_url.value = url+"top_featured_listings";
            org_url.value = url+"top_organization";
            video_url.value = url+"featured_video";
        }else if(selectedRadio == 3){
            var url = target_url.value+"?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content=";
            recomm_url.value = url+"recommended_listings&utm_content=recommended_listings";
            popular_url.value = url+"popular_listings&utm_content=popular_listings";
            featured_url.value = url+"top_featured_listings&utm_content=top_featured_listings";
            org_url.value = url+"top_organization&utm_content=top_organization";
            video_url.value = url+"featured_video&utm_content=featured_video";

        }else{
            recomm_url.value = target_url.value;
            popular_url.value = target_url.value;
            featured_url.value = target_url.value;
            org_url.value = target_url.value;
            video_url.value = target_url.value;
        }
        const urlRegex = /^(http|https):\/\/[^ "]+$/;

        if (urlRegex.test(target_url.value)) {
            document.getElementById('error-success').textContent = 'Valid URL';
            document.getElementById('error-danger').textContent = '';
        }else{
            document.getElementById('error-success').textContent = '';
            document.getElementById('error-danger').textContent = 'Invalid URL';
        }
    });

    const utm1 = document.getElementById('utm1');
    const utm2 = document.getElementById('utm2');
    const utm3 = document.getElementById('utm3');

    utm1.addEventListener('click', function() {
        if (utm1.checked) {
            recomm_url.value = target_url.value;
            popular_url.value = target_url.value;
            featured_url.value = target_url.value;
            org_url.value = target_url.value;
            video_url.value = target_url.value;
        }
    });
    utm2.addEventListener('click', function() {
        var url = target_url.value+"?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign="
        if (utm2.checked) {
            recomm_url.value = url+"recommended_listings";
            popular_url.value = url+"popular_listings";
            featured_url.value = url+"top_featured_listings";
            org_url.value = url+"top_organization";
            video_url.value = url+"featured_video";
        }
    });
    utm3.addEventListener('click', function() {
        var url = target_url.value+"?utm_source=xploretefl.com&utm_medium=paid_referral&utm_campaign=basic_listings&utm_content="

        if (utm3.checked) {
            recomm_url.value = url+"recommended_listings&utm_content=recommended_listings";
            popular_url.value = url+"popular_listings&utm_content=popular_listings";
            featured_url.value = url+"top_featured_listings&utm_content=top_featured_listings";
            org_url.value = url+"top_organization&utm_content=top_organization";
            video_url.value = url+"featured_video&utm_content=featured_video";
        }
    });
    var _URL = window.URL || window.webkitURL;

    function readURL(input,type) {
        let noimage = "{{ asset('assets/images/dashboard/avatars/3.png') }}";
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#img-preview-"+type).attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $("#img-preview-"+type).attr("src", noimage);
        }
        // var file, img;

        // if ((file = input.files[0])) {
        //     img = new Image();
        //     img.onload = function() {
        //         $(".image-ok").text("Dimensions: "+ this.width + "x" + this.height +", Size: "+Math.round(input.files[0].size/1000)+" KB");
        //         if ((Math.round(input.files[0].size/1000))>3000) {
        //             $(".image-danger").text("Not valid image. Image should be less than 3 MB !");    
        //             document.getElementById('listing_image').value = '';
        //             $("#img-preview").attr("src", noimage);
        //         }else{

        //             $(".image-ok").text("Dimensions: "+ this.width + "x" + this.height +", Size: "+Math.round(input.files[0].size/1000)+" KB");
                    
        //         }
        //     };
        //     img.onerror = function() {
        //         alert( "not a valid file: " + file.type);
        //     };
        //     img.src = _URL.createObjectURL(file);
        // }
    }

    function clearFile(ofitem) {
       let noimage = "{{ asset('assets/images/dashboard/avatars/3.png') }}";
        var item = ofitem+'_image';
        $('#img-preview-'+ofitem).attr('src',noimage);
        $('#'+item).val('');
    }
    function sameAsAboveEvent(input){
        let noimage = "{{ asset('assets/images/dashboard/avatars/3.png') }}";

        const popular_title = document.getElementById('popular_title');
        // const popular_url = document.getElementById('popular_url');
        const popular_image = document.getElementById('img-preview-popular');

        const recomm_title = document.getElementById('recomm_title');
        // const recomm_url = document.getElementById('recomm_url');
        const recomm_image = document.getElementById('img-preview-recomm');
        if(input.checked){
           popular_title.value = recomm_title.value;
        //    popular_url.value = popular_url.value;
           popular_image.src = recomm_image.src;
        }else{
            popular_title.value = '';
            popular_image.src = noimage;
           
        }
    }
</script>
@endpush