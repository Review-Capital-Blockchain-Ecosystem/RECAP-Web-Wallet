@extends('layouts.adminPanel')

@section('content') 

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Security</h4>
                        </div>
                        
                        
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Password</h4>
                                </div>
                                <div class="card-body">
                                	<div class="card-block">
								        <div class="row">
								            <div class="col-md-12 col-sm-12">
								                <div class="widget p-md clearfix">
								                    <div class="row">
								                        <div class="col-md-8">
								                            <label>Wallet Password : <label class="badge badge-success py-1 px-2">Password Set</label></label>
								                            <p> Your password is never shared with our servers, which means we cannot help reset your password if you forget it. Make sure you write down your recovery phrase which can restore access to your wallet in the event of a lost password.</p>
								
								                        </div>
								                        <div class="col-md-4 text-right">
								                            <a href="#" class="btn btn-success btn-change-password">Change Password</a>
								                        </div>
								                    </div>
								                </div>
								                <div id="password-change-container" style="display:none;">
				                                    <form action="{{ route('passchange') }}" method="POST">
				                                        @csrf
				                                        <div class="form-row">
				                                            <div class="form-group col-xl-12">
				                                                <label class="mr-sm-2">Old Password</label>
				                                                <input type="password" class="form-control" placeholder="**********" name="oldPassword">
				                                            </div>
				                                            <div class="form-group col-xl-12">
				                                                <label class="mr-sm-2">New Password</label>
				                                                <input type="password" class="form-control"
				                                                    placeholder="**********" name="newPassword">
				                                            </div>
				                                            <div class="form-group col-xl-12">
				                                                <label class="mr-sm-2">Confirm Password</label>
				                                                <input type="password" class="form-control"
				                                                    placeholder="**********" name="confirmPassword">
				                                            </div>
				                                            <div class="col-12">
				                                            	<button type="button" class="btn btn-info" id="cancel-password">Cancel</button>
				                                                <button type="submit" class="btn btn-success waves-effect">Save</button>
				                                            </div>
				                                        </div>
				                                    </form>
				                                </div>
								                <hr>
								            </div>
											
								            
								            <div class="col-md-12 col-sm-12">
								                <div class="widget p-md clearfix">
								
								                    <div class="row">
								                        <div class="col-md-8">
								                            <label>
								                                Backup Phrase: <label class="badge badge-success">Enable</label>                                        </label>
								                            <p>Your backup phrase contains all of the private keys within your wallet. Please write these 12 words down, in order, and keep them somewhere safe offline. This phrase gives you (or anyone who has it) a way to restore your wallet and access your funds. In the event that you lose your password or our service is unavailable, this will be your safety net.</p>
								
								                        </div>
								                        <div class="col-md-4 text-right">
								                            <div>
								                                <button class="btn btn-info" id="backup">Backup Funds</button>     
								                            </div>
								                        </div>
								                        <div id="phrase" class="col-md-12" style="display: none">
								                            <div class="form-group col-md-12">
								                            	
																<span> <strong>{{Auth::user()->wordlist}}<strong> </span>
								                               	</br>
								                               	<button class="btn btn-info" id="cancel">Close</button>
								                            </div>
								                             <div class="form-group col-md-3">
								                            </div>
								                       </div>
								
								                    </div>
								                </div><!-- .widget -->
								            </div>
										</div>
								
								            <div class="col-md-12 col-sm-12">
	
								                <div class="widget p-md clearfix">
								                    <div class="row">
								                        <div class="col-md-8">
								                            <label>
								                                2-step Google Verification: @if(Auth::user()->google2fa_secret == NULL) <label class="badge badge-danger">Disable</label>@else <label class="badge badge-success">Enable</label> @endif                                       </label>
								                            <p> <small class="text-color">Protect your wallet from unauthorized access by enabling 2-Step Verification By Google Authenticator.</small></p>
								                            <p><small class="text-color"> You can choose to use a free app or your mobile phone number to secure your wallet.</small></p>
								                        </div>
								
								                        <div class="col-md-4 text-right">
								                            <div>
								                                <button class="btn btn-info" id="s2fa">Enable/Disable</button>     
								                            </div>
								                        </div>
								                        <div id="s2fapanel" class="col-md-12" style="display: none">
								                            <div class="form-group col-md-12">
								                            	
																<div class="panel-body" style="text-align: left;">
																	@if(Auth::user()->google2fa_secret == NULL)
												                    <p>Set up you 2FA by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>
												                    <div>
												                        <img src="{{ @$QR_Image }}">
												                        <form action="{{ route('enable2fa') }}" method="POST">
									                                        @csrf
									                                        <input type="hidden" name="fa2code" value="{{ $secret }}">
									                                        <div class="form-row" style="max-width:350px">
									                                            <div class="form-group col-xl-12">
									                                                <label class="mr-sm-2">Your Password</label>
									                                                <input type="password" class="form-control" placeholder="123456" name="password">
									                                            </div>
									                                            <div class="col-12">
									                                            	<button class="btn btn-info" id="cancel2fa">Close</button>
									                                                <button type="submit" class="btn btn-success waves-effect">Enable</button>
									                                            </div>
									                                        </div>
									                                    </form>
												                    </div>
												                    @else
												                    <p>To Disable Your 2fa please continue with your password</p>
												                    <div>
												                        <form action="{{ route('disable2fa') }}" method="POST" >
									                                        @csrf
									                                        <div class="form-row" style="max-width:350px">
									                                            <div class="form-group col-xl-12">
									                                                <label class="mr-sm-2">Your Password</label>
									                                                <input type="password" class="form-control" placeholder="123456" name="password">
									                                            </div>
									                                            <div class="col-12">
									                                            	<button class="btn btn-info" id="cancel2fa">Close</button>
									                                                <button type="submit" class="btn btn-danger waves-effect">Disable</button>
									                                            </div>
									                                        </div>
									                                    </form>
												                    </div>	
												                    @endif
												                </div>
								                            </div>
								                       </div>                                 
								                    </div>
								                </div><!-- .widget -->
								            </div>
								        </div>
								    </div>
                                	
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  