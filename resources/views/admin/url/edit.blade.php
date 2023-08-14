@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Edit Contents</h1>
                        @if (Session::has('success'))
                            <div class="my-3 alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('warning'))
                            <div class="my-3 alert alert-warning">
                                {{ Session::get('warning') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="my-3 alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.url.update', $url->id) }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                @php
                                if ($url->category_slug) {
                                    $c = \App\Models\Category::where('slug', $url->category_slug)->first();
                                }
                                @endphp
                                <label for="category_slug" class="form-label fw-bold">Category:</label> @isset($c)
                                    {{$c->name}}
                                @endisset
                                <select name="category_slug" id="category_slug" class="form-control filterurl form-select" hidden>
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
                                <label for="subcat_slug" class="form-label fw-bold">Sub Category:</label> 
                                @if($url->subcat_slug)
                                @php
                                    $m = \App\Models\Subcategory::where('slug', $url->subcat_slug)->first();
                                @endphp
                                    {{$m->name}}
                                @endif

                                <select name="subcat_slug" id="subcat_slug" class="form-control filterurl form-select" hidden >
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
                                <label for="country_slug" class="form-label fw-bold">Country:</label> 
                                @if($url->country_slug)
                                @php
                                    $m = \App\Models\Country::where('slug', $url->country_slug)->first();
                                @endphp
                                    {{$m->name}}
                                @endif
                                <select name="country_slug" id="country_slug" class="form-control filterurl form-select" hidden>
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
                                <label for="city_slug" class="form-label fw-bold">City:</label> 
                                @if($url->city_slug)
                                @php
                                    $m = \App\Models\City::where('slug', $url->city_slug)->first();
                                @endphp
                                    {{$m->name}}
                                @endif
                                <select name="city_slug" id="city_slug" class="form-control filterurl form-select" hidden>
                                    <option value="">Select</option>
                                    @php
                                        $c = \App\Models\Country::where('slug', $url->country_slug)->first();
                                    @endphp
                                    @foreach ($cities as $city)
                                        @if ($c)
                                            @if ($c->id == $city->country_id)
                                                <option value="{{ $city->slug }}"
                                                    @if ($url->city_slug == $city->slug) selected @endif>
                                                    {{ $city->name }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                <p class="text-danger" id="city_error"></p>
                                @error('city_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="timing_slug" class="form-label fw-bold">Timing:</label> 
                                @if($url->timing_slug)
                                @php
                                    $m = \App\Models\Timing::where('slug', $url->timing_slug)->first();
                                @endphp
                                    {{$m->name}}
                                @endif
                                <select name="timing_slug" id="timing_slug" class="form-control filterurl form-select" hidden>
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

                            <div class="mt-3">
                                <label for="title">Title</label>
                                
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $url->title }}">
                            </div>

                            <div class="mt-3">
                                <label for="body">Content Body:</label>
                                <textarea name="body" id="editor" cols="30" rows="50">{{ $url->body }}</textarea>
                            </div>
                            @php
                                $meta = json_decode($url->meta);
                            @endphp
                            <div class="mt-3">
                                <label for="meta-title">Meta title</label>
                                <input type="text" name="meta[title]" id="meta-title" class="form-control"
                                    value="{{ $meta->title }}">
                            </div>

                            <div class="mt-3">
                                <label for="meta-description">Meta description</label>
                                <textarea name="meta[description]" id="meta-description" cols="30" rows="3" class="form-control">{{ $meta->description }}</textarea>
                            </div>
                            {{-- <div class="sections m-3">

                                @if (count($sections) != 0)
                                    <h3 class="mt-5 pt-4 border-top">Add/Edit Sections</h3>
                                    {{-- @if (count($sections) == 0)
                                        This Category have no sections.
                                    @endif 
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($sections as $section)
                                        @php
                                            $count++;
                                        @endphp
                                        <div
                                            class="bg-light rounded-3 border-bottom border-3 border-primary p-3 mb-3 portion">
                                            <div class="mt-3">
                                                <label for="order" class="form-label">Order</label>
                                                <input type="number" name="sections[{{ $count }}][order]"
                                                    id="order" class="form-control " value="{{ $section->order }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="sections[{{ $count }}][title]"
                                                    id="title" class="form-control " value="{{ $section->title }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="editor" class="form-label">Content</label>
                                                <textarea name="sections[{{ $count }}][content]" id="editor" cols="30" rows="10">{{ $section->content }}</textarea>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    {{-- <div class="bg-light rounded-3 border-bottom p-3 portion">
                                        <div class="mt-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="sections[1][title]" id="title"
                                                class="form-control">
                                        </div>
                                        <div class="mt-3">
                                            <label for="editor" class="form-label">Content</label>
                                            <textarea name="sections[1][content]" id="editor" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="order" class="form-label">Order</label>
                                            <input type="number" name="sections[1][order]" id="order"
                                                class="form-control" value="1">
                                        </div>
                                    </div> 
                                @endif
                            </div>
                            <div class="row d-flex justify-content-start">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-warning" id="addsection">Add New
                                        Section</button>
                                </div>
                            </div> --}}
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            plugins: ['code', 'image', 'link'],
            //    toolbar:'code' 
        });
    </script>

    <script>
        $(document).ready(function() {
            // $('#addsection').on('click', function() {
            //     var count = $('.sections .portion').length + 1;
            //     // console.log(count);
            //     var string = '<div class="bg-light rounded-3 border-bottom  mt-3 p-3 portion">\
            //                                         <div class="mt-3">\
            //                                             <label for="order" class="form-label">Order</label>\
            //                                             <input type="number" name="sections[' + count +
            //         '][order]" id="order" class="form-control " value="' + count + '">\
            //                                         </div>\
            //                                         <div class="mt-3">\
            //                                             <label for="title" class="form-label">Title</label>\
            //                                             <input type="text" name="sections[' + count + '][title]" id="title" class="form-control ">\
            //                                         </div>\
            //                                         <div class="mt-3">\
            //                                             <label for="editor" class="form-label">Content</label>\
            //                                             <textarea name="sections[' + count + '][content]" id="editor' +
            //         count + '" cols="30" rows="10"></textarea>\
            //                                         </div>\
            //                                     </div>';
            //     $('.sections').append(string);

            //     tinymce.init({
            //         selector: 'textarea#editor' + count,
            //         plugins: ['code', 'image', 'link'],
            //         //    toolbar:'code' 
            //     });
            // });

            $('#title').on('keyup', function() {
                $('#meta-title').val($(this).val());
            });

            $('#category_slug').on('change', function() {
                var slug = $(this).val();
                var string = '<option value="">Select</option>';
                $('#subcat_slug').html(string);
                $('#timing_slug').html(string);


                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.getsubcategory') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'category_slug': slug
                    },
                    dataType: 'json',
                    error: function(Err) {

                    },
                    success: function(result) {
                        if (result.flag == true) {
                            // var string = '<option value="">Select</option>';
                            result.data.subcategories.forEach(element => {
                                string += '<option value="' + element.slug + '">' +
                                    element.name + '</option>';
                            });
                            $('#subcat_slug').html(string);
                            $('#subcategory_error').text('');

                            var string1 = '<option value="">Select</option>';
                            result.data.timings.forEach(element => {
                                string1 += '<option value="' + element.slug + '">' +
                                    element.name + '</option>';
                            });
                            $('#timing_slug').html(string1);
                            $('#timing_error').text('');
                        } else {
                            $('#subcategory_error').text('No Subcategory found !');
                        }
                    }
                });
            });

            $('#country_slug').on('change', function() {
                var slug = $(this).val();
                var string = '<option value="">Select</option>';
                $('#city_slug').html(string);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.getcity') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'country_slug': slug
                    },
                    dataType: 'json',
                    error: function(Err) {

                    },
                    success: function(result) {
                        if (result.flag == true) {
                            var string = '<option value="">Select</option>';
                            result.data.forEach(element => {
                                string += '<option value="' + element.slug + '">' +
                                    element.name + '</option>';
                            });
                            $('#city_slug').html(string);
                            $('#city_error').text('');
                        } else {
                            $('#city_error').text('No city found !');
                        }
                    }
                });
            });

            $(".filterurl").on('change', function() {


                var urlarray = [
                    $('#category_slug').val(),
                    $('#subcat_slug').val(),
                    $('#country_slug').val(),
                    $('#city_slug').val(),
                    $('#timing_slug').val()
                ];
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.url.find') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: urlarray
                    },
                    dataType: 'json',
                    error: function(Err) {

                    },
                    success: function(result) {
                        if (result.flag == true) {
                            console.log(result);
                            window.location = "/admin/url/" + result.data.id + "/edit";
                        }
                    }
                });
            });
        });
    </script>
@endsection
