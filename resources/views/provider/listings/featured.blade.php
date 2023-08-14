@extends('provider.layouts.app')

@section('content')

    <section>
        <div class="container-fluid my-2">
            @if (Session::has('success'))
                <div class="my-3 alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </section>
    <section>
        <div class="container-fluid my-2">
            <div class="row g-3">
                
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
                
            </div>
        </div>
    </section>
@endsection
