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
                                <li class="active">edit Category</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                @include('layouts.messages')
                                <form method="POST" action="{{ route('categories.update', $category['id']) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" required placeholder="name" class="form-control" value="{{ $category['name'] }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="slug">Slug</label>
                                        <input id="slug" type="text" name="slug" required placeholder="slug" class="form-control" value="{{ $category['slug'] }}">
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label for="userName">image</label>
                                        edit?
                                        <img src="{{ $category['icon'] }}" width="150" height="100" />
                                        <input type="file" name="icon" id="icon" class="filestyle"  data-buttonname="btn-primary">
                                    </div>
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