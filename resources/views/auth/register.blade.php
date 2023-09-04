@extends('layouts.app')

@section('content')
    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                        <form method="POST" action="{{ route('register') }}">
                           
                            @csrf
                            <div class="row y-gap-20">
                                <div class="col-12">
                                    <h1 class="text-22 fw-500">Sign in or create an account</h1>
                                    <p class="mt-10">Already have an account? <a href="{{ route('login') }}"
                                            class="text-blue-1">Log in</a>
                                    </p>
                                </div>
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{$error}}</div>
                                @endforeach
                            @endif

                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="name" required>
                                        <label class="lh-1 text-14 text-light-1">Name</label>
                                    </div>

                                </div>

                                {{-- <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" required>
                                        <label class="lh-1 text-14 text-light-1">Last Name</label>
                                    </div>

                                </div> --}}

                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="text" name="website" id="website" required>
                                        <label class="lh-1 text-14 text-light-1">Website</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="email" name="email" id="email" required>
                                        <label class="lh-1 text-14 text-light-1">Email</label>
                                    </div>
                                </div>

                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="password" name="password" id="password" required>
                                        <label class="lh-1 text-14 text-light-1">Password</label>
                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                                        <label class="lh-1 text-14 text-light-1">Confirm Password</label>
                                    </div>

                                </div>

                                {{-- <div class="col-12">

                                    <div class="d-flex ">
                                        <div class="form-checkbox mt-5">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 lh-15 text-light-1 ml-10">I agree to Terms and Conditions, Privacy
                                            Policy.</div>

                                    </div>

                                </div> --}}

                                <div class="col-12">

                                    <button href="#" class="w-100 button py-20 -dark-1 bg-blue-1 text-white">
                                        Sign Up <div class="icon-arrow-top-right ml-15"></div>
                                    </button>


                                </div>
                            </div>
                        </form>

                        <div class="row y-gap-20 pt-30">


                            <div class="col-12">
                                <div class="text-center px-30">By signing in, I agree to GoTrip Terms of Use and Privacy
                                    Policy.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Organization Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}"  autocomplete="email">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
