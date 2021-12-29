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
                            <h4 class="page-title">products</h4>
                            <ol class="breadcrumb">
                                <li><a href="">products</a></li>
                                <li class="active">add Product</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                @include('layouts.messages')
                                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for="category">.category</label>
                                        <select id="category" name="category" required class="form-control">
                                            <option value="">---</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" required placeholder="name of product" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="slug">Slug</label>
                                        <input id="slug" type="text" name="slug" required placeholder="slug" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">description</label>
                                        <textarea id="description" name="description" required placeholder="description" class="form-control"></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="images">image</label>
                                        <input type="file" name="image" id="image" class="filestyle" required  data-buttonname="btn-primary">
                                    </div>
                                    
                                   
                                    <div class="form-group col-md-6">
                                        <label for="images">product images</label>
                                        <input type="file" name="images[]" id="images" class="filestyle" required multiple data-buttonname="btn-primary">
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

@push('custom-css')
    <link href="{{ asset('assets_' . app()->getLocale() . '/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('custom-scripts')
    <script type="text/javascript" src="{{ asset('assets_' . app()->getLocale() . '/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_' . app()->getLocale() . '/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>

    <script>
        $("#itemProducts").addClass('active');

        $("select").select2({
            placeholder: "Select",
            width: 'auto',
            allowClear: true
        });

        $("#discountType").change(function () {
            if($(this).val() === '1') {
                $('.discount').removeClass('hide');
            } else {
                $('.discount').addClass('hide');
                $('#discount').val('');
                $('#discount_from').val('');
                $('#discount_to').val('');
            }
        });
    </script>
@endpush


