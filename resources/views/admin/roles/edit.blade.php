@extends('admin.layouts.form')
{{--@inject('permission','Spatie\Permission\Models\Permission')--}}
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
            {{__('Roles')}}
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
            <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin/roles')}}">   {{__('Roles')}}</a></li>
            <li class="breadcrumb-item active {{$pull}}">{{__('Role edit')}}</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('Role edit')}} : {{$role['name']}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <form action="{{URL::to('admin/roles/'.$role['id'])}}" method="post" enctype="multipart/form-data">
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


                                <div class="form-group row">
                                    <label for="name[ar]" class="col-sm-3 col-form-label">{{__('Name in arabic')}}</label>
                                    <div class="col-sm-9">
                                        {{ Form::text('name[ar]', $role->getOriginal('name')['ar'], ['class'=>'form-control','id'=>'name[ar]']) }}
                                        @error('name'.'.'.'ar')
                                        <div
                                            class="alert alert-danger">{{$message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name[en]" class="col-sm-3 col-form-label">{{__('Name in english')}}</label>
                                    <div class="col-sm-9">
                                        {{ Form::text('name[en]', $role->getOriginal('name')['en'], ['class'=>'form-control','id'=>'name[en]']) }}
                                        @error('name'.'.'.'en')
                                        <div
                                            class="alert alert-danger">{{$message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            <h3>{{__('Permissions')}}</h3>
                            <div class="row" style="padding-right: 15px;">
                                @foreach($permission as $value)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">

                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'col-sm-3')) }}
                                                <label class="form-check-label" for="{{$value}}" style="height: 10px;"></label>
                                                {{ str_replace('_' , ' ',__($value->name)) }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" onclick="submitForm(this);" class="btn btn-primary btn-lg"
                            style="font-size: 16px;">{{trans('admin.save')}}</button>
                    <a href="{{URL::to('admin/roles')}}" class="btn btn-default btn-lg"
                       style="font-size: 16px;">{{trans('admin.back')}}</a>
                </div>

            </form>

        </div>

    </section>

@endsection
