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
                                <li class="active">viewProduct</li>
                            </ol>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="m-b-10">
                                {{ $product['name'] }}
                                ({{ $product->category['name'] }} 
                            </h3>
                            
                            <div class="row">
                                <div class="col-md-6 m-b-10">
                                    <p class="font-bold">description:</p>
                                    {{ $product['description'] }}
                                </div>
                                <div class="col-md-6 m-b-10">
                                    <p class="font-bold">slug:</p>
                                    {{ $product['slug'] }}
                                </div>
                                <div class="col-md-6 m-b-10">
                                    <p class="font-bold">image:</p>
                                    <img src="{{$product['image']}}" width="150">
                                </div>
                               
                                
                            </div>
                            @include('layouts.messages')
                            <div class="table-responsive">
                                <table class="table table-striped" id="custom_tbl_dt">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align:center;">image</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($product->images) > 0)
                                        @foreach($product->images as $key => $image)
                                            <tr class="gradeX {{ $image['id'] }}">
                                                <td style="text-align:center;">{{ $key + 1 }}</td>
                                                <td style="text-align:center;">
                                                    <img src="{{ $image['image'] }}" alt="{{ $product['name'] }}" width="150">
                                                </td>
                                                <td class="actions">
                                                    <a data-id="{{ $image['id'] }}" class="deletemsg" id="deleteParent"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" style="text-align: center!important;">noElements</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" class="deleteForm">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('custom-scripts')
    <script src="{{ asset('assets_' . app()->getLocale() . '/plugins/bootbox/bootbox.min.js') }}"></script>
    <script>
        $("#itemProducts").addClass('active');
        let body = $('body');

        body.on('click', '.deletemsg', function () {
            const id = $(this).attr('data-id');

            bootbox.dialog({
                message: "@lang('dashboard.askDelete')",
                title: "@lang('dashboard.deleteMessage')",
                buttons: {
                    danger: {
                        label: "@lang('dashboard.cancel')",
                        className: "btn-danger"
                    },
                    main: {
                        label: "@lang('dashboard.delete')",
                        className: "btn-primary",
                        callback: function () {
                            let deleteForm = $(".deleteForm");
                            deleteForm.attr('action', "images/" + id);
                            deleteForm.submit();
                        }
                    }
                }
            });
        });
    </script>
@endpush


