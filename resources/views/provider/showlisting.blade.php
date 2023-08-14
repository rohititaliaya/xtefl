@extends('provider.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="mb-2">
                <a href="{{route('provider.dashboard')}}" class="btn btn-primary float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg> Go Back
                </a>
            </div>
            <div class="col-md-12 col-12">

                <div class="card">
                    <div class="card-header">{{ __('Impressions and clicks') }}</div>

                    <div class="p-3">
                        <canvas id="impressionChart"></canvas>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">{{ __('Listing Preview') }}</div>

                    <div class="card-body">
                        <div class="card" style="width: 20rem;">
                            <img src="{{ asset('uploads/' . $listing->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">{{ $listing->title }}</p>
                                <a href="https://{{ $listing->listing_url }}" target="_blank" class="btn btn-dark">Visit
                                    here</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">{{ __('Featured Listing') }}</div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ asset('uploads/' . $listing->promoted_img) }}" class="card-img-top"
                                    alt="">
                            </div>
                            <div class="card-body">
                                <p><strong>Featured Listing Title:</strong> <br>
                                    {{ $listing->promoted_title }}</p>
                                <p><strong>Featured Listing URL:</strong> <br>
                                    https://www.{{ $listing->listing_url }} / <a href="https://{{ $listing->listing_url }}"
                                        target="_blank"> Click here to visit.</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">{{ __('Video') }}</div>
                    <div class="card-body">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $listing->video }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
                    var startDate = '2023-04-01';
                    var endDate = '2023-04-30';
                    var listingId = {{ request()->id }};
                    $.ajax({
                            url: "{{ route('get_impression_data') }}",
                            data: {
                                start_date: startDate,
                                end_date: endDate,
                                listing_id: listingId
                            },
                            success: function(response) {
                                var impressionData = response.data;
                                // // var clickData = response.clickData;
                                // var chartData = {
                                //     labels: [],
                                //     datasets: [
                                //         {
                                //             label: 'Impressions',
                                //             data: [],
                                //             borderColor: 'blue',
                                //             backgroundColor: 'rgba(0, 0, 255, 0.2)',
                                //             fill: 'start'
                                //         },
                                //         {
                                //             label: 'Clicks',
                                //             data: [],
                                //             borderColor: 'green',
                                //             backgroundColor: 'rgba(0, 255, 0, 0.2)',
                                //             fill: 'start'
                                //         }
                                //     ]
                                // };
                                // impressionData.forEach(function(data) {
                                //     chartData.labels.push(data.created_at);
                                //     chartData.datasets[0].data.push(data.impressions);
                                // });
                                // impressionData.forEach(function(data) {
                                //     chartData.datasets[1].data.push(data.clicks);
                                // });
                                // console.log(chartData);

                                var m = new Chart('impressionChart', {
                                        type: 'line',
                                        data: {
                                            labels: impressionData.labels,
                                            datasets: impressionData.datasets
                                        },
                                        defaultFontFamily: "Inter",
                                        options: {
                                            tooltips: {
                                                callbacks: {
                                                labelColor: function (tooltipItem, chart) {
                                                    return {
                                                    backgroundColor: "#ffffff",
                                                    };
                                                },
                                                },
                                                intersect: false,
                                                backgroundColor: "#f9f9f9",
                                                titleFontFamily: "Inter",
                                                titleFontColor: "#8F92A1",
                                                titleFontColor: "#8F92A1",
                                                titleFontSize: 12,
                                                bodyFontFamily: "Inter",
                                                bodyFontColor: "#171717",
                                                bodyFontStyle: "bold",
                                                bodyFontSize: 16,
                                                multiKeyBackground: "transparent",
                                                displayColors: false,
                                                xPadding: 30,
                                                yPadding: 10,
                                                bodyAlign: "center",
                                                titleAlign: "center",
                                            },
                                            title: {
                                                display: false,
                                            },
                                            legend: {
                                                display: false,
                                            },
                                            scales: {
                                                // y: {
                                                //     beginAtZero: true
                                                // },
                                                yAxes: [
                                                    {
                                                        gridLines: {
                                                        display: false,
                                                        drawTicks: false,
                                                        drawBorder: false,
                                                        },
                                                        ticks: {
                                                            padding: 35,
                                                        },
                                                    },
                                                ],
                                                xAxes: [
                                                    {
                                                        gridLines: {
                                                        drawBorder: false,
                                                        color: "rgba(143, 146, 161, .1)",
                                                        zeroLineColor: "rgba(143, 146, 161, .1)",
                                                        },
                                                        ticks: {
                                                        padding: 20,
                                                        },
                                                    },
                                                ],
                                            }
                                        }
                                    
                                
                            });
                        }
                    });
                    });
    </script>
@endpush
