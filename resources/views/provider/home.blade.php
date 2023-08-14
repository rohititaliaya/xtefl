@extends('provider.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                   
                        {{-- <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/basic.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.basic') }}" class="btn  fw-bold fs-5 border-0"> Basic</a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>
                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/org.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.org') }}" class="btn  fw-bold fs-5 border-0">
                                            Organization</a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>
                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/video.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.video') }}" class="btn  fw-bold fs-5 border-0">
                                            Video</a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>
                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card bg-light my-2">
                                    <div class="card-body py-5 text-center">
                                        <img src="{{ asset('assets/images/featured.png') }}" alt="" srcset="">
                                        <br>
                                        <a href="{{ route('provider.featured') }}" class="btn  fw-bold fs-5 border-0"> Featured
                                        </a>
                                    </div>
                                    <div class="subscribe position-absolute bg-warning align-self-end px-2 rounded-start mt-2 ">
                                        <a href="#" class="text-white">Subscribe</a>
                                    </div>

                                    <div class="learn-more text-end m-2">
                                        <a href="#" class="" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                            </svg>
                                            Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
                    <div class="row">
                        <div class="col-12">

                            <a href="{{ route('provider.basic') }}" class="btn btn-primary p-5 text-white fw-bold">
                                Add/Edit Listings</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section id="modals">
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">About the Listing and prompts</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Show a second modal and hide this one with the button below.
                        dfdsf
                    </div>
                    {{-- <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                </div> --}}
                </div>
            </div>
        </div>
        {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button> --}}
    </section>
@endsection
@push('scripts')
    <script>
        function copyref(btn) {
            var textToCopy = btn.name;
            navigator.clipboard.writeText(textToCopy).then(function() {
                alert('Text copied to clipboard !');
            }, function(err) {
                console.error("Failed to copy text: ", err);
            });
        };
    </script>
@endpush
