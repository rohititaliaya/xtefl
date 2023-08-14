@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Create/Edit Program Content</h1>
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
                            <form action="{{ route('admin.programcontent.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="category_id" class="form-label"> Category </label>
                                    <select name="category_id" id="category_id" class="form-control form-select"
                                        @if ($pcategory ?? '') disabled @endif>
                                        <option value="">Select</option>
                                        @if ($pcategory ?? '')
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($pcategory->category_id == $item->id) selected @endif>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($pcategory ?? '')
                                        <select name="category_id" id="category_id" class="form-control form-select" hidden>
                                            <option value="">Select</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($pcategory->category_id == $item->id) selected @endif>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Program Category Name</label>
                                    <select name="pcategory_id" id="pcategory_id" class="form-control form-select"
                                        @if ($pcategory ?? '') disabled @endif>
                                        <option value="">Select</option>
                                        @if ($pcategory ?? '')
                                            <option value="{{ $pcategory->id }}" selected>{{ $pcategory->name }}</option>
                                        @endif
                                    </select>
                                    @if ($pcategory ?? '')
                                        <select name="pcategory_id" id="pcategory_id" class="form-control form-select" hidden>
                                            <option value="">Select</option>
                                            <option value="{{ $pcategory->id }}" selected>{{ $pcategory->name }}
                                            </option>
                                        </select>
                                    @endif
                                    <p class="text-danger" id="pcategory_error"></p>

                                    @error('pcategory_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sections m-3">
                                    Sections
                                    @if (count($sections) != 0)
                                        {{-- @if (count($sections) == 0)
                                            This Category have no sections.
                                        @endif --}}
                                        @foreach ($sections as $section)
                                            <div
                                                class="bg-light rounded-3 border-bottom border-3 border-primary p-3 mb-3 portion">
                                                <div class="mt-3">
                                                    <label for="order" class="form-label">Order</label>
                                                    <input type="number" name="sections[{{ $section->order }}][order]"
                                                        id="order" class="form-control" value="{{ $section->order }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" name="sections[{{ $section->order }}][title]"
                                                        id="title" class="form-control" value="{{ $section->title }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="editor" class="form-label">Content</label>
                                                    <textarea name="sections[{{ $section->order }}][content]" id="editor" cols="30" rows="10">{{ $section->content }}</textarea>
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
                                <div class="row d-flex justify-content-start">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-warning" id="addsection">Add New
                                            Section</button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary my-3">Create/Update Sections</button>

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
            plugins: ['code', 'image', 'link'],
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
                                                                    <textarea name="sections[' + count +
                    '][content]" id="editor' +
                    count + '" cols="30" rows="10" ></textarea>\
                                                                </div>\
                                                            </div>';
                $('.sections').append(string);

                tinymce.init({
                    selector: 'textarea#editor' + count,
                    plugins: ['code', 'image', 'link'],
                    //    toolbar:'code' 
                });
            });

            $('#category_id').on('change', function() {
                var id = $(this).val();
                // alert(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.getprogramcategory') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'category_id': id
                    },
                    dataType: 'json',
                    error: function(Err) {

                    },
                    success: function(result) {
                        if (result.flag == true) {
                            var string = '<option value="">Select</option>';
                            result.data.forEach(element => {
                                string += '<option value="' + element.id + '">' +
                                    element.name + '</option>';
                            });
                            $('#pcategory_id').html(string);
                            $('#pcategory_error').text('');
                        } else {
                            $('#pcategory_error').text('No Program category found !');
                        }
                    }
                });
            });


            $('#pcategory_id').on('change', function() {
                var id = $(this).val();
                window.location.href = '/admin/program/content/' + id + '/edit';
            });
        });
    </script>
@endsection
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script> --}}
