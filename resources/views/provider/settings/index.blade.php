@extends('provider.layouts.app')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-6 col-md-6">

                    <h2>{{ __('Settings') }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            @if (Session::has('success'))
                <div class="my-3 alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-md-6 col-12">

                <div class="card ">
                    <div class="card-header">
                        <h1>Profile</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('provider.settings.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="mt-3">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="{{auth()->user()->name}}" class="form-control" autocomplete="off">
                            </div>
                            <div class="mt-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}" autocomplete="off">
                            </div>
                            <div class="mt-3 row">
                                <div class="col-md-8 col-12">
                                    <label for="logo">Logo:</label>
                                    <input type="file" name="logo" id="logo" value="{{auth()->user()->logo}}" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-4 col-12">
                                    @php
                                        $logo = 'https://dummyimage.com/100x100/adadad/000000&text=no+image';
                                        if (!is_null(auth()->user()->logo)) {
                                            $logo = asset('uploads/'.auth()->user()->logo);
                                        }
                                    @endphp
                                    <div class="preview">
                                        <img src="{{$logo}}" alt="{{auth()->user()->name}}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="website">Website Url:</label>
                                <input type="text" name="website" id="website" class="form-control" value="{{auth()->user()->website}}" autocomplete="off">
                            </div>
                            <div class="mt-3">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">

                <div class="card">
                    <div class="card-header">
                        <h1>Active Plans</h1>
                    </div>
                    @php
                        $plan = get_plan();
                        // dd($plan);
                    @endphp
                    <div class="card-body">
                        @if (has_active_plan())
                        <p class="text-success">

                            ${{$plan->price}}
                            {{$plan->name}} plan is active
                            @if ($plan->slug=='basic')
                            <a href="{{route('plans')}}" class="btn btn-primary">Upgrade</a>
                            @endif
                        </p>
                        @else
                            <p class="text-danger">No Plan Active

                                <a href="{{route('plans')}}" class="btn btn-primary">Subscribe</a>
                            </p>

                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
