@extends('admin.layouts.table')

@section('content')
<?php
$lang = App::getLocale();
$text = "text-left";
$pull = "pull-left";
$datatable = 'example';
if ($lang == "ar") {
    $text = "text-right";
    $pull = "pull-right";
    $datatable = 'example_ar';
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{__('System logs')}}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item active {{$pull}}">  {{__('System logs')}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            @if (Session::has('message'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        {{ Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            @endif

            <div class="box">
                <div class="box-body">
                    <table id="{{$datatable}}" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                        <thead>
                            <tr>
                                <th class="{{$text}}">#</th>
                                <th class="{{$text}}" style="width: 15%;">{{trans('admin.name')}}</th>
                                <th class="{{$text}}" style="width: 20%;">{{trans('admin.date')}}</th>
                                <th class="{{$text}}" style="width: 15%;">IP</th>
                                <th class="{{$text}}">{{__('Operation')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($actions as $action)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if (isset($action['User']))


                                    {{optional($action->user)['name']}}

                                    @endif
                                </td>
                                <td>{{$action['created_at']}}</td>
                                <td>{{$action['ip']}}</td>
                                <td>{{$action['action']}}</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
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
