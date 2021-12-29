@extends('layout')
@section('content')

    <div class="">
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Supervisors</h4>
                            <ol class="breadcrumb">
                                <li><a href="">Supervisors</a></li>
                                <li class="active"> edit Supervisors</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                @include('layouts.messages')
                                <form method="POST" action="{{ route('supervisor.update', $supervisor['id']) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                                    @csrf
                                    
                                    <div class="form-group col-md-6">
                                        <label for="userName">UserName</label>
                                        <input id="userName" type="text" name="username" required placeholder="user name" class="form-control" value="{{$supervisor['username']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" name="phone" required placeholder="phone" class="form-control" value="{{$supervisor['phone']}}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" required placeholder="email" class="form-control" value="{{$supervisor['email']}}">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="avatar">Avatar</label>
                                        <img src="{{ $supervisor['avatar']}}" width="150" height="100" />
                                        <input type="file" name="avatar" value="{{$supervisor['avatar']}}" id="avatar" class="filestyle"  data-buttonname="btn-primary" >
                                        
                                        
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" name="password" required placeholder="password" class="form-control" value="{{$supervisor['password']}}">
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">update</button>
                                        <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection