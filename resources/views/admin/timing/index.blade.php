@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                    <a href="{{ route('admin.timing.create') }}" class="btn btn-primary">Add Timing</a>

                    {{ $dataTable->table() }}

                    {{ $dataTable->scripts() }}

                    </div>
                </div>
               
            </div>
        </div>

    </div>
    
    
@endsection


