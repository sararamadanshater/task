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
                                <li class="active">editProduct</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                @include('layouts.messages')
                                <form method="POST" action="{{ route('products.update', $product['id']) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group col-md-6">
                                        <label for="category">category</label>
                                        <select id="category" name="category" required class="form-control">
                                            @foreach($categories as $category)
                                                <option {{ $category['id'] == $product['category_id'] ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" required placeholder="name" class="form-control" value="{{ $product['name'] }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="slug">slug</label>
                                        <input id="slug" type="text" name="slug" required placeholder="slug" class="form-control" value="{{ $product['slug'] }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">description</label>
                                        <textarea id="description" name="description" required placeholder="description" class="form-control">{{ $product['description'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">image</label>
                                        edit?
                                        <img src="{{ $product['image'] }}" width="150" height="100" />
                                        <input type="file" name="image" id="image" class="filestyle"  data-buttonname="btn-primary">
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">images</label>
                                        @if(count($product->images) > 0)
                                            @foreach($product->images as $key => $image)
                                                <tr class="gradeX {{ $image['id'] }}">
                                                    <td style="text-align:center;">
                                                        <img src="{{ $image['image'] }}" alt="{{ $product['name'] }}" width="150">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                            <input type="file" name="images[]" id="images" class="filestyle" required multiple data-buttonname="btn-primary">
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




