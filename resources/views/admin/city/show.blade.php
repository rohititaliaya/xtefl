@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h1>{{$cc->name}}</h1>

                        @foreach ($cc->sections as $section)
                            <div class="bg-light">
                                <h2>{{$section->title}}</h2>
                                <div>
                                    {!!$section->content!!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
               
            </div>
        </div>

    </div>
    
    
@endsection


