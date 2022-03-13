@extends('front.layouts.main')
@section('content')
<!--start top section-->
<div class="top__section about__bk">
    <div class="top__overlay"></div>
    <h3 class="top_title">{{$about->title}} </h3>
</div>

<!--start main wrapper section-->
<div class="main__wrapper__section">
    <div class="wrapper__des">
        <div class="container">
            <h3 class="main_brown_title"> {{$about->headLine}}</h3>
            <p class="main__des">
                {{$about->content}}
            </p>
        </div>
    </div>
     <!--start cv section-->
    <div class="cv__section">
        <div class="container">
            <h5 class="sub_title"> {{__('Curriculum Vitae')}}</h5>
            <!--cv 1-->
            @foreach ($lawyers as  $lawyer)
            <div class="cv__row__wrapper {{$loop->odd ? "reversed__row row"  : "row"}}">
                @if($loop->odd)
                <div class="col-12 col-lg-6">
                    <div class="cv__profile brown_before">
                        <img src="{{ $lawyer->image->image}}" alt="" class="img-fluid">
                    </div>
                </div>  
                @endif
                <div class="col-12 col-lg-6">
                    <div class="cv__info">
                        <h3 class="cv_title"> {{ $lawyer->name}}</h3>
                        <p class="cv_des">  {!! $lawyer->short_desc !!} 
                            </p>
                        <h4 class="degree_title">{{__('Certificates')}}</h4>
                        <ul class="degree_list">
                           {!! $lawyer->certificates !!}
                        </ul>
                       
                    </div>
                </div>
                @if($loop->even)
                <div class="col-12 col-lg-6">
                    <div class="cv__profile blue_before">
                        <img src="{{ $lawyer->image->image}}" alt="" class="img-fluid">
                    </div>
                </div>  
                @endif
                
               
            </div>
            @endforeach
        
        </div>
    </div>
    <!--start stats section-->
    <div class="stats__row__wrapper">
       <div class="container">
            <div class="row">
                <div class="stat__card col-12 col-md-6 col-lg-4">
                    <div class="feat__num">{{$setting->satisfied_customer}}</div>
                    <h5 class="feat__name"> {{__('satisfied customer')}}</h5>
                </div>
                <div class="stat__card col-12 col-md-6 col-lg-4">
                    <div class="feat__num">+{{$setting->completed_issues}}</div>
                    <h5 class="feat__name">{{__('completed issues')}} </h5>
                </div>
                <div class="stat__card col-12 col-md-6 col-lg-4">
                    <div class="feat__num">{{$setting->count_award}}</div>
                    <h5 class="feat__name">{{__('award')}}</h5>
                </div>
            </div>
       </div>
    </div>
    <!--start our goals section-->
    <div class="our_goals_section">
        <div class="container">
            <!--goals row-->
        <div class="cv__row__wrapper reversed__row row">
            <div class="col-12 col-lg-6">
                <div class="cv__info">
                    <div class="goals__wrap">
                        <h3 class="cv_title">{{__('Our Vision')}}</h3>
                        <p class="cv_des">{{$about->vision}}</p>
                    </div>
                    <div class="goals__wrap">
                        <h3 class="cv_title">{{__('Our Message')}}</h3>
                        <p class="cv_des">{{$about->our_message}}</p>
                    </div>
                    <div class="goals__wrap">
                        <h3 class="cv_title">{{__('Our Values')}}</h3>
                        <p class="cv_des">
                            {{$about->our_values}}
                               </p>
                    </div>    
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="cv__profile blue_before">
                    <img src="{{asset('front/img/c-3.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
@endsection