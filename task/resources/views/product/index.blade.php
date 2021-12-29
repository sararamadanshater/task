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
                                <li class="active">viewAll</li>
                            </ol>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            
                            
                            @include('layouts.messages')
                            <div class="table-responsive">
                                <table class="table table-striped" id="custom_tbl_dt">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align:center;">name</th>
                                        <th style="text-align:center;">slug</th>
                                        <th style="text-align:center;">description</th>
                                        <th style="text-align:center;">image</th>
                                        
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($products) > 0)
                                        @foreach($products as $key => $product)
                                            <tr class="gradeX {{ $product['id'] }}">
                                                <td style="text-align:center;">{{ $key + 1 }}</td>
                                                <td style="text-align:center;">{{ $product['name'] }}</td>
                                                <td style="text-align:center;">{{ $product['slug'] }}</td>
                                                <td style="text-align:center;">{{ $product['description'] }}</td>
                                                <td style="text-align:center;">
                                                    <img src="{{ $product['images'][0]['image'] }}" alt="{{ $product['name'] }}" width="150">
                                                </td>
                                                
                                                <td>
                                                    <a href="{{ route('products.show', $product['id']) }}" class="on-default"><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('products.edit', $product['id']) }}" class="on-default"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td class="actions">
                                                    <a  href="{{ route('products.delete', $product['id']) }}"  data-id="{{ $product['id'] }}" class="deletemsg" id="deleteParent"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9" style="text-align: center!important;">no product data :(</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info"><a href="{{route('products.create')}}">add product</a></button>
                </div>
            </div>
        </div>
    </div>

    

@endsection

@push('custom-css')
    <link href="{{ asset('assets_' . app()->getLocale() . '/plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets_' . app()->getLocale() . '/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
@endpush




