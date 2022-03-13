@extends('admin.layouts.table')

@section('content')
<?php
$lang = App::getLocale();
$text = "text-left";
$pull = "float-left";
$pulll = "float-right";
if ($lang == "ar") {
    $text = "text-right";
    $pull = "float-right";
    $pulll = "float-left";
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{trans('admin.orders')}}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item active {{$pull}}">{{trans('admin.orders')}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12" id="active_response">

                </div>
            </div>

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

            @if (Session::has('error'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible">
                        {{ Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            @endif

            <div class="box">

                <div class="box-body" style="overflow-x:auto;">
                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                        <thead>
                            <tr>
                                <th class="{{$text}}">{{trans('admin.order_id')}}</th>
                                <th class="{{$text}}">{{trans('admin.user_id')}}</th>
                                <th class="{{$text}}">{{trans('admin.username')}}</th>
                                <th class="{{$text}}">{{trans('admin.phone')}}</th>
                                <th class="{{$text}}">{{trans('admin.order_time')}}</th>
                                <th class="{{$text}}">{{trans('admin.order_date')}}</th>
                                <th class="{{$text}}">{{trans('admin.total')}}</th>
                                <th class="{{$text}}">{{trans('admin.orders_details')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(count($orders) > 0)
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->id}}</td>
                                <td>{{$order['user'][$lang.'_name']}}</td>
                                <td>{{$order->user->phone}}</td>
                                <td>{{$order->created_at->format('H:i:s')}}</td>
                                <td>{{$order->created_at->format('Y-m-d')}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>
                                    {{ Form::open(array('url' =>'admin/orders/'.$order->id.'/edit', 'method' => 'GET')) }}
                                    <button type="submit" class="btn default btn-sm bg-purple"><i class="fa fa-edit"></i> {{trans('admin.edit')}} </button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
