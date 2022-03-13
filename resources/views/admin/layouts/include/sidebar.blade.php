<?php

use Illuminate\Support\Facades\Auth;

$lang = App::getLocale();
$float = 'right';
if ($lang == 'en') {
    $float = 'left';
}
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" dir="{{ $dir }}">
        <!-- Sidebar user panel -->
        <div class="user-panel"
             style="background-image:url('{{ url('front/img/about.png') }}'); background-size: 100% 100%; padding-top: 120px; height: 170px;">

            <div class="clearfix"></div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" style="padding-bottom: 50px;">

            <li class="___class_+?5___">
                <a href="{{ URL::to('lang') }}">
                    <i class="fa fa-language"></i>
                    @if ($lang == 'ar')
                        <span>English Version</span>
                    @else
                        <span>النسخة العربية</span>
                    @endif
                </a>
            </li>
            @foreach (sidebar() as $key=> $row)
                @if ($key == 'spliter')
                    <hr style="background: #fff;">
                @else
                    @if (isset($row['childs']) &&  isset($row['role']))
                        @can($row['role'])
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa {{$row['icon']}}"></i>
                                    <span>{{ $row['title'] }}</span>
                                    <span class="pull-{{ $arrow }}-container">
                                        <i class="fa fa-angle-{{ $arrow }} pull-{{ $arrow }}"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    @foreach ($row['childs'] as $child)
                                        <li>
                                            <a href="{{ $child['url'] }}">
                                                <i class="fa fa-circle-o"></i>
                                                {{ $child['title'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endcan
                    @else
                        @can($row['role'])
                            <li class="___class_+?13___">
                                <a href="{{ $row['url'] }}">
                                    <i class="fa {{ $row['icon'] }}"></i>
                                    <span>{{ $row['title'] }}</span>
                                </a>
                            </li>
                        @endcan
                    @endif
                @endif
            @endforeach
            <hr style="background: #fff;">
            <li class="___class_+?15___">
                <a href="{{ URL::to('admin/logout') }}">
                    <i class="fa fa-sign-out"></i>
                    <span>{{ trans('admin.logout') }}</span>
                </a>
            </li>
        </ul>
    </section>

    <!-- /.sidebar -->
    <div class="sidebar-footer">
        <!-- item-->
        @can('show_settings')
            <a href="{{ URL::to('admin/settings/1/edit') }}" class="link" data-toggle="tooltip" title=""
               data-original-title="{{ trans('admin.site') }}"><i class="fa fa-cog fa-spin"></i></a>
        @endcan
    <!-- item-->
        @can('show_contacts')
            <a href="{{ URL::to('admin/contact') }}" class="link" data-toggle="tooltip" title=""
               data-original-title="{{ trans('admin.contact') }}"><i class="fa fa-envelope"></i></a>
    @endcan
    <!-- item-->
        <a href="{{ URL::to('admin/logout') }}" class="link" data-toggle="tooltip" title=""
           data-original-title="{{ trans('admin.logout') }}"><i class="fa fa-power-off"></i></a>
    </div>

</aside>

