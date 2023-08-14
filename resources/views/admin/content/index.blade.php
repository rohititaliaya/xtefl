@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Category Content</h1>
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
                        <a href="{{ route('admin.content.create') }}" class="btn btn-primary">Add Content</a>

                        {{ $dataTable->table() }}
                        

                        {{ $dataTable->scripts() }}

                    </div>
                </div>

            </div>
        </div>

    </div>

    
@endsection
