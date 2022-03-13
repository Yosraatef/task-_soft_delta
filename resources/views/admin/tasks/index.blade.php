@extends('admin.layouts.table')
@section('styles')
<link href="{{URL::to('admin_panel')}}/css/all.min.css" rel="stylesheet">

@endsection
@section('content')
<?php
$lang = App::getLocale();
$text = "text-left";
$pull = "float-left";
$pulll = "float-right";
$datatable = 'example';
if ($lang == "ar") {
    $text = "text-right";
    $pull = "float-right";
    $pulll = "float-left";
    $datatable = 'example_ar';
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{__('Tasks')}}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item active {{$pull}}"> {{__('Tasks')}}</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12" id="active_response">

                </div>
            </div>

          
            <div id="success_message"></div>

           

            <div class="box">
                <div class="box-header">
                  
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">{{__('Add new Task')}}</button>
                
        <div class="collapse" id="collapseExample" >
  
            <div class="modal-body">
                <ul id="save_msgList"></ul>
                <form id="formAdd"> 
                    <div class="row">
                        <div class="col-6 rw">
                           
                            <label>Assign to</label>
                              <select class="user_id form-control" name="user_id">
                                @foreach ($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                              </select>
                         
                        </div>
    
                        <div class="col-6 rw">
                            <label>Deliver Date</label>
                            <input name="date" type="date" class="date form-control" />
                        </div>
    
                        <div class="col-9 rw">
                            <label>Description</label>
                            <textarea name="description" rows = "2" class="description form-control"></textarea>
                        </div>
    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add_task">Save</button>
            </div>

       
    
</div>
<!-- Main content -->
                </div>
                <div class="box-body table-responsive">
                    <table id="{{$datatable}}" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                        <thead>
                            <tr>
                                <th class="{{$text}}">#</th>
                                <th class="{{$text}}">Name</th>
                                <th class="{{$text}}">Description</th>
                                <th class="{{$text}}">Date</th>
            
                                <th class="{{$text}}">Make Done</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                        </tbody>

                    </table>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection
@section('scripts')

<script>
    $(document).ready(function () {
        $.ajaxSetup({
                 headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

        fetchtask();

        function fetchtask() {
            $.ajax({
                type: "GET",
                url: "/admin/fetch-tasks",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.tasks, function (key, item) { 
                        var checked = "";
                        if(item.done == 1){
                            checked = "checked" ;
                        }
                        $('tbody').append(`<tr>
                            <td> ${item.id}</td>
                            <td> ${item.user_name}</td>
                            <td> ${item.description}</td>
                            <td> ${item.date}</td>
                            <td><input  name="done" class="form-check-input done" ${checked} type="checkbox" id="gridCheck_${item.id}" value="${item.id}"> <label class="form-check-label" for="gridCheck_${item.id}">Check me out</label> </td>\
                        </tr>`);
                    });
                    $('input[name="done"]').change(function() {
                         
                            $.ajax({
                                type: "POST",
                                url: '/admin/tasks/done/'+ $(this).val(),
                                dataType: "json",
                                success: function (response) {
                                    console.log(response);
                                    if (response.status == 400) {
                                        $('#success_message').addClass('alert alert-success');
                                        $('#success_message').text(response.message);
                                    } else {
                                        $('#success_message').addClass('alert alert-success');
                                        $('#success_message').text(response.message);
                                    }
                                }
                            });
                        
                    });
                }
            });
        }
 

        $(document).on('click', '.add_task', function (e) {
            e.preventDefault();

            $(this).text('Sending..');

            var data = {
                'user_id': $('.user_id').val(),
                'date': $('.date').val(),
                'description': $('.description').val(),
                
            }

            $.ajax({
                type: "POST",
                url: "/admin/tasks",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_task').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#save_msgList').removeClass('alert alert-danger');
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#formAdd')[0].reset()
                        $('.add_task').text('Save');
                        fetchtask();
                    }
                }
            });
        });

       

      
    });

</script>
@endsection