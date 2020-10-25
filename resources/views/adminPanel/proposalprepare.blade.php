@extends('layouts.home')

@section('content') 

    <div class="content-body"  style="padding-top:60px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="card settings_menu">
                        <div class="card-header">
                            <h4 class="card-title">Voting</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li class="nav-item">
                                    <a href="{{ route('proposal') }}" class="nav-link active">
                                        <i class="la la-user"></i>
                                        <span>Proposal</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('vote') }}" class="nav-link">
                                        <i class="la la-lock"></i>
                                        <span>Vote</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if(Session::has('txid'))
                	<?php $hash = Session::get('txid') ?>
				@endif
				<div class="col-md-7">
                	<div class="left-tabs-wrp shadow p-4 mb-6 bg-white rounded">
                		<div class="row justify-content-end">
                			<div class="container-fluid table-responsive">
                				@if(Session::has('error'))
				                	<span>{{ Session::get('error') }}</span>
								@endif
                				<form action="{{ route('proposalsubmit') }}" method="POST">
                					@csrf
                					<input type="hidden" class="form-control" name="code" value="{{ $hash }}">
                					<textarea id="receive_code_sombe" class="form-control" readonly>{{ $hash }}</textarea>
                					<div class="input-group-append  pull-right my-4">
                						<button class="btn btn-primary" type="button" onclick="CopyFunction('receive_code_sombe')">Copy Code</button>
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
                					<div class="form-group">
                						<div class="input-group mb-3">
	                                        <div class="input-group-prepend">
	                                            <label class="input-group-text"><i class="fa fa-money"></i></label>
	                                        </div>
	                                        <input type="text" class="form-control" placeholder="Input-hash" name="txid" required>
	                                    </div>
                					</div>
                					<div class="input-group-append  pull-right">
                						<button class="btn btn-primary" type="submit">Propagate Proposal</button>
                                    </div>
                                    	<span>Wait At Least 6 Confirmation of Proposal Hash & Click Propagate Proposal</span>
                				</form>							
                			</div>
                		</div>
                	</div>
                </div>
                <div class="col-md-3">
                    <div class="right-wrp p-2">
                    	<div class="row">	
                    		<div class="col-md-8">
                    			<div class="row">
                    				<div class="top-title">
                    					<h2 class="text-secondary"><strong>RECAP inprovement proposals</strong></h2>
                    				</div>
                    			</div><br><br>


                    			<div class="row">
                    				<div class="discript">
                    					<p>While not shown above, feel free to use <b> is meant to highlight words or phrases without conveying additional importance while  is mostly for voice, technical terms, etc.</p>
                    				</div>
                    			</div><br>

                    			<div class="row">
                    				<div class="link">
                    					<a href="#"><i class="lab la-github"></i> Source Code</a>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col-md-8"></div>
                    	</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection  