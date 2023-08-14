@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                    <h1>Category Section</h1>
                    <a href="{{ route('admin.categorysection.create') }}" class="btn btn-primary">Add Category Section</a>

                    {{ $dataTable->table() }}

                   

                    </div>
                </div>
               
            </div>
        </div>

    </div>
    
    
@endsection


