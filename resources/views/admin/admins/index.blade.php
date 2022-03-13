@extends('admin.layouts.table')

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
            {{__('Supervisors')}}
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
            <li class="breadcrumb-item active {{$pull}}"> {{__('Supervisors')}}</li>
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
                    <div class="box-header">
                        <a href="{{URL::to('admin/admins/create')}}"
                           class="btn btn-lg bg-black">{{__('Add supervisor')}}</a>
                    </div>
                    <div class="box-body">
                        <table id="{{$datatable}}"
                               class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                            <thead>
                            <tr>
                                <th class="{{$text}}">#</th>
                                <th class="{{$text}}">{{trans('admin.name')}}</th>
                                <th class="{{$text}}">{{trans('admin.email')}}</th>
                                <th class="{{$text}}">{{trans('admin.phone')}}</th>
                                <th class="{{$text}}">{{__('Role')}}</th>
                                <th class="{{$text}}">{{__('Active')}}</th>
                                <th class="{{$text}}">{{trans('admin.edit')}}</th>
                                <th class="{{$text}}">{{trans('admin.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td style="vertical-align: middle;">{{$loop->iteration}}</td>
                                    <td style="vertical-align: middle;">{{$admin->name}}</td>
                                    <td style="vertical-align: middle;">{{$admin['email']}}</td>
                                    <td style="vertical-align: middle;" dir="ltr"
                                        class="{{$text}}">{{$admin['phone']}}</td>
                                    <td style="vertical-align: middle;" dir="ltr"
                                        class="{{$text}}">
                                        @foreach($admin->roles as $role)
                                            <h4><span class="label label-info">{{$role->name}}</span></h4>
                                        @endforeach
                                    </td>
                                    <td style="vertical-align: middle;">
                                        @if($admin['id'] != Auth::User()->id)
                                            <label class="switch" style="margin-bottom: 0;">
                                                @if($admin['status'] == 1)
                                                    <input class="switch_active" page='admins' id="{{$admin['id']}}"
                                                           type="checkbox" checked="">
                                                @else
                                                    <input class="switch_active" page='admins' id="{{$admin['id']}}"
                                                           type="checkbox">
                                                @endif
                                                <span class="slider"></span>
                                            </label>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::open(array('url' =>'admin/admins/'.$admin->id.'/edit', 'method' => 'GET')) }}
                                        <button type="submit" class="btn default btn-md btn-info"><i
                                                class="fa fa-edit"></i> {{trans('admin.edit')}} </button>
                                        {{ Form::close() }}
                                    </td>
                                    @if($admin->id == 1)
                                        <td class="text text-danger">{{__('Can not delete')}}</td>
                                    @else
                                        <td style="vertical-align: middle;">
                                            <form action="{{route('admins.destroy',$admin->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">{{trans('admin.delete')}}</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
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


    {{--    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
    {{--         aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            {{ Form::open(array('url' =>'admin/delete_all/admins', 'method' => 'POST')) }}--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title">{{trans('admin.delete_all')}}</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <select id="ids" name="ids[]" class="form-control select2" multiple="multiple"--}}
    {{--                            data-placeholder="{{trans('admin.delete_all')}}" style="width: 100%;" required="">--}}
    {{--                        @foreach($admins as $one)--}}
    {{--                            @if($one['id'] != Auth::User()->id)--}}
    {{--                                <option value="{{$one['id']}}">{{$one['first_name'].' '.$one['last_name']}}</option>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                    </select>--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <button type="submit" class="btn btn-primary {{$pull}}">{{trans('admin.confrim')}} </button>--}}
    {{--                    <button type="button" class="btn btn-danger {{$pulll}}"--}}
    {{--                            data-dismiss="modal">{{trans('admin.cancel')}}</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            {{ Form::close() }}--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
