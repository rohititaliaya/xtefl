@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                    <h1>Program Type</h1>
                    <a href="{{ route('admin.programtype.create') }}" class="btn btn-primary">Add Program Type</a>

                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts() }}

              

                    </div>
                </div>
               
            </div>
        </div>

    </div>
@endsection
