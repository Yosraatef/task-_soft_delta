@extends('admin.layouts.form')

@section('content')
    <?php
    $lang = App::getLocale();
    $text = "text-left";
    $pull = "pull-left";
    if ($lang == "ar") {
        $text = "text-right";
        $pull = "pull-right";
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{__('Supervisors')}}
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
            <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin/admins')}}">  {{__('Supervisors')}}</a>
            </li>
            <li class="breadcrumb-item active {{$pull}}">{{__('Edit supervisor')}}</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('Edit supervisor')}} : {{$admin['name']}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <form action="{{URL::to('admin/admins/'.$admin['id'])}}" method="post" enctype="multipart/form-data">
                {{ Form::hidden('_method','PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="row">
                        <div class="col-12">
                            @if (Session::has('message'))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-success alert-dismissible">
                                            {{ Session::get('message')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{--                            <div class="form-group row">--}}
                            {{--                                <label for="active" class="col-sm-3 col-form-label">{{trans('admin.active')}}</label>--}}
                            {{--                                <div class="col-sm-9">--}}
                            {{--                                    {{ Form::select('active', ['yes'=>trans('admin.yes_active') , 'no'=>trans('admin.no_active')],$admin['active'], ['class'=>'form-control select2','id'=>'active']) }}--}}
                            {{--                                    @if($errors->has('active'))--}}
                            {{--                                        <div class="alert alert-danger">{{$errors->first('active')}}</div>--}}
                            {{--                                    @endif--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                        <div class="form-group row">--}}
                            {{--                            <label for="group_id" class="col-sm-3 col-form-label">{{trans('admin.group')}}</label>--}}
                            {{--                            <div class="col-sm-9">--}}
                            {{--                                {{ Form::select('group_id', $groups,$admin['group_id'], ['class'=>'form-control select2','id'=>'group_id']) }}--}}
                            {{--                                @if($errors->has('group_id'))--}}
                            {{--                                <div class="alert alert-danger">{{$errors->first('group_id')}}</div>--}}
                            {{--                                @endif--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">{{__('Name')}}</label>
                                <div class="col-sm-9">
                                    {{ Form::text('name', $admin->name, ['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">{{trans('admin.email')}}</label>
                                <div class="col-sm-9">
                                    {{ Form::text('email', $admin['email'], ['class'=>'form-control','id'=>'email']) }}
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-sm-3 col-form-label">{{trans('admin.password')}}</label>
                                <div class="col-sm-9">
                                    {{ Form::input('password','password', null, ['class'=>'form-control','id'=>'password']) }}
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">{{trans('admin.phone')}}</label>
                                <div class="col-sm-9">
                                    {{ Form::text('phone', $admin['phone'], ['class'=>'form-control','id'=>'phone']) }}
                                    @if($errors->has('phone'))
                                        <div class="alert alert-danger">{{$errors->first('phone')}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roles" class="col-sm-3 col-form-label">{{__('Roles')}}</label>
                                <div class="col-sm-9">

                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control select2','multiple','data-placeholder' => __('Choose Role'))) !!}
                                    @if($errors->has('roles'))
                                        <div class="alert alert-danger">{{$errors->first('roles')}}</div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" onclick="submitForm(this);" class="btn btn-primary btn-lg"
                            style="font-size: 16px;">{{__('Save updates')}}</button>
                    <a href="{{URL::to('admin/admins')}}" class="btn btn-default btn-lg"
                       style="font-size: 16px;">{{trans('admin.back')}}</a>
                </div>

            </form>

        </div>

    </section>

@endsection
