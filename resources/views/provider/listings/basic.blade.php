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
                                <h3 class="text-primary">Add/Edit Listing</h3>
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
                            <div class="mt-3">
                                <label for="org_description">Description:</label><br>
                                <span class="infotxt">Do not use all CAPS, unless it is a proper noun.<br>
                                    Do not add too many punctuations or exclamations.</span>
                                <textarea name="basic_description" id="basic_description" class="form-control">{{($basic)?$basic->description:old('org_description')}}</textarea>
                                <p>Characters: <span id="counts">0/75</span></p>
                                @error('org_description')
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
                    {{-- <embed src="{{route()}}" type=""> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
