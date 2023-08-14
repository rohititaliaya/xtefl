@extends('admin.layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <style>
        ul li{
            list-style-type: none;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h1>Re-Arrange Category</h1>

                        <ul id="sortable">
                            @foreach ($cc as $item)
                                <li id="{{ $item->id }}" class="ui-state-default py-3 my-3 fw-bold"><i class='bx bx-grid-vertical mx-2'></i>{{ $item->order.' - '.$item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        $(function() {
            $("#sortable").sortable({
                axis: 'y',
                update: function(event, ui) {
                    var data = $(this).sortable('toArray');
                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data:{
                            _token: "{{ csrf_token() }}",
                            oarray : data
                        },
                        type: 'POST',
                        url: '{{route("admin.categoryorder")}}',
                        success: function(res){
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
