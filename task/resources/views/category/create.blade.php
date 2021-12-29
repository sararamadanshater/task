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
                            <h4 class="page-title">categories</h4>
                            <ol class="breadcrumb">
                                <li><a href="">categories</a></li>
                                <li class="active">add Category</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                @include('layouts.messages')
                                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" required placeholder="name of category" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="slug">Slug</label>
                                        <input id="slug" type="text" name="slug" required placeholder="slug" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="icon">image</label>
                                        <input type="file" name="icon" id="icon" class="filestyle" required data-buttonname="btn-primary">
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