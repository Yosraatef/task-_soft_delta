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
        {{__('Users')}}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{$pull}}"><a href="{{URL::to('admin')}}"> {{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item active {{$pull}}"> {{__('Users')}}</li>
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
                    <a href="{{URL::to('admin/users/create')}}" class="btn btn-lg bg-black">{{__('Add new user')}}</a>
                    {{-- <button type="button" data-toggle="modal" data-target="#Modal" class="btn btn-lg bg-black">{{trans('admin.delete_all')}}</button> --}}
                </div>
                <div class="box-body table-responsive">
                    <table id="{{$datatable}}" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                        <thead>
                            <tr>
                                <th class="{{$text}}">#</th>
                                <th class="{{$text}}">{{trans('admin.name')}}</th>
                                <th class="{{$text}}">{{trans('admin.email')}}</th>
                                <th class="{{$text}}">{{trans('admin.phone')}}</th>
{{--                                <th class="{{$text}}">{{trans('admin.active')}}</th>--}}
                                 <th class="{{$text}}">{{__('No of orders')}}</th>
                                <th class="{{$text}}">{{__('No of bookings')}}</th>
                                {{-- <th class="{{$text}}">{{trans('admin.birth_date')}}</th> --}}
                                <th class="{{$text}}">{{trans('admin.edit')}}</th>
                                <th class="{{$text}}">{{trans('admin.delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($users as $user)
                            <tr>
                                <td style="vertical-align: middle;">{{$i}}</td>
                                <td style="vertical-align: middle;">{{$user['name']}}</td>
                                <td style="vertical-align: middle;">{{$user['email']}}</td>
                                <td style="vertical-align: middle;" dir="ltr" class="{{$text}}">{{$user['phone']}}</td>
                                <td style="vertical-align: middle;"><span style="margin-right: 10px;"
                                                                          class="label label-info">{{$user->orders_count ?? 0}}</span>
                                </td>
                                <td style="vertical-align: middle;"><span style="margin-right: 10px;"
                                                                          class="label label-info">{{$user->bookings_count ?? 0}}</span>
                                </td>
{{--                                <td style="vertical-align: middle;">--}}
{{--                                    <label class="switch" style="margin-bottom: 0;">--}}
{{--                                        @if($user['active'] == 'yes')--}}
{{--                                        <input class="switch_active" page='users' id="{{$user['id']}}" type="checkbox" checked="">--}}
{{--                                        @else--}}
{{--                                        <input class="switch_active" page='users' id="{{$user['id']}}" type="checkbox">--}}
{{--                                        @endif--}}
{{--                                        <span class="slider"></span>--}}
{{--                                    </label>--}}
{{--                                </td>--}}
                                {{-- <td><img style="hight:120px;width:120px;margin:5px;" src="{{ asset('upload/users/' . $user->image_profile) }}"></td> --}}
{{--                                <td>--}}
{{--                                    @if(isset($user->gender))--}}
{{--                                    {{$user->gender}}--}}
{{--                                    @else--}}

{{--                                    @endif--}}
{{--                                  </td>--}}
                                  {{-- <td>
                                    @if(isset($user->birth_date))
                                    {{$user->birth_date}}
                                    @else

                                    @endif
                                  </td> --}}
                                <td style="vertical-align: middle;">
                                    {{ Form::open(array('url' =>'admin/users/'.$user->id.'/edit', 'method' => 'GET')) }}
                                    <button  type="submit" class="btn default btn-sm btn-success"><i class="fa fa-edit"></i> {{trans('admin.edit')}} </button>
                                    {{ Form::close() }}
                                </td>
                                <td style="vertical-align: middle;">
                                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button class="btn default btn-sm bg-red" onclick="return confirm('Are you sure you want to delete this item?');">{{trans('admin.delete')}}</button>

                                    </form>

                                </td>
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


<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::open(array('url' =>'admin/delete_all/users', 'method' => 'POST')) }}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{trans('admin.delete_all')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select id="ids" name="ids[]" class="form-control select2" multiple="multiple" data-placeholder="{{trans('admin.delete_all')}}" style="width: 100%;" required="">
                    @foreach($users as $one)
                    <option value="{{$one['id']}}">{{$one['first_name'].' '.$one['last_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button  type="submit" class="btn btn-primary {{$pull}}">{{trans('admin.confrim')}} </button>
                <button type="button" class="btn btn-danger {{$pulll}}" data-dismiss="modal">{{trans('admin.cancel')}}</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
