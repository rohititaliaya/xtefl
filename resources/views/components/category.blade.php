<div class="container">
   
    @if ($type == '1')
        <div class="row">
            @foreach ($categories as $cat)
            <div class="col-lg-3 col-md-6 col-12">
                    <div class="card">
                        @php
                            $image = asset('/imgcategory/default.jpg');
                        if (file_exists( asset('/imgcategory/'.$cat->slug.'.jpg'))) {
                            $image = asset('/imgcategory/'.$cat->slug.'.jpg');
                        }
                        @endphp
                        
                            <img src="{{$image}}" class="card-img-top" alt="{{$cat->name}}">

                        <div class="card-body">
                            <a href="/{{ $cat->slug }}">
                                <h5 class="card-title">{{ $cat->name }}</h5>
                            </a>
                            <p class="card-text">{{ $cat->short_desc }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    @endif

    @if ($type == '2')
    <div class="row">
        <div class="col-12">
            <ul>
                 @foreach ($categories as $cat)
                
                <li class="nav-link">
                    <a href="/{{ $cat->slug }}">
                    {{$cat->name}}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    @endif

    @if ($type == '3')
    <div class="row">
        <div class="col-12">
            <ul class="category3 d-flex">
                @foreach ($categories as $cat)
                    <li>
                    <a href="/{{ $cat->slug }}">{{$cat->name}}</a>
                    </li>
                @endforeach
            </ul>
            
        </div>
    </div>
    @endif
</div>
