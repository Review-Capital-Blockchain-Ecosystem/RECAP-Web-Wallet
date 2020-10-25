@extends('layouts.adminPanel')

@section('content') 

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('accountupdate') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-xl-12">
                                                <label class="mr-sm-2">Your Name</label>
                                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ Auth::user()->fullname}}">
                                            </div>
                                            <div class="form-group col-xl-12">
                                                <label class="mr-sm-2">Your Phone</label>
                                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ Auth::user()->phone_number}}">
                                            </div>
                                            <div class="form-group col-xl-12">
                                                <div class="media align-items-center mb-3">
                                                    <img class="mr-3 rounded-circle mr-0 mr-sm-3"
                                                        src="@if(Auth::user()->imgurl != NULL )/images/user/{{ Auth::user()->imgurl }} @else /images/2.png @endif" width="55" height="55" alt="">
                                                    <div class="media-body">
                                                        <h4 class="mb-0">{{ Auth::user()->fullname}}</h4>
                                                        <p class="mb-0">Max file size is 2mb
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="file-upload-wrapper" data-text="Change Photo">
                                                    <input name="photo" type="file"
                                                        class="file-upload-field" >
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success waves-effect">Save</button>
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
    </div>

@endsection  