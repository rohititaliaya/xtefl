@extends('admin.layouts.app')

@section('content')
<style>
    .accordion-header li{
        list-style-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAASUlEQVRIS2NkoDFgpLH5DMPfgv9oQQjzMS5xjBAnFESjFoymIniiwZlYRlMRLIzIDiKKy0JCcUBzC0aLCoJFBc2DiOaRPGoBAwALthgZJRWdqwAAAABJRU5ErkJggg==");
    }
    .accordion-item{
        margin-top:30px !important; 
        border-top: 1px solid #cacaca !important ; 
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Edit Contents</h1>

                        <form action="{{ route('admin.url.update', $url->id) }}">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label for="category_slug" class="form-label">Category</label>
                                <select name="category_slug" id="category_slug" class="form-control form-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}"
                                            @if ($category->slug == $url->category_slug) selected @endif>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subcat_slug" class="form-label">Sub Category</label>

                                <select name="subcat_slug" id="subcat_slug" class="form-control form-select">
                                    <option value="">Select</option>
                                    @php
                                        $m = \App\Models\Category::where('slug', $url->category_slug)->first();
                                    @endphp
                                    @foreach ($subcategories as $subcat)
                                        @if ($m->id == $subcat->category_id)
                                            <option value="{{ $subcat->slug }}"
                                                @if ($url->subcat_slug == $subcat->slug) selected @endif>
                                                {{ $subcat->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <p class="text-danger" id="subcategory_error"></p>
                                @error('subcat_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="country_slug" class="form-label">Country</label>
                                <select name="country_slug" id="country_slug" class="form-control form-select">
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->slug }}"
                                            @if ($country->slug == $url->country_slug) selected @endif>{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('country_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="city_slug" class="form-label">City</label>
                                <select name="city_slug" id="city_slug" class="form-control form-select">
                                    <option value="">Select</option>
                                    @php
                                        $c = \App\Models\Country::where('slug', $url->country_slug)->first();
                                    @endphp
                                    @foreach ($cities as $city)
                                        @if ($c->id == $city->country_id)
                                            <option value="{{ $city->slug }}"
                                                @if ($url->city_slug == $city->slug) selected @endif>
                                                {{ $city->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <p class="text-danger" id="city_error"></p>
                                @error('city_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="timing_slug" class="form-label">Timing</label>
                                <select name="timing_slug" id="timing_slug" class="form-control form-select">
                                    <option value="">Select</option>
                                    @php
                                        $t = \App\Models\Category::where('slug', $url->category_slug)->first();
                                    @endphp
                                    @foreach ($timings as $timing)
                                        @if ($t->id == $timing->category_id)
                                            <option value="{{ $timing->slug }}"
                                                @if ($url->timing_slug == $timing->slug) selected @endif>
                                                {{ $timing->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <p class="text-danger" id="timing_error"></p>
                                @error('timing_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row ps-5">
                                <label for="sections">Sections</label>
                                {{-- <div class="accordion" id="accordionPanelsStayOpenExample"> --}}
                                    <ul id="sortable">
                                        @foreach ($content as $item)
                                            
                                        <div class="accordion-item" id="{{ $item->order }}">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <li>
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseOne">
                                                <b>
                                                    {{$item->order}} - {{$item->title}}
                                                </b>
                                                </button>
                                            </li>
                                            </h2>
                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
                                                    {!!$item->content!!}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        {{-- <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                <li>

                                                    <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                    Accordion Item #2
                                                </button>
                                            </li>
                                            </h2>
                                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="panelsStayOpen-headingTwo">
                                                <div class="accordion-body">
                                                    <strong>This is the second item's accordion body.</strong> It is hidden
                                                    by default, until the collapse plugin adds the appropriate classes that
                                                    we use to style each element. These classes control the overall
                                                    appearance, as well as the showing and hiding via CSS transitions. You
                                                    can modify any of this with custom CSS or overriding our default
                                                    variables. It's also worth noting that just about any HTML can go within
                                                    the <code>.accordion-body</code>, though the transition does limit
                                                    overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                <li>

                                                    <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                    Accordion Item #3
                                                </button>
                                            </li>
                                            </h2>
                                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="panelsStayOpen-headingThree">
                                                <div class="accordion-body">
                                                    <strong>This is the third item's accordion body.</strong> It is hidden
                                                    by default, until the collapse plugin adds the appropriate classes that
                                                    we use to style each element. These classes control the overall
                                                    appearance, as well as the showing and hiding via CSS transitions. You
                                                    can modify any of this with custom CSS or overriding our default
                                                    variables. It's also worth noting that just about any HTML can go within
                                                    the <code>.accordion-body</code>, though the transition does limit
                                                    overflow.
                                                </div>
                                            </div>
                                        </div> --}}
                                    </ul>
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script>
        $(function() {
            $("#sortable").sortable({
                axis: 'y',
                update: function(event, ui) {
                    var data = $(this).sortable('toArray');
                    console.log(data);
                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data:{
                            _token: "{{ csrf_token() }}",
                            oarray : data
                        },
                        type: 'POST',
                        url: '{{url("/admin/url/$url->id/updateorder")}}',
                        success: function(res){
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
