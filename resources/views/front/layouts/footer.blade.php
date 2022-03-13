 <!--Start footer -->
 <div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <a class="footer_logo" href="{{route('front.index')}}">
                    <img src="{{asset('front/img/f.png')}}" alt="">
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact__list">
                    <h3 class="footer__title">{{__('Contact us')}}</h3>
                    <a href="#" class="footer_link">{{$setting->phone ?? ''}} - {{$setting->phone2 ?? ''}}</a>
                    <a href="#" class="footer_link">{{$setting->email ?? ''}}</a>
                    <p class="address_des">{{$setting->address ?? ''}}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact__list" id="contact_list">
                    <h3 class="footer__title">{{__('Subscribe to our newsletter')}}</h3>
                    <p class="sub__des">{{__('Subscribe to our newsletter to receive all new cases and court news')}} </p>
                    <form action="{{route('front.save.email')}}" class="sub__form" method="POST">
                        @csrf
                        <div class="form_group">
                            <input type="email" name="email" class="form-control" required placeholder="{{__('Enter Your Email')}}">
                            <button type="submit" class="submit_btn">{{__('send')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--copyrights-->
    <div class="copyrights">
        <p class="rights__des"> {{__('All rights reserved to') ." "}} <span class="thiq_com">{{__('Trust legal')}}</span>
        {{" "  . __('Design and programming') .' '}} <span class="thiq_com">
            {{__('Spark Cloud')}}</span> <span class="poppins_font">&copy;{{date('Y')}}</span></p>
    </div>
 </div>

