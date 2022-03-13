    <!--start header-->
    <header>
        <div class="menu-logo ">
            <!--headerNav-->
            <div class="headerNav">
                <div class="container">
                    <a href="{{route('front.index')}}" class="main_logo">
                        <img src="{{asset('front/img/logo.png')}}" alt="">
                    </a>
                    <div class="mobile_menu">
                        <ul class="site_links">
                            <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('front.index')}}">{{__('Home')}}</a>
                            </li>
                            <li class="nav-item {{request()->is('about') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('front.about')}}">{{__('About Us')}}</a>
                            </li>
                            <li class="nav-item {{request()->is('services') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('front.services')}}">{{__('Our services')}}</a>
                            </li>
                            <li class="nav-item {{request()->is('news') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('front.news')}}"> {{__('latest news')}}</a>
                            </li>
                            <li class="nav-item {{request()->is('contact-us') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('front.contact_us')}}"> {{__('Contact us')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('lang')}}">
                                    {{app()->getLocale()=='ar' ? 'English' : 'العربية'}}
                                </a>
                            </li>
                        </ul>
                        <a class="apply__btn" href="{{route('front.advice')}}"> {{__('Ask for your advice')}}</a>
                    </div>
                    <div class="mobile_nav__wrapper">
                        <button class="navbar-toggler mobile_menu_toggler" type="button">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--end header-->
