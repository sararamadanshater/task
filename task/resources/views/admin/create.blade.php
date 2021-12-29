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
                            <h4 class="page-title">supervisors</h4>
                            <ol class="breadcrumb">
                                <li><a href="">supervisors</a></li>
                                <li class="active">add supervisor</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                @include('layouts.messages')
                                <form method="POST" action="{{ route('supervisor.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for="userName">UserName</label>
                                        <input id="userName" type="text" name="username" required placeholder="user name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" name="phone" required placeholder="phone" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" required placeholder="email" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" name="avatar" id="avatar" class="filestyle" required data-buttonname="btn-primary">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" name="password" required placeholder="password" class="form-control">
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">add</button>
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