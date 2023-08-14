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
    </section>
@endsection
