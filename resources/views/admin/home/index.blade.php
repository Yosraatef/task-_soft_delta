@extends('admin.layouts.table')


@section('content')
    <style>
        .content .small-box h3 {
            font-size: 30px;
        }

    </style>
    <?php
    $lang = App::getLocale();
    $text = 'text-left';
    $pull = 'pull-left';
    $pulll = 'pull-right';
    if ($lang == 'ar') {
        $text = 'text-right';
        $pull = 'pull-right';
        $pulll = 'pull-left';
    }
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('admin.admin') }}
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('admin') }}"><i class="fa fa-home"></i>
                    {{ trans('admin.home') }}</a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">

        <div class="row">
            @if (Session::has('message'))
                <div class="col-lg-12 col-xl-12">
                    <div class="alert alert-success alert-dismissible">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="chart-container"></div>
                <br>
            </div>
            <div class="row">
                @can('show_profile')
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="{{URL::to('admin/profile/')}}">
                                <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><br></span>
                                    <span class="info-box-text">{{__('my Profile')}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan
        

                @can('show_settings')
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="{{URL::to('admin/settings/1/edit')}}">
                                <span class="info-box-icon bg-red"><i class="fa fa-globe"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><br></span>
                                    <span class="info-box-text">{{__('Website settings')}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan


       


                @can('show_log')
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="{{URL::to('admin/log/')}}">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-tasks"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number">{{$log}}</span>
                                    <span class="info-box-text">{{__('System logs')}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan
              
          

                @can('show_admins')
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="{{URL::to('admin/admins')}}">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number">{{$admins}}</span>
                                    <span class="info-box-text">{{__('Admins')}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan

                @can('show_roles')
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="{{URL::to('admin/roles/')}}">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-key"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number">{{$roles}}</span>
                                    <span class="info-box-text">{{__('Roles')}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan


                <div class="col-12 col-md-4 col-lg-3">
                    <div class="info-box">
                        <a href="{{URL::to('admin/logout')}}">
                            <span class="info-box-icon bg-navy-active"><i class="fa fa-sign-out"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number"><br></span>
                                <span class="info-box-text">{{trans('admin.logout')}}</span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- /.content -->


@endsection
