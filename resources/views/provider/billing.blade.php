@extends('provider.layouts.app')

@section('content')
    
   
    <section>
        <div class="container-fluid my-2">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-none border-0">
                                <h3 class="text-primary">Billing</h3>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th>Transaction Id</th>
                                    <th>Expiry date</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($transactions as $item)
                                <tr>
                                    <td>{{\App\Models\Plan::find($item->plan_id)->first()->name}}</td>
                                    <td>${{$item->amount}}</td>
                                    <td>{{$item->transaction_id}}</td>
                                
                                    <td>
                                        @if (!is_null($item->expiry_date))
                                            {{date('d-m-Y',strtotime($item->expiry_date))}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">success</span>
                                        @else
                                            <span class="badge bg-danger">fail</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                        <a href="{{route('checkout.download', $item->transaction_id)}}">Download PDF</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
