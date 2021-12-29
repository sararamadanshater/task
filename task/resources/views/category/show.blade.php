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
                                <li class="active">view Category</li>
                            </ol>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    

@endsection

@push('custom-css')
    <link href="{{ asset('assets_' . app()->getLocale() . '/plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets_' . app()->getLocale() . '/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
@endpush




