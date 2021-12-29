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
                            <button class="btn btn-info"> <a href="{{ route('supervisors.delete.all') }}"  class="deletemsg" id="deleteParent" >Delete all products</a></button>
                             <!-- <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('supervisorDeleteAll') }}">Delete All Selected</button> -->
                            <div class="table-responsive">
                                <table class="table table-striped" id="custom_tbl_dt">
                                    <thead>
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                        <th>#</th>
                                        <th style="text-align:center;">UserName</th>
                                        <th style="text-align:center;">Phone</th>
                                        <th style="text-align:center;">Email</th>
                                        <th style="text-align:center;">Avatar</th>
                                        <th style="text-align:center;">Password</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @if(count($supervisors) > 0)
                                        @foreach($supervisors as $key => $supervisor)
                                        <tr class="gradeX {{ $supervisor['id'] }}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$supervisor->id}}"></td>
                                            <td style="text-align:center;">{{ $key + 1 }}</td>
                                            <td style="text-align:center;">{{$supervisor['username']}}</td>
                                            <td style="text-align:center;">{{ $supervisor['phone'] }}</td>
                                            <td style="text-align:center;">{{ $supervisor['email'] }}</td>
                                            <td style="text-align:center;">
                                                <img src="{{ $supervisor['avatar'] }}" alt="{{$supervisor['user'] }}" width="150" height="150">
                                            </td>
                                            <td style="text-align:center;">{{ $supervisor['password'] }}</td>
                                            <td>
                                                <a href="{{ route('supervisor.show', $supervisor['id']) }}" class="on-default"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('supervisor.edit', $supervisor['id']) }}" class="on-default"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td class="actions">
                                                <a href="{{ route('supervisor.destroy', $supervisor['id']) }}" data-id="{{ $supervisor['id'] }}" class="deletemsg" id="deleteParent" ><i class="fa fa-trash-o"></i></a>
                                                
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" style="text-align: center!important;">no supervisors data</td>
                                        </tr>
                                    @endif
                                    </tbody>
                               
                                </table>

                               
                            </div>
                            
                        </div>
                        
                    </div>
                      <button class="btn btn-info"><a href="{{route('supervisor.create')}}">add supervisor</a></button>

                </div>
                
            </div>
        </div>
    </div>

   
    @endsection 
    

<script type="text/javascript">

    $(document).ready(function () {


        $('#master').on('click', function(e) {

        if($(this).is(':checked',true))  

        {

            $(".sub_chk").prop('checked', true);  

        } else {  

            $(".sub_chk").prop('checked',false);  

        }  

        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  

            $(".sub_chk:checked").each(function() {  

                allVals.push($(this).attr('data-id'));

            });  


            if(allVals.length <=0)  

            {  

                alert("Please select row.");  

            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  

                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({

                        url: $(this).data('url'),

                        type: 'DELETE',

                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        data: 'ids='+join_selected_values,

                        success: function (data) {

                            if (data['success']) {

                                $(".sub_chk:checked").each(function() {  

                                    $(this).parents("tr").remove();

                                });

                                alert(data['success']);

                            } else if (data['error']) {

                                alert(data['error']);

                            } else {

                                alert('Whoops Something went wrong!!');

                            }

                        },

                        error: function (data) {

                            alert(data.responseText);

                        }

                    });


                $.each(allVals, function( index, value ) {

                    $('table tr').filter("[data-row-id='" + value + "']").remove();

                });

                }  

            }  

        });


        $('[data-toggle=confirmation]').confirmation({

            rootSelector: '[data-toggle=confirmation]',

            onConfirm: function (event, element) {

                element.trigger('confirm');

            }

        });


        $(document).on('confirm', function (e) {

            var ele = e.target;

            e.preventDefault();


            $.ajax({

                url: ele.href,

                type: 'DELETE',

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success: function (data) {

                    if (data['success']) {

                        $("#" + data['tr']).slideUp("slow");

                        alert(data['success']);

                    } else if (data['error']) {

                        alert(data['error']);

                    } else {

                        alert('Whoops Something went wrong!!');

                    }

                },

                error: function (data) {

                    alert(data.responseText);

                }

            });


            return false;

        });

    });

</script>




