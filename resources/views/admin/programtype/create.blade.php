@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                    <h1>Create Program Type</h1>
                    @if (Session::has('success'))
                        <div class="my-3 alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    

                    <div class="ourform">
                        <form action="{{ route('admin.programtype.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="name" class="form-label">Program Type Name/Title</label>
                                <input type="text" class="form-control" id="name" name="name">

                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>                                    
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>

                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>                                    
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-primary my-3">Create Program Type</button>
                        
                        </form>

                    </div>
                    

                    </div>
                </div>
               
            </div>
        </div>

    </div>
    
    
@endsection


