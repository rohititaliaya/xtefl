
 
            @foreach ($listing as $item)
                
                    <div class="card mt-2">
                        <img src="{{ $item->promoted_img }}" class="card-img-top" alt="{{ $item->promoted_title }}">

                        <div class="card-body">
                            <a href="{{route('listingcount')}}?url={{ $item->listing_url }}&listing={{$item->id}}">
                                <h5 class="card-title">{{ $item->promoted_title }}</h5>
                            </a>
                            <p class="card-text">{{ $item->promoted_desc }}</p>
                            <p>Provider: {{ $item->provider->name }}</p>
                        </div>
                    </div>
            
            @endforeach
    

                    


