@extends('layouts.adminPanel')

@section('content') 

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12">
                    <div class="card balance-widget">
                        <div class="card-header border-0 py-0">
                            <h4 class="card-title">Your Portfolio </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <ul class="list-unstyled col-xl-12 col-lg-12 col-xxl-12">
                                    <li class="media">
                                        <i class="cc mr-3"></i>
                                        <div class="media-body">
                                            <h5 class="m-0">RECAP Balance : </h5>
                                        </div>
                                        <div class="text-right">
                                            <h5>{{ number_format(Auth::User()->wallet->balance,8) }} RECAP</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header border-0 py-0">
                            <h4 class="card-title">Recent Activities</h4>
                            <a href="{{ route('history') }}">View More </a>
                        </div>
                        <div class="card-body">
                            <div class="transaction-table">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-responsive-sm">
                                        <tbody>
                                        	<?php $i=0; ?>
                                            @foreach(Auth::User()->transaction as $transaction)
                                            <?php $i++; if($i>=5){ break;}?>
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