<div class="container">

    @if ($type == 'featured')
        <div class="row">
            @foreach ($featured as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card">
                        @php
                            $image = asset('/uploads/default.jpg');
                            if (!is_null($item->promoted_img)) {
                                $image = asset('/uploads/' . $item->promoted_img);
                            }
                        @endphp
                        {{-- {{asset('/uploads/'.$item->promoted_img)}} --}}

                        <img src="{{ $image }}" class="card-img-top" alt="{{ $item->promoted_title }}">

                        <div class="card-body">
                            <a href="{{ $item->listing_url }}">
                                <h5 class="card-title">{{ $item->promoted_title }}</h5>
                            </a>
                            <p class="card-text">{{ $item->promoted_desc }}</p>
                            <p>Provider: {{ $item->provider->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    @endif

    @if ($type == 'featured_banner')
        <div class="row">
            @foreach ($featured_banner as $item)
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="card">
                        @php
                            $image = asset('/uploads/default.jpg');
                            if (!is_null($item->promoted_img)) {
                                $image = asset('/uploads/' . $item->promoted_img);
                            }
                        @endphp
                        {{-- {{asset('/uploads/'.$item->promoted_img)}} --}}

                        <img src="{{ $image }}" class="card-img-top" alt="{{ $item->promoted_title }}">

                        <div class="card-body">
                            <a href="{{ $item->listing_url }}">
                                <h5 class="card-title">{{ $item->promoted_title }}</h5>
                            </a>
                            <p class="card-text">{{ $item->promoted_desc }}</p>
                            <p>Provider: {{ $item->provider->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    @endif

    @if ($type == 'video')
        <div class="row">
            @foreach ($video as $item)
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$item->video}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <div class="card-body">
                            <a href="{{ $item->listing_url }}">
                                <h5 class="card-title">{{ $item->promoted_title }}</h5>
                            </a>
                            <p class="card-text">{{ $item->promoted_desc }}</p>
                            <p>Provider: {{ $item->provider->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    @endif

    @if ($type == 'basic')
        <div class="row">
            @foreach ($basic as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card">
                        @php
                            $image = asset('/uploads/default.jpg');
                            if (!is_null($item->image)) {
                                $image = asset('/uploads/' . $item->image);
                            }
                        @endphp
                        {{-- {{asset('/uploads/'.$item->promoted_img)}} --}}

                        <img src="{{ $image }}" class="card-img-top" alt="{{ $item->title }}">

                        <div class="card-body">
                            <a href="{{ $item->listing_url }}">
                                <h5 class="card-title">{{ $item->title }}</h5>

                            </a>
                            <p>Provider: {{ $item->provider->name }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
