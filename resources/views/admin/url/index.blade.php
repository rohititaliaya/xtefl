@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h1>Urls</h1>
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
                        <a href="{{ route('admin.url.create') }}" class="btn btn-primary">Add Content</a>

                        {{ $dataTable->table() }}
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(function() {

            var table = $('#url-table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip',
                ajax: "{{ route('admin.url.index') }}",
                columns: [{
                    data:"id",
                    name:"id"
                },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'slug',
                        name: 'URL'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            function resetFilter() {
                $(".dt-input").val('')
                table.search('')
                    .columns()
                    .search('')
                    .draw();
            }

            function filterColumn(i, val) {
                table.column(i)
                    .search(val, false, true)
                    .draw();
            }

            $(".dt-input").on("change", function() {
                filterColumn($(this).attr("data-column"), $(this).val());
            });

            function format(d) {
                // `d` is the original data object for the row
                var string = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                    d.sections.forEach(item => {
                        string +='<tr><td>'+item.order+'</td><td>'+item.title+'</td></tr>';
                    });
                    
                    string+='</table>';

                    return string;
            }
            $('#url-table tbody').on('click', 'td.dt-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });


        });
    </script>
@endsection
