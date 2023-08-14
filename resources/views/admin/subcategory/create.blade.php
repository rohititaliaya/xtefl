@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Create Sub Category</h1>
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
                            <form action="{{ route('admin.subcategory.store') }}" method="post">
                                @csrf
                                @method('POST')
                                {{-- <div class="mb-3">
                                    <label for="ptype_id" class="form-label">Progrma Type:</label>
                                    <select name="ptype_id" id="ptype_id" class="form-control form-select">
                                        <option value="">Select</option>
                                        @foreach (\App\Models\ProgramType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('ptype_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category:</label>
                                    <select name="category_id" id="category_id" class="form-control form-select">
                                        <option value="">Select</option>
                                        @foreach (\App\Models\Category::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Sub Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name">

                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">

                                    @error('slug')
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
        $(document).ready(function() {
            $('#name').on('keyup', function() {
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
