@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                    <h1>Create Country</h1>
                    @if (Session::has('success'))
                        <div class="my-3 alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    

                    <div class="ourform">
                        <form action="{{ route('admin.country.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="name" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="name" name="name">

                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>                                    
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Country Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug">

                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>                                    
                                @enderror
                            </div>

                            

                         

                            <button type="submit" class="btn btn-primary my-3">Create Country</button>
                        
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


