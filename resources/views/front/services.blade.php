@extends('front.layouts.main')
@section('content')

    <!--start top section-->
    <div class="top__section service__bk">
        <div class="top__overlay"></div>
        <h3 class="top_title">{{__('Our services')}}</h3>
    </div>

    <!--start services wrapper-->
    <div class="services__wrapper">
        <div class="container">
            <div class="row">
                @if(!empty($services) && $services->count())
                    @foreach($services as $service)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="services__card">
                                <a class="services__thumb" href="{{route('front.service_details',$service->id)}}">
                                    <div class="thumb_overlay"></div>
                                    <img src="{{asset(optional($service->image)->image)}}" alt=""
                                         class="img-fluid img__thumb">
                                    <span class="services__icon">
                                <img src="{{asset(optional($service->iconWhite)->image)}}" alt="">
                            </span>
                                </a>
                                <div class="services__body">
                                    <a href="{{route('front.service_details',$service->id)}}"
                                       class="services__title">{{$service->title}}</a>
                                    <p class="services_des"> {{$service->short_desc}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center" style="margin-bottom: 40px">{!! $services->links() !!}</div>
        </div>
    </div>
@endsection
