@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Listings</h1>
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
                        {{-- <a href="{{ route('admin.url.create') }}" class="btn btn-primary">Add Content</a> --}}

                        {{ $dataTable->table() }}
                    </div>
                </div>

            </div>
        </div>
       
        <!-- Modal -->
        <div class="modal fade" id="monthsModal" tabindex="-1" aria-labelledby="monthsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="monthform">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="monthsModalLabel">Enter no of months:</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="rowid" id="rowid">
                            <input type="hidden" class="form-control" name="package" id="package">
                            <input type="number" class="form-control" name="months" id="months" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function() {
            $('#providerlisting-table').delegate('#is_promted', 'change', function() {
                var rowid = $(this).attr('data-id');
                $('#rowid').val(rowid);

                var package = $(this).val();
                $('#package').val(package);

                $("#monthsModal").modal("show");

                
            });

            $("#monthform").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serializeArray();
                var jsonData = {};
                $.each(formData, function() {
                    jsonData[this.name] = this.value;
                });
                console.log(jsonData);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.makePromoted') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data":jsonData
                    },
                    dataType: 'json',
                    error: function(Err) {

                    },
                    success: function(result) {
                        if (result.flag == true) {
                             $("#monthsModal").modal("hide");
                            window.location.reload();
                        } else {
                            alert('error while updating package');
                        }
                    }
                });
            });
        });
    </script>
@endsection
