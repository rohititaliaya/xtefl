@include('admin.layouts.head')

<body>

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper"  style="margin-left:0px;">
        <!-- ========== signin-section start ========== -->
        <section class="signin-section">
            <div class="container-fluid">
                <div class="row g-0 auth-row">
                    <div class="col-lg-6">
                        <div class="auth-cover-wrapper bg-primary-100">
                            <div class="auth-cover">
                                <div class="title text-center">
                                    <h1 class="text-primary mb-10">Welcome Back</h1>
                                    <p class="text-medium">
                                        Sign in to your Existing account to continue
                                    </p>
                                </div>
                                <div class="cover-image">
                                    <img src="{{ asset('res/images/auth/signin-image.svg') }}" alt="" />
                                </div>
                                <div class="shape-image">
                                    <img src="{{ asset('res/images/auth/shape.svg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="signin-wrapper">
                            <div class="form-wrapper">
                                <h6 class="mb-15">Sign In</h6>
                                @if (Session::has('error'))
                                    <div class="my-3 alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="my-3 alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('admin.check') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email" />
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password" />
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                            <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div
                                                class="button-group d-flex
                            justify-content-center
                            flex-wrap
                          ">
                                                <button type="submit"
                                                    class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            ">
                                                    Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </section>
        <!-- ========== signin-section end ========== -->

        @include('admin.layouts.footer')
