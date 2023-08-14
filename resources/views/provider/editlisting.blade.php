@extends('provider.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="mb-2">
                <a href="{{route('provider.dashboard')}}" class="btn btn-primary float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg> Go Back
                </a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-bg-light">
                        <h2>{{ __('Edit a Listing') }}</h2>
                    </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="my-3 alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('provider.update', $listing->id) }}" method="post"
                            enctype="multipart/form-data" class="listingform">
                            @csrf
                            @method('POST')
                            {{-- @dd(old('basic_category')) --}}
                            <!-- title -->
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text-success">Basic Listing</h3>
                                </div>
                               
                                <div class="col-12 col-lg-9">
                                    <label for="title">Listing Title:</label><br>
                                    <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                        Do not add too many punctuations or exclamations.</span>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ $listing->title }}">
                                    <p>Characters: <span id="counts">0/75</span></p>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <label for="image">Listing Image:</label><br>
                                    <span class="infotxt">File size should be less than 2MB.<br>
                                        Approximate dimensions: 800px W - 500px H</span>
                                    <input type="file" name="image" id="image" class="form-control"
                                        onchange="readURL(this)">
                                    <p class="image-danger text-danger"></p>
                                    <p class="image-ok"></p>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-3">
                                    <img id="img-preview" src="{{ asset('/uploads/' . $listing->image) }}"
                                        style="width:100px;" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <label for="listing-url">Listing URL:</label><br>
                                    <span class="infotxt">Start typing the domain name, with 'http' or 'https'.</span>
                                    <input type="text" class="form-control" name="listing_url"
                                        value="{{ $listing->listing_url }}">
                                    @error('listing_url')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text-danger">Featured Listing</h3>
                                    <p class="text-primary">Provide details if you've subscribed to 'Featured Plan ($50)'.
                                        This plan will showcase the 'Featured Title', and 'Featured Image' on the top of all
                                        web pages for maximum CTR.</p>
                                </div>
                                
                                <div class="col-12 col-lg-9">
                                    <label for="promoted_title">Featured Listing Title:</label><br>
                                    <div>
                                        <input type="checkbox" name="same_title" id="same_title" class="form-contol me-1"
                                            onchange="sametitle(this)">
                                        <label for="same_title">Use same title as Basic</label>
                                    </div>
                                    <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                        Do not add too many punctuations or exclamations.
                                    </span>
                                    <input type="text" name="promoted_title" id="promoted_title"
                                        value="{{ $listing->promoted_title }}" class="form-control">
                                    <p>Characters: <span id="ptitle_counts">0/75</span></p>
                                    @error('promoted_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-9">
                                    <label for="promoted_desc">Featured Listing Description:</label><br>
                                    <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                        Do not add too many punctuations or exclamations.
                                    </span>
                                    <textarea name="promoted_desc" id="promoted_desc" class="form-control" rows="2">{{ $listing->promoted_desc }}</textarea>
                                    <p>Characters: <span id="pdesc_counts">0/150</span></p>
                                    @error('promoted_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <label for="promoted_image">Featured Listing Image:</label><br>
                                    <span class="infotxt">File size should be less than 3MB.<br>
                                        Approximate dimensions: 2600px W - 1500px H</span>
                                    <input type="file" name="promoted_image" class="form-control"
                                        onchange="freadURL(this)">
                                    <p class="fimage-danger"></p>
                                    <p class="fimage-ok"></p>
                                    @error('promoted_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-3">
                                    <img id="fimg-preview" src="{{ asset('uploads/' . $listing->promoted_img) }}"
                                        style="width:100px;" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <label for="video_url">Youtube Video URL ID:</label><br>
                                    <span class="infotxt">Copy only the video ID. <br>
                                        Ex: <span class="text-dark">ABC123EFG</span> from the URL
                                        https://www.youtube.com/watch?v=<span class="text-dark">ABC123EFG</span></span>
                                    <div class="input-group">
                                        <span class="input-group-text">https://www.youtube.com/watch?v=</span>

                                        <input type="text" name="video_url" class="form-control"
                                            value="{{ $listing->video }}">
                                    </div>
                                    @error('video_url')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <label for="video_title">Video Title:</label><br>
                                    <input type="text" name="video_title" id="video_title" class="form-control"
                                        value="{{ $listing->video_title }}">
                                    <p>Characters: <span id="vtitle_counts">0/75</span></p>
                                    @error('video_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-3">
                                    <button class="btn btn-primary mt-4">Update Listing</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#bfocus_category').select2();
            $('#pfocus_category').select2();

            $('#title').on('keyup', function() {
                $('#counts').text($(this).val().length + '/75');

            });
            $('#promoted_desc').on('keyup', function() {
                $('#pdesc_counts').text($(this).val().length + '/150');

            });
            $('#promoted_title').on('keyup', function() {
                $('#ptitle_counts').text($(this).val().length + '/75');

            });
            $('#video_title').on('keyup', function() {
                $('#vtitle_counts').text($(this).val().length + '/75');

            });
        });

        //Change this to your no-image file
        let noimage =
            "https://dummyimage.com/100x100/adadad/000000&text=no+image";
        var _URL = window.URL || window.webkitURL;

        function readURL(input) {



            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#img-preview").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $("#img-preview").attr("src", noimage);
            }
            var file, img;

            if ((file = input.files[0])) {
                img = new Image();
                img.onload = function() {
                    $(".image-ok").text("Dimensions: " + this.width + "x" + this.height + ", Size: " + Math.round(input
                        .files[0].size / 1000) + " KB");
                };
                img.onerror = function() {
                    alert("not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }

        function freadURL(input) {
            //   console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#fimg-preview").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $("#fimg-preview").attr("src", noimage);
            }

            var file, img;

            if ((file = input.files[0])) {
                img = new Image();
                img.onload = function() {
                    $(".fimage-ok").text("Dimensions: " + this.width + "x" + this.height + ", Size: " + Math.round(input
                        .files[0].size / 1000) + " KB");
                };
                img.onerror = function() {
                    alert("not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }

        function sametitle(input) {
            if (input.checked) {
                $("#promoted_title").val($('#title').val());
            } else {
                $("#promoted_title").val('');

            }
        }

        function calculateEndDate(input){
            var months = parseInt(input.value);
            var startdate = $('#startdate').val();
            var sdate = new Date(startdate);
            var enddate = addMonths(sdate,months);
            document.getElementById("enddate").valueAsDate = enddate;
        }

        function addMonths(date, months) {
            var newDate = new Date(date);
            var total = newDate.getMonth() + months;
            newDate.setMonth(total);
            return newDate;
        }

    </script>
@endsection