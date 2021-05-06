 <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand" >
        <div class="kt-aside__brand-logo">
            <a href="" alt="Logo"><img alt="Logo" src="{{asset('favicon.ico')}}" width="65" style="border-radius: 50%;"></a>
        </div>
        <div class="kt-aside__brand-logo" id="myDIV">
            <h4 style="color: white;">StarZone</h4>
        </div>
        
        <div class="kt-aside__brand-tools">
            <button onclick="myFunction()" class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><i class="fa-align-justify"></i><span></span></button>
        </div>
    </div>

            <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">

                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.dashboard')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-dashboard"></i><span class="kt-menu__link-text">Dashboards</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>           
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.booking.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-list"></i><span class="kt-menu__link-text">Booking</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>       
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.customer.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-user"></i><span class="kt-menu__link-text">Customer</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>          
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-list-1"></i><span class="kt-menu__link-text">Tours</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.package.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Package</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.tour_leader.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tour Leader</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.tour_group.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tour Group</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-home-1"></i><span class="kt-menu__link-text">Hotels</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.hotel.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hotel View</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.hotel.booking.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hotel Booking</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.hotel.wishlist.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hotel Booking Wishlist</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Configure</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav"> 
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.country.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Country</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>          
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.destination.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Destination</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.join_table.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Join Table</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>      
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.travel_blog.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-list-1"></i><span class="kt-menu__link-text">Blogs</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>          
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.wishlist.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-black"></i><span class="kt-menu__link-text">Wishlist</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>           
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.notification.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-notification"></i><span class="kt-menu__link-text">Notifications</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>        
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.point_history.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-poll-symbol"></i><span class="kt-menu__link-text">Point History</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>       
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.ask_question.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-questions-circular-button"></i><span class="kt-menu__link-text">FAQs</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                </li>

                <!-- Setting-->
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-settings"></i><span class="kt-menu__link-text">Setting</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Role Permission</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav"> 
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.users.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">users</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>    </li>
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.roles.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">roles</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.about.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">About</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>     
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.popup.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Popup</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>     
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.home_video.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Home Video</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>          
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.support_center.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Support Center</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>            
                            </li>
                            
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.tutorial.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tutorial</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>     
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{route('admin.feedback.index')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Feedback</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>            
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <form id="frm-logout" action="{{ route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Logout</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            </li>        
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>
