@extends('front.layouts.main')
@section('content')

    <!--start top section-->
    <div class="top__section news__bk">
        <div class="top__overlay"></div>
        <h3 class="top_title"> {{__('latest news')}}</h3>
    </div>

    <!--start news wrapper-->
    <div class="p__118">
        <div class="container">
            @if(!empty($news) && $news->count())
                @foreach ($news as  $new)
                <div class="news__details__card">
                    <div class="news__thumb">
                        <img src="{{$new->image->image}}" alt="" class="img-fluid">
                    </div>
                    <div class="news_body">
                        <h3 class="news_title">{{$new->title}}</h3>
                        <p class="news__des"> {!! Str::words($new->content, 50) !!} </p>
                            <a href="{{route('front.new_details' , $new->id)}}" class="more__cvs"> {{__('Read More')}} <i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                    </div>
                </div>
                @endforeach
                {{ $news->links() }}
            @endif
            
        </div>
    </div>

@endsection