@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Create/Edit Country Section</h1>
                        @if (Session::has('success'))
                            <div class="my-3 alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="my-3 alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif


                        <div class="ourform">
                            <form action="{{ route('admin.countrysection.store') }}" method="post">
                                @csrf
                                @method('POST')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control form-select"
                                        @if ($category_id ?? '') disabled @endif>
                                        <option value="">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category_id == $category->id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($category_id ?? '')
                                        <select name="category_id" id="category_id" class="form-control form-select" hidden>
                                            <option value="">-----Select-----</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category_id == $category->id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- country -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-control form-select"
                                        @if ($country_id ?? '') disabled @endif>
                                        <!-- so if we click edit for sections
                                            we'll have to disable as it corresponds to that
                                            particular country -->

                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                @if ($country_id == $country->id) selected @endif>{{ $country->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <!-- since the above disabled field is not detected during edit
                                        we've taken another field as hidden -->
                                    @if ($country_id ?? '')
                                        <select name="country_id" id="country_id" class="form-control form-select" hidden>
                                            <option value="">Select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($country_id == $country->id) selected @endif>{{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sections m-3">
                                    Sections
                                    
                                    @if (count($sections) != 0)
                                        {{-- @if (count($sections) == 0)
                                            This Category have no sections.
                                        @endif --}}
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($sections as $section)
                                            @php
                                                $count++;
                                            @endphp
                                            <div class="bg-light rounded-3 border-bottom p-3 mb-3 portion">
                                                <div class="mt-3">
                                                    <label for="order" class="form-label">Order</label>
                                                    <input type="number" name="sections[{{ $count }}][order]"
                                                        id="order" class="form-control" value="{{ $section->country_order }}" required>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" name="sections[{{ $count }}][title]"
                                                        id="title" class="form-control" value="{{ $section->country_title }}" required> 
                                                </div>
                                                <div class="mt-3">
                                                    <label for="editor" class="form-label">Content</label>
                                                    <textarea name="sections[{{ $count }}][content]" id="editor" cols="30" rows="10" required>{{ $section->country_content }}</textarea>
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
                                        </div> --}}
                                    @endif
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-warning" id="addsection">Add New
                                            Section</button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary my-3">Create Country Sections</button>

                            </form>

                        </div>


                    </div>
                </div>

            </div>
        </div>

    </div>
    <script src="{{ asset('/js/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            plugins: ['code', 'image','link'],
            //    toolbar:'code' 
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#addsection').on('click', function() {
                var count = $('.sections .portion').length + 1;
                // console.log(count);
                var string = '<div class="bg-light rounded-3 border-bottom  mt-3 p-3 portion">\
                                                <div class="mt-3">\
                                                    <label for="order" class="form-label">Order</label>\
                                                    <input type="number" name="sections[' + count +
                            '][order]" id="order" class="form-control" value="' + count + '" required>\
                                                </div>\
                                                <div class="mt-3">\
                                                    <label for="title" class="form-label">Title</label>\
                                                    <input type="text" name="sections[' + count + '][title]" id="title" class="form-control" required>\
                                                </div>\
                                                <div class="mt-3">\
                                                    <label for="editor" class="form-label">Content</label>\
                                                    <textarea name="sections[' + count + '][content]" id="editor' + count + '" cols="30" rows="10"></textarea>\
                                                </div>\
                                            </div>';
                $('.sections').append(string);

                tinymce.init({
                    selector: 'textarea#editor' + count,
                    plugins: ['code', 'image','link'],
                    //    toolbar:'code' 
                });
            });

            $('#country_id').on('change', function(){
                var id = $(this).val();
                var catid = $('#category_id').val();
                window.location.href = '/admin/country/section/'+catid+'/edit/'+id;
            //     // $.ajax({
            //     //     type: 'POST',
            //     //     url: "{{ route('admin.getsection') }}",
            //     //     data: {
            //     //         "_token": "{{ csrf_token() }}",
            //     //         'category_id': id
            //     //     },
            //     //     dataType: 'json',
            //     //     error: function(Err) {

            //     //     },
            //     //     success: function(result) {
            //     //         if (result.status == true) {
            //     //             console.log(result);
            //     //         }else{
            //     //             console.log(result);
            //     //         }
            //     //     }
            //     // });
            });
        });
    </script>
@endsection
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script> --}}
