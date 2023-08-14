@extends('admin.layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                    <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary">Add Sub Category</a>

                    {{ $dataTable->table() }}

                    {{ $dataTable->scripts() }}

                    </div>
                </div>
               
            </div>
        </div>

    </div>
    
    <script>
        $(document).ready(function(){
            $('#subcategory-table').delegate('#featured', 'change', function(){
                var id = $(this).attr('data-id');
                var state = $(this).is(':checked');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.updatefeatured') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id,
                        'state':state
                    },
                    dataType: 'json',
                    error: function(Err) {

                    },
                    success: function(result) {
                        console.log(result);
                    }
                });
            });
        });
    </script>
@endsection


