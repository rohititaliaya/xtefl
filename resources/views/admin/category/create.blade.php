@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Create Category</h1>
                        @if (Session::has('success'))
                            <div class="my-3 alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif


                        <div class="ourform">
                            <form action="{{ route('admin.category.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name">

                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Category Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">

                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ctitle" class="form-label">Category Title</label>
                                    <input type="text" class="form-control" id="ctitle" name="ctitle">

                                    @error('ctitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea name="short_desc" id="short_desc" class="form-control" rows="5"></textarea>

                                    @error('short_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary my-3">Create Category</button>

                            </form>

                        </div>


                    </div>
                </div>

            </div>
        </div>

    </div>
    <script>
        $(document).ready(function(){
            $('#name').on('keyup', function(){
            $('#slug').val(convertToSlug($(this).val()));
            });
        });
        function convertToSlug(Text) {
            return Text.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    </script>
@endsection
