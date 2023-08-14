@extends('provider.layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12 mb-2">
                <a href="{{ route('provider.dashboard') }}" class="btn btn-primary float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg> Go Back
                </a>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="">
                        <h2>{{ __('Add a Listing') }}</h2>
                    </div>

                    <div class="">
                        @if (Session::has('success'))
                            <div class="my-3 alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('provider.addlisting') }}" method="post" enctype="multipart/form-data"
                            class="listingform">
                            @csrf
                            @method('POST')
                            <!-- title -->
                            <div class="row gx-5">
                                <div class="col-md-6 card">
                                    <div class="card-header">
                                        <h3 class="text-primary">Basic Listing (Recommanded , POPULER)</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="title">Title:</label><br>
                                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                                    Do not add too many punctuations or exclamations.</span>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ old('title') }}">
                                                <p>Characters: <span id="counts">0/75</span></p>
                                                @error('title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="image">Image:</label><br>
                                                <span class="infotxt">File size should be less than 2MB.<br>
                                                    Approximate dimensions: 800px W - 500px H</span>
                                                <input type="file" name="image" id="listing_image" class="form-control"
                                                    onchange="readURL(this)">
                                                <p class="image-danger text-danger"></p>
                                                <p class="image-ok"></p>
                                                @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-lg-3">
                                                <img id="img-preview"
                                                    src="https://dummyimage.com/100x100/adadad/000000&text=no+image"
                                                    style="width:100px;" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="listing-url">URL:</label><br>
                                                <span class="infotxt">Start typing the domain name, with 'http' or
                                                    'https'.</span>
                                                <input type="text" class="form-control" name="listing_url"
                                                    value="{{ old('listing_url') }}">
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="listing-url">Tag:</label><br>
                                                <input type="radio" class="" name="tag" id="top-rated"
                                                    value="TOP RATED">
                                                <label for="top-rated">TOP RATED</label>
                                                <br>
                                                <input type="radio" class="" name="tag" id="FEATURED"
                                                    value="FEATURED">
                                                <label for="FEATURED">FEATURED</label>
                                                <br>
                                                <input type="radio" class="" name="tag" id="POPULER"
                                                    value="POPULER">
                                                <label for="POPULER">POPULER</label>
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 card">
                                    <div class="card-header">
                                        <h3 class="text-primary">Featured(Header)</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-12 col-lg-9">
                                                <label for="title">Title:</label><br>
                                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                                    Do not add too many punctuations or exclamations.</span>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ old('title') }}">
                                                <p>Characters: <span id="counts">0/75</span></p>
                                                @error('title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                                                                <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="image">Image:</label><br>
                                                <span class="infotxt">File size should be less than 2MB.<br>
                                                    Approximate dimensions: 800px W - 500px H</span>
                                                <input type="file" name="image" id="listing_image" class="form-control"
                                                    onchange="readURL(this)">
                                                <p class="image-danger text-danger"></p>
                                                <p class="image-ok"></p>
                                                @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-lg-3">
                                                <img id="img-preview"
                                                    src="https://dummyimage.com/100x100/adadad/000000&text=no+image"
                                                    style="width:100px;" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="listing-url">URL:</label><br>
                                                <span class="infotxt">Start typing the domain name, with 'http' or
                                                    'https'.</span>
                                                <input type="text" class="form-control" name="listing_url"
                                                    value="{{ old('listing_url') }}">
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="listing-url">Tag:</label><br>
                                                <input type="radio" class="" name="tag" id="top-rated"
                                                    value="TOP RATED">
                                                <label for="top-rated">TOP RATED</label>
                                                <br>
                                                <input type="radio" class="" name="tag" id="FEATURED"
                                                    value="FEATURED">
                                                <label for="FEATURED">FEATURED</label>
                                                <br>
                                                <input type="radio" class="" name="tag" id="POPULER"
                                                    value="POPULER">
                                                <label for="POPULER">POPULER</label>
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 card">
                                    <div class="card-header">
                                        <h3 class="text-primary">Video</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-12 col-lg-9">
                                                <label for="title">Title:</label><br>
                                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                                    Do not add too many punctuations or exclamations.</span>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ old('title') }}">
                                                <p>Characters: <span id="counts">0/75</span></p>
                                                @error('title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
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
                                                        value="{{ old('video_url') }}">
                                                </div>
                                                @error('video_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="listing-url">URL:</label><br>
                                                <span class="infotxt">Start typing the domain name, with 'http' or
                                                    'https'.</span>
                                                <input type="text" class="form-control" name="listing_url"
                                                    value="{{ old('listing_url') }}">
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 card">
                                    <div class="card-header">
                                        <h3 class="text-primary">Organization</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-12 col-lg-9">
                                                <label for="title">Title:</label><br>
                                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                                    Do not add too many punctuations or exclamations.</span>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ old('title') }}">
                                                <p>Characters: <span id="counts">0/75</span></p>
                                                @error('title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                                                                <div class="row">

                                            <div class="col-12 col-lg-9">
                                                <label for="description">Description:</label><br>
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                                @error('description')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="image">Image:</label><br>
                                                <span class="infotxt">File size should be less than 2MB.<br>
                                                    Approximate dimensions: 800px W - 500px H</span>
                                                <input type="file" name="image" id="listing_image" class="form-control"
                                                    onchange="readURL(this)">
                                                <p class="image-danger text-danger"></p>
                                                <p class="image-ok"></p>
                                                @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-lg-3">
                                                <img id="img-preview"
                                                    src="https://dummyimage.com/100x100/adadad/000000&text=no+image"
                                                    style="width:100px;" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <label for="listing-url">URL:</label><br>
                                                <span class="infotxt">Start typing the domain name, with 'http' or
                                                    'https'.</span>
                                                <input type="text" class="form-control" name="listing_url"
                                                    value="{{ old('listing_url') }}">
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-12 col-lg-9">
                                                <label for="listing-url">Tag:</label><br>
                                                <input type="radio" class="" name="tag" id="top-rated"
                                                    value="TOP RATED">
                                                <label for="top-rated">TOP RATED</label>
                                                <br>
                                                <input type="radio" class="" name="tag" id="FEATURED"
                                                    value="FEATURED">
                                                <label for="FEATURED">FEATURED</label>
                                                <br>
                                                <input type="radio" class="" name="tag" id="POPULER"
                                                    value="POPULER">
                                                <label for="POPULER">POPULER</label>
                                                @error('listing_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col-3">
                                    <button class="btn btn-primary mt-4">Add Listing</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#bfocus_category').select2({
                theme: 'classic'
            });
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

        var _URL = window.URL || window.webkitURL;
        // basic image 
        function readURL(input) {
            let noimage = "https://dummyimage.com/100x100/adadad/000000&text=no+image";
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
                    if ((Math.round(input.files[0].size / 1000)) > 3000) {
                        $(".image-danger").text("Not valid image. Image should be less than 3 MB !");
                        document.getElementById('listing_image').value = '';
                        $("#img-preview").attr("src", noimage);
                    } else {

                        $(".image-ok").text("Dimensions: " + this.width + "x" + this.height + ", Size: " + Math.round(
                            input.files[0].size / 1000) + " KB");

                    }
                };
                img.onerror = function() {
                    alert("not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }
        // featured image 

        function freadURL(input) {
            let noimage = "https://dummyimage.com/100x100/adadad/000000&text=no+image";
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
                    if ((Math.round(input.files[0].size / 1000)) > 3000) {
                        $(".fimage-danger").text("Not valid image. Image should be less than 3 MB !");
                        document.getElementById('promoted_image').value = '';
                        $("#fimg-preview").attr("src", noimage);
                    } else {

                        $(".fimage-ok").text("Dimensions: " + this.width + "x" + this.height + ", Size: " + Math.round(
                            input.files[0].size / 1000) + " KB");

                    }
                };
                img.onerror = function() {
                    alert("not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }
        // featured banner image 

        function fbannerreadURL(input) {
            let noimage = "https://dummyimage.com/100x100/adadad/000000&text=no+image";
            //   console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#fb-preview").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $("#fb-preview").attr("src", noimage);
            }

            var file, img;

            if ((file = input.files[0])) {
                img = new Image();
                img.onload = function() {
                    if ((Math.round(input.files[0].size / 1000)) > 3000) {
                        $(".fb-error").text("Not valid image. Image should be less than 3 MB !");
                        document.getElementById('promoted_banner').value = '';
                        $("#fb-preview").attr("src", noimage);
                    } else {

                        $(".fb-ok").text("Dimensions: " + this.width + "x" + this.height + ", Size: " + Math.round(input
                            .files[0].size / 1000) + " KB");

                    }
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
    </script>
@endpush
