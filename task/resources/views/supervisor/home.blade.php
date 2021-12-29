@extends('layout')
@section('content')
    <div class="">
        <div class="">
            <!-- Start content -->
            <div class="">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Admin Dashboard</h4>
                            <ol class="breadcrumb">
                                <li><a href="">supervisor</a></li>
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
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                        <th>#</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">Slug</th>
                                        <th style="text-align:center;">Image</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @if(count($categories) > 0)
                                        @foreach($categories as $key => $category)
                                        <tr class="gradeX {{ $category['id'] }}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$category->id}}"></td>
                                            <td style="text-align:center;">{{ $key + 1 }}</td>
                                            <td style="text-align:center;">{{$category['name']}}</td>
                                            <td style="text-align:center;">{{ $category['slug'] }}</td>
                                            
                                            <td style="text-align:center;">
                                                <img src="{{ $category['icon'] }}" alt="{{$category['name'] }}" width="150" height="150">
                                            </td>
                                           
                                            <td>
                                                <a href="{{ route('categories.show', $category['id']) }}" class="on-default"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('categories.edit', $category['id']) }}" class="on-default"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td class="">
                                                <a href="{{ route('categories.delete', $category['id']) }}" data-id="{{ $category['id'] }}" class="deletemsg" id="deleteParent"><i class="fa fa-trash-o"></i></a>
                                                
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" style="text-align: center!important;">no categories data</td>
                                        </tr>
                                    @endif
                                    </tbody>
                               
                                </table>

                               
                            </div>
                            
                        </div>
                        
                    </div>
                      <button class="btn btn-info"><a href="{{route('categories.create')}}">add category</a></button>
                      <button class="btn btn-info"><a href="{{route('products.index')}}">all products</a></button>
                </div>
                
            </div>
        </div>
    </div>

   
    @endsection 
    






