@extends('provider.layouts.app')

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
<table>

    <tr>
        <th>Title</th>
        <th style="width: 10%;">Image</th>
        <th>URL</th>
        <th>Payment status</th>
        <th></th>
    </tr>
    @foreach ($listings as $item)
    <tr>
        <td>{{$item->title}}</td>
        <td style="width: 10%;">
            <img src="{{asset('uploads/'.$item->image)}}" alt="{{$item->title}}" class="w-75 h-75">
        </td>
        <td>{{$item->listing_url}}</td>
        <td>
            {{$item->payment_status}}
        </td>
        <td>
            <a href="{{route('plans', $item->reference_id)}}" class="btn btn-primary">Pay now </a>
        </td>
    </tr>
    @endforeach
</table>
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

   
@endsection
