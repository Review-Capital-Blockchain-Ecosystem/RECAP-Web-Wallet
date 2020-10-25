@extends('layouts.home')

@section('content') 
	<style>
		.modal-dialog {
		    max-width: 60%;
		    margin: 1.75rem auto;
		}
	</style>
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
                <div class="col-md-10">
                	<div class="left-tabs-wrp shadow p-4 mb-6 bg-white rounded">
                		@if(isset($proposals['DataHex']))
                			<?php 
                				$tmp = $proposals; 
                				unset($proposals);
                				$proposals = array($tmp);
                			?>
                		@endif
                		<?php 
                		function secondsToTime($seconds) {
						    $dtF = new \DateTime('@0');
						    $dtT = new \DateTime("@$seconds");
						    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
						}
                		?>
                		@foreach($proposals as $key => $proposal)
                		<?php 
                			$details = json_decode($proposal['DataString']); 
                			switch(@$details->type){
                				case 1: $category = "News"; break;
                				case 2: $category = "Reviews"; break;
                				case 3: $category = "Articles"; break;
                				case 4: $category = "Software Development"; break;
                				case 5: $category = "Marketing"; break;
                				case 6: $category = "Business"; break;
                				case 7: $category = "Joining team"; break;
                				default: $category = "News"; break;
                			}
                		?>
                		<div class="row justify-content-end vote-data-heading mt-2">
                			<div class="col-md-12">
                				<h3>{{ @$details->name }}</h3>
                			</div>                			
                		</div>
                		<div class="row justify-content-end vote-data-content">
                			<div class="col-md-5">
                				<h5><i class="las la-sliders-h"></i> {{ substr($proposal['Hash'],0,40) }}...</h5>                				
                				<h5><i class="las la-calendar"></i> Payment Period</h5>
                				<!--<p class="payment-period">{{ secondsToTime(@$details->end_epoch - @$details->start_epoch) }}</p>-->
                				<p class="payment-period">30 days after approval (monthly)</p>
                				<p><span>Category: </span><span class="category">{{ $category  }}</span></p>
                				<span><a href="{{ @$details->url }}" traget="_blank"><i class="las la-external-link-alt"></i> View Document</a><span>
                			</div>
                			<div class="col-md-3">              				
                				<h5><i class="las la-money-bill"></i> Budget</h5>
                				<p class="budget">{{ @$details->RequestAmount }} RECAP</p>              				
                				<h5><i class="las la-clock"></i> Voting Deadline</h5>
                				<h6 class="voting-deadline">{{ date("d M Y H:i:s",@$details->end_epoch) }}</h6>
                				<h6 class="time-zone">(UTC Time)</h6>
                				<div class="progress mb-2">
                					<?php 
                						$total = @$details->end_epoch - @$details->start_epoch ;
                						$current = @$details->end_epoch - time();
                						$percentage = ($current/$total) * 100 ;
                						$yes = $proposal['YesCount'] ;
                						$no = $proposal['NoCount'] ;
                						$total = (int)($yes+$no) ;
                						if($total == 0){
                							$total = 1;
                						}
                					?>
								  	<div class="progress-bar voting-deadline-progressBar" style="width:{{ $percentage }}%"></div>
								</div>
								<h6 class="time-left text-success">{{ secondsToTime(@$details->end_epoch - time())  }}</h6>
                			</div>
                			<div class="col-md-4">
                				<h5><i class="las la-check-square"></i> Votes</h5>
                				<div class="progress mb-2">
								  	<div class="progress-bar voting-deadline-progressBar" style="width:{{ ($yes/$total)*100 }}%"></div>
								</div>
								<div class="d-flex justify-content-between">
									<h6 class="vote-positive text-success"><i class="las la-thumbs-up"></i>{{ ($yes/$total)*100 }}%</h6>									
									<h6 class="vote-positive text-success">{{ $yes }}</h6>
								</div>      
								<div class="progress mb-2">
								  	<div class="progress-bar voting-deadline-progressBar" style="width:{{ ($no/$total)*100 }}%"></div>
								</div>  
								<div class="d-flex justify-content-between">
									<h6 class="vote-negative text-danger"><i class="las la-thumbs-down"></i>{{ ($no/$total)*100 }}%</h6>									
									<h6 class="vote-negative text-danger">{{ $no }}</h6>
								</div>            				
                				<h5><i class="las la-check-square"></i> Net Yes</h5>
                				<div class="progress mb-2">
								  	<div class="progress-bar voting-deadline-progressBar" style="width:{{ ($yes/$total)*100 }}%"></div>
								</div>
								<h6 class="net-yes text-success">0%</h6>
                			</div>
                		</div>
                		<div class="row justify-content-end vote-action-button">
                			<div class="col-md-6">
                				<a href="#" class="col-12 btn btn-primary btn-view-proposal" data-toggle="modal" data-target="#proposalModal{{ $key }}">View Proposal <i class="las la-angle-right"></i></a>
                			</div>
                			<div class="col-md-6">
                				<a href="#" class="col-12 btn btn-info" data-toggle="modal" data-target="#voteModal{{ $key }}">Vote<i class="las la-angle-right"></i></a>
                			</div>
                		</div>
                		<div class="modal" id="proposalModal{{ $key }}" data-backdrop="false" aria-modal="true">
				            <div class="modal-dialog">
				                <div class="modal-content">
				                   	<div class="modal-header">
				                         <h4 class="modal-title">Proposal</h4>
				                        <button type="button" class="close" data-dismiss="modal">×</button>
				                    </div>
				                    <div class="view-proposal-container col-12">
					           			<div class="container-fluid table-responsive">
					           				<table class="table mb-0">
					           					<tbody>
					           						<tr>
					        							<td> Hash</td>
					        							<td> {{ $proposal['Hash'] }}</td>
					        						</tr>
					        						<tr>
					        							<td> Collarate Hash</td>
					        							<td> {{ $proposal['CollateralHash'] }}</td>
					        						</tr>
					        						<tr>
					        							<td> Payment Address</td>
					        							<td> {{ $details->payment_address }}</td>
					        						</tr>
					        						<tr>
					        							<td> Category</td>
					        							<td> {{ $category  }}</td>
					        						</tr>
					        						<tr>
					        							<td> Budget</td>
					        							<td> {{ @$details->RequestAmount }}</td>
					        						</tr>
					        						<tr>
					        							<td> DeadLine</td>
					        							<td> {{ date("d M Y H:i:s",@$details->end_epoch) }}</td>
					        						</tr>
					        						<tr>
					        							<td> Vote</td>
					        							<td> <span class="btn btn-success">{{$proposal['YesCount']}}</span><span class="btn btn-danger">{{$proposal['NoCount']}}</span></td>
					        						</tr>
					        						<tr>
					        							<td> Document</td>
					        							<td> <a href="{{ @$details->url }}" target="_blank">Click here To See</a></td>
					        						</tr>
					        					</tbody>
					        				</table>
					        			</div>
					           		</div>
				                    <div class="modal-footer">
				            	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        	        </div>
		                		</div>
		                	</div>
		                </div>
                		<div class="modal" id="voteModal{{ $key }}" data-backdrop="false" aria-modal="true">
		                    <div class="modal-dialog">
		                        <div class="modal-content">
		                            <div class="modal-header">
		                                <h4 class="modal-title">Vote</h4>
		                                <button type="button" class="close" data-dismiss="modal">×</button>
		                            </div>
		                            <div class="modal-body">
		                            	<h5>Vote Yes</h5>
		                            	<div class="input-group all_wallet mb-3">
			                                <input type="text" class="form-control" id="yesvote{{ $key }}" value="gobject vote-many {{ $proposal['Hash'] }} funding yes" readonly="readonly">
			                                <div class="input-group-append">
			                                	<button class="btn btn-primary" type="button" onclick="CopyFunction('yesvote{{ $key }}')">Copy</button>
                                            </div>
                                        </div>
		                            	<h5>Vote No</h5>
		                            	<div class="input-group all_wallet">
			                                <input type="text" class="form-control" id="novote{{ $key }}" value="gobject vote-many {{ $proposal['Hash'] }} funding no" readonly="readonly">
			                                <div class="input-group-append">
			                                	<button class="btn btn-primary" type="button" onclick="CopyFunction('novote{{ $key }}')">Copy</button>
                                            </div>
                                        </div>
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
		                            <div class="modal-footer">
		                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                @endforeach
                	</div>
                </div>

            </div>
        </div>
    </div>

@endsection  