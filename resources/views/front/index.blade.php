@extends('front.layouts.main')
@section('content')
  <!--start slider section-->
  @include('front.layouts.slider')
  <!--start about section-->
  <div class="about__section">
    <div class="row">
        <div class="col-12 col-lg-5">
            <div class="about__thumb">
                <img src="{{asset('front/img/about.png')}}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <div class="about__info">
                <h3 class="about_title"> {{$setting->title_first_section}} </h3>
                 {!! $setting->text_first_section !!}
                <a href="{{route('front.about')}}" class="main__btn show__more"> {{__('Read More')}}</a>
            </div>
        </div>
    </div>
</div>
@if(!empty($services) && $services->count())
<!--start services section-->
<div class="services__section">
    <div class="container">
        <h3 class="main_title color_white">{{__('Our services')}}</h3>
        <div class="row">
            @foreach ($services as $service )
            <div class="col-12 col-md-6 col-lg-4">
                <div class="service_card wow flash" data-wow-duration="1s" data-wow-offset="200">
                    <div class="service_thumb">
                        <img src="{{optional($service->iconBrown)->image}}" alt="">
                    </div>
                    <a href="{{route('front.service_details',$service->id)}}" class="service_title"> {{$service->title}}    </a>
                    <p class="service_des">{{$service->short_desc}}</p>
                </div>
            </div>
            @endforeach


        </div>
        <a href="{{route('front.services')}}" class="more__link">{{__('more')}} <i class="fa fa-long-arrow-left"></i></a>
    </div>
</div>
@endif
 <!--start features section-->
 <div class="features__section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="feature__info">
                    <h3 class="side_title">{{$setting->title_third_section}}</h3>
                    <h5 class="sub_title">{{__('Quality of legal services')}}</h5>
                    <ul class="features__list">
                        {!! $setting->text_third_section  !!}
                    </ul>
                    <div class="features__stats">
                        <div class="feat__card">
                            <div class="feat__num">{{ $setting->satisfied_customer }}</div>
                            <h5 class="feat__name">{{ __('satisfied customer')}}</h5>
                        </div>
                        <div class="feat__card">
                            <div class="feat__num">+ {{ $setting->completed_issues }}</div>
                            <h5 class="feat__name">{{__('completed issues')}}</h5>
                        </div>
                        <div class="feat__card">
                            <div class="feat__num">{{$setting->count_award}}</div>
                            <h5 class="feat__name">{{__('award')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature__thumb">
                <div class="feature_overlay"></div>
                <img src="{{asset('front/img/build_new.png')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
 </div>
 @if(!empty($news) && $news->count())
<!--start news section-->
 <div class="news__section">
     <div class="container">
         <h3 class="main_title mb__88">{{__('Publications and Articles')}}</h3>
         <div class="row">
             @foreach ($news as $new )
             <div class="col-12 col-md-6 col-lg-4">
                <div class="news__card">
                    <a class="news__thumb" href="{{route('front.new_details' , $new->id)}}">
                        <div class="thumb_overlay"></div>
                        <img src="{{$new->image->image}}" alt="" class="img-fluid">
                    </a>
                    <div class="news__body">
                        <h5 class="news_date">{{$new->created_at->format('d/m/Y')}}</h5>
                        <a href="{{route('front.new_details' , $new->id)}}" class="news_title">  {{$new->title}}   </a>
                        <p class="news_des">    {!! Str::words($new->content, 40) !!}   </p>
                        <a href="{{route('front.new_details' , $new->id)}}" class="read__more"> {{__('Read More')}} <i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                    </div>
                </div>
             </div>
             @endforeach


         </div>
     </div>
 </div>
 @endif
@endsection
