@extends('layouts.adminPanel')

@section('content') 

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="card acc_balance">
                        <div class="card-header">
                            <h4 class="card-title">Wallet</h4>
                        </div>
                        <div class="card-body">
                            <span>Available RECAP</span>
                            <h3>{{ number_format(Auth::User()->wallet->balance,8) }} RECAP </h3>
                            <h6>Pending/Locked Amount: ({{ number_format(Auth::User()->wallet->lockedbalance,8) }} RECAP)</h6>

                            <div class="d-flex justify-content-between my-4">
                                <div>
                                    <p class="mb-1">Deposit this month</p>
                                    <h4>{{ number_format(Auth::User()->wallet->balancebuy,8) }} RECAP</h4>
                                </div>
                                <div>
                                    <p class="mb-1">Withdraw this month</p>
                                    <h4>{{ number_format(Auth::User()->wallet->balancesell,8) }} RECAP</h4>
                                </div>
                            </div>

                            <div class="btn-group mb-3">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#depositModal">Deposit Address</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="depositModal" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Deposit Address</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group all_wallet" id="sombe_wallet_copy">
                                <div class="d-flex align-items-center justify-content-center col-md-12 offset-md-12">
                                    <img class="img-fluid" src="https://chart.googleapis.com/chart?cht=qr&chl={{Auth::User()->wallet->address}}&choe=UTF-8&chs=480x480" alt="">
                                </div>
                                <input type="text" class="form-control" id="receive_id_sombe" value="{{Auth::User()->wallet->address}}" readonly="readonly">
                                <div class="input-group-append">
                                	<button class="btn btn-primary" type="button" onclick="CopyFunction('receive_id_sombe')">Copy</button>
                                                                    <script>
                                                                    	function CopyFunction(myInput) {
																		  var copyText = document.getElementById(myInput);
																		  copyText.select();
																		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
																		  document.execCommand("copy");
																		  alert("Copied the text: " + copyText.value);
																		} 
                                                                    </script>
                                                                </div>
                                                            </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Withdraw</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sendcoin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fa fa-address-card"></i></label>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Withdraw Address" name="send_to" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fa fa-money"></i></label>
                                        </div>
                                        <input type="text" class="form-control" name="send_amount" placeholder="5000 RECAP" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fa fa-money"></i></label>
                                        </div>
                                        <input type="text" class="form-control" placeholder="0.001 Recap (minimum)" name="fee" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Withdraw Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">All Activities</h4>
                            <a href="{{ route('history') }}">View More </a>
                        </div>
                        <div class="card-body pt-0">
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