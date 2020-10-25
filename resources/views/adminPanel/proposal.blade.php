@extends('layouts.home')

@section('content') 

    <div class="content-body">
        <div class="container-fluid"  style="padding-top:60px;">
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
                <div class="col-md-7">
                	<div class="left-tabs-wrp shadow p-4 mb-5 bg-white rounded">
                		<div class="row justify-content-end">
                			<ul class="nav nav-pills mb-3 pr-5 tab-life" id="pills-tab" role="tablist">
                				<li class="nav-item">
                					<a class="nav-link btn-primary active" id="pills-home-tab" data-toggle="pill" href="#tabs-one" role="tab" aria-controls="pills-home" aria-selected="true">Mainnet</a>
                				</li>
                			</ul>
                			<div class="container-fluid">
                				<div class="tabs-content">
                					<div class="tab-content" id="pills-tabContent">
                						<div class="tab-pane fade show active" id="tabs-one" role="tabpanel" aria-labelledby="pills-home-tab">
                							
                							<form method="POST" action="{{ route('proposal') }}"  enctype="multipart/form-data">
                                                @csrf
                								<div class="row">
                									<div class="tabs-title">
                										<div class="title">
                											<h2>SUBMIT A PROPOSAL</h2>
                										</div>
                										<div class="pera">A proposal can cost a network fee of 5 RECAP.</div>
                									</div>
                								</div><br><br>

                								<div class="form-row">
                									<div class="form-group col-md-12">
                										<label for="title">Proposal Title</label>
                										<input type="text" class="form-control col-form-label-sm" id="title" placeholder="Proposal title" name="title" value="">
                									</div>

                									<div class="form-group col-md-12">
                										<label for="description">Proposal Description</label>
                										<input type="text" class="form-control col-form-label-sm" id="description" placeholder="Write in detail about your proposal" name="description">
                									</div>
                									<div class="form-group col-md-12">
                										<label for="for-text">Upload File</label>
                										<div class="input-group mb-3">
                											<div class="custom-file">
                												<label class="custom-file-label">Upload Document File Here</label>
						                                        <div class="file-upload-wrapper" data-text="Upload Document File Here">
						                                            <input name="document" type="file" class="file-upload-field">
						                                        </div>
                											</div>
                										</div>
                									</div>

                									<div class="form-group col-md-4">
                										<label for="category">Select Category</label>
                										<select id="category" class="form-control" name="category">
                											<option value="1" selected>News</option>
                											<option value="2">Reviews</option>
                											<option value="3">Articles</option>
                											<option value="4">Software Related</option>
                											<option value="5">Marketing</option>
                											<option value="6">Business</option>
                											<option value="7">Joining Team</option>
                										</select>
                									</div>
                									<div class="form-group col-md-6 ml-auto">
                										<label for="paymentAddrees">Payment Addrees:</label>
                										<input type="text" class="form-control col-form-label-sm" id="paymentAddrees" placeholder="" name="paymentAddrees" value="">
                									</div>

                									<div class="form-group col-md-6 ml-auto">
                										<label for="recap_ip" class="col-form-label mb-0">Request Amount (optional):</label>
                										<input type="text" value="" class="form-control col-form-label-sm" id="payment" placeholder="" value="0" name="requestamount">
                									</div>
                									<div class="form-group col-md-6 ml-auto">
                										<label for="recap_ip" class="col-form-label mb-0">Total Amount:</label>
                										<input type="text" readonly value="5" class="form-control col-form-label-sm" id="payment" placeholder="" value="0" name="payment">
                									</div>
                									<div class="form-group mx-auto">
                										<button class="btn btn-primary btn-sm form-submit" type="submit">Submit</button>
                									</div>
                								</div>
                							</form>
                						</div>
                					</div>
                				</div>
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
                    					<p>This creates proposal commands. You can copy/paste into your RECAP core wallet to prepare a proposal and submit it to the network after clicking "Submit".</p>
                    				</div>
                    			</div><br>

                    			<div class="row">
                    				<div class="link">
                    					<a href="https://github.com/Review-Capital-Blockchain-Ecosystem" target="_blank"><i class="lab la-github"></i> Source Code</a>
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