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
                                <li class="active">view Supervisor</li>
                            </ol>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="m-b-10">
                                {{$supervisor['username']}}
                            </h3>
                            <h3 class="m-b-30">
                            {{$supervisor['email']}}
                            </h3>
                            <div class="row">
                                <div class="col-md-6 m-b-10">
                                    <p class="font-bold">Phone:</p>
                                    {{$supervisor['phone']}}
                                </div>
                                <div class="col-md-6 m-b-10">
                                    <p class="font-bold">password:</p>
                                    {{$supervisor['password']}}
                                </div>
                                <div class="col-md-6 m-b-10">
                                   <img src="{{$supervisor['avatar']}}" width="150" >
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

@endsection