    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                <!-- begin:: Header Menu -->
                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
                       
                    </div>
                </div>

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">


                    <!--begin: User Bar -->
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                      

                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                            <div class="kt-header__topbar-user kt-rounded-">
                               
                                <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->name }}</span>
                                <img alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}" class="kt-rounded-" />

                                <span class="kt-badge kt-badge--username kt-badge--lg kt-badge--brand kt-hidden kt-badge--bold">S</span>
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-sm">
                            <div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url({{url('assets/media/misc/head_bg_sm.jpg')}})">
                                <div class="kt-user-card__wrapper">
                                    <div class="kt-user-card__pic">

                                        <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" class="kt-rounded-" />
                                    </div>
                                    <div class="kt-user-card__details">
                                        <div class="kt-user-card__name">{{ Auth::user()->name }}</div>
                                        <div class="kt-user-card__position">CTO, Loop Inc.</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="kt-nav kt-margin-b-10">
                                <li class="kt-nav__item">
                                    <a href="" class="kt-nav__link">
                                        <span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
                                        <span class="kt-nav__link-text">My Profile</span>
                                    </a>
                                </li>
                                
                                <li class="kt-nav__item">
                                    <a href="" class="kt-nav__link">
                                        <span class="kt-nav__link-icon"><i class="flaticon2-gear"></i></span>
                                        <span class="kt-nav__link-text">Settings</span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator kt-nav__separator--fit"></li>
                                <li class="kt-nav__custom kt-space-between">

                                      
                                     <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                        </form>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" target="_blank" class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a>
                                    {{-- <i class="flaticon2-information kt-label-font-color-2" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i> --}}
                                </li>
                            </ul>
                        </div>
                    </div>

                
                </div>
            
</div>
