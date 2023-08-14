@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Url Preview</h1>
                       
                        {{url()->current()}}

                        {{$url->title}}
                        {!!$url->body!!}
                    </div>
                </div>

            </div>
        </div>

    </div>

    
@endsection
