@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        @if (Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif

                        <h1>Category</h1>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>
                        <a href="{{ route('admin.showcategoryorder') }}" class="btn btn-primary mx-2">Re-Order Category</a>

                        {{ $dataTable->table() }}

                        {{ $dataTable->scripts() }}

                    </div>
                </div>
               
            </div>
        </div>

    </div>
    
    
@endsection


