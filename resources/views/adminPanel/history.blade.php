@extends('layouts.adminPanel')

@section('content') 

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Transaction History</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="transaction-table">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-responsive-sm">
                                        <tbody>
                                        	@foreach(Auth::User()->transaction as $transaction)
                                            <tr>
                                                <td>
                                                	@if($transaction->type=='Withdraw')
                                                    	<span class="badge badge-danger">{{ $transaction->type }}</span>
                                                    @else
                                                    	<span class="badge badge-success">{{ $transaction->type }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <i class="cc"></i> RECAP
                                                </td>
                                                <td>
                                                    {{ $transaction->txid }}
                                                </td>
                                                <td class="@if($transaction->type=='Withdraw')text-danger @else text-success @endif">{{ $transaction->amount }} RECAP</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection  