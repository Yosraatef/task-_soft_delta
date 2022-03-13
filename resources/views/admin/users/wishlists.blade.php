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
        {{trans('admin.wishlist')}}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item active {{$pull}}">{{trans('admin.wishlist')}}</li>
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
                    <table id="example" class="table table-bwishlisted table-hover display nowrap margin-top-10 table-responsive">
                        <thead>
                            <tr>
                                <th class="{{$text}}">#</th>
                                <th class="{{$text}}">{{trans('admin.product')}}</th>
                                <th class="{{$text}}">{{trans('admin.product_desc')}}</th>
                                <th class="{{$text}}">{{trans('admin.price')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(count($wishlists) > 0)
                            @foreach($wishlists as $wishlist)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td style="vertical-align: middle;">{{$wishlist['product'][$lang.'_name']}}</td>
                                <td style="vertical-align: middle;">{{$wishlist['product'][$lang.'_desc']}}</td>
                                <td style="vertical-align: middle;">{{$wishlist['price_before_discount']}}</td>  
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
