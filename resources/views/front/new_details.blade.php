
    @extends('front.layouts.main')
    @section('content')

    <!--start top section-->
    <div class="top__section service__bk">
        <div class="top__overlay"></div>
        <h3 class="top_title">{{__('New details')}}</h3>
    </div>

    <!--start services details wrapper-->
    <div class="p__150">
        <div class="container">
            <div class="service_details_card">
                <div class="det__thumb">
                    <img src="{{asset($new->image->image)}}" alt="" class="img-fluid">
                </div>
                <div class="det_body">
                    <h3 class="det_title">{{$new->title}} </h3>
                    <p class="det__des">   {!! $new->content !!}</p>
                </div>
            </div>
        </div>
    </div>

   @endsection
