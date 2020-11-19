<section id="menu">
    <div id="nd_options_navigation_4_container" class="nd_options_section nd_options_position_relative ">
        <div style="background-color: #ffffff ; border-bottom: 1px solid #f1f1f1 ; border-top: 1px solid #f1f1f1 ;"
             class="nd_options_section">
            <div
                class="nd_options_section nd_options_padding_15 nd_options_box_sizing_border_box nd_options_position_relative">
                <div class="nd_options_section nd_options_display_none_all_responsive">
                    <div
                        class="nd_options_navigation_4 nd_options_navigation_type nd_options_text_align_right nd_options_display_none_all_responsive">
                        <div class="nd_options_display_block">
                            <div class="menu-spa-menu-container">
                                <div class="list_pc" style="text-align: center">
                                    <ul id="menu-spa-menu-1">
                                        <li class="menu-item">
                                            <a href="/home" aria-current="page">
                                                <i class="fa fa-home" aria-hidden="true"
                                                   style="color: #DA263B;font-size: 22px;vertical-align: sub;"></i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/home">Category</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('get.all.product')}}">All Product</a></li>
                                                @if (isset($categories))
                                                    @foreach($categories as $cat)
                                                        <li class="menu-item">
                                                            <a href="{{route('get.list.product',[$cat->cat_slug, $cat->id]) }}">{{$cat -> cat_name}}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        {{-- <li class="menu-item">--}}
                                        {{-- <a href="{{route('get.list.product')}}">Product</a>--}}
                                        {{-- </li>--}}
                                        <li class="menu-item ">
                                            <a href="#">Introduce</a>
                                        </li>
                                        <li class="menu-item ">
                                            <a href="{{route('get.schedule')}}">Schedule</a>
                                        </li>
{{--                                        <li class="menu-item ">--}}
{{--                                            <a href="#">Khuyến mãi</a>--}}
{{--                                        </li>--}}
                                        <li class="menu-item ">
                                            <a href="{{route('get.list.article')}}">Article</a>
                                        </li>
                                        <li class="menu-item ">
                                            <a href="/home"><i class="fa fa-align-justify"></i></a>
                                            <ul class="sub-menu">
                                                @if (Auth::check())

                                                    <li class="menu-item ">
                                                        <a href="{{route('get.user.dashboard')}}">Manage Account</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('get.list.shopping.cart')}}">Cart</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('get.logout.user')}}">Log out</a>
                                                    </li>
                                                @else
                                                    <li class="menu-item">
                                                        <a href="{{route('get.register')}}">Registration</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('get.login')}}">Log in</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('get.list.shopping.cart')}}">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"
                                                   style="color: #2dbcbc;font-size: 22px;vertical-align: sub;"></i>
                                            </a>
                                            <a href="{{route('get.list.shopping.cart')}}"><span>{{\Cart::count()}}</span></a>
                                        </li>
{{--                                        <li class="menu-item">--}}
{{--                                                <form action="" role="search" method="GET" style="width: 200px; margin-left: 20px ;display: flex">--}}
{{--                                                    --}}{{--                                            <form action="{{route('get.list.product')}}" role="search" method="GET" style="width: 200px; margin-left: 20px ;display: flex">--}}
{{--                                                    <input type="text" name="k" value="{{Request::get('k')}}" style="height: 30px;" class="form-control" placeholder="Search Product ...">--}}
{{--                                                    <button type="submit" class="btnSearch">--}}
{{--                                                        <i class="fa fa-search"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
                                    </ul>

                                </div>
                                <!--End PC-->

                                <!--Button-->

                                    <label for="nav-mobile-input" class="nav__bars-btn">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars"
                                             class="svg-inline--fa fa-bars fa-w-14" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                  d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                                        </svg>
                                </label>

                                <input type="checkbox" hidden name="" class="nav__input" id="nav-mobile-input">

                                <label for="nav-mobile-input" class="nav__overlay"></label>
                                <!--Mobile-->
                                    <!-- Nav Mobile -->
                                    <nav class="nav__mobile">
                                            <lable for="nav-mobile-input" class="nav__mobile_close">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                     data-icon="times" class="svg-inline--fa fa-times fa-w-11"
                                                     role="img" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 352 512">
                                                    <path fill="currentColor"
                                                          d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                                                </svg>
                                            </lable>
                                        <ul class="nav__mobile_list">
                                            <li>
                                                <a href="/home" class="nav__mobile_link" aria-current="page">
                                                    <i class="fa fa-home" aria-hidden="true"
                                                       style="color: #DA263B;font-size: 22px;vertical-align: sub;"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="nav__mobile_link">Category</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('get.all.product')}}">All Product</a></li>
                                                    @if (isset($categories))
                                                        @foreach($categories as $cat)
                                                            <li class="menu-item">
                                                                <a href="{{route('get.list.product',[$cat->cat_slug, $cat->id]) }}">{{$cat -> cat_name}}</a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="" class="nav__mobile_link">Giới thiệu</a>
                                            </li>
                                            <li>
                                                <a href="{{route('get.schedule')}}"
                                                   class="nav__mobile_link">Schedule</a>
                                            </li>
                                            <li>
                                                <a href="" class="nav__mobile_link">Contact</a>
                                            </li>
                                            <li>
                                                <a href="{{route('get.list.article')}}"
                                                   class="nav__mobile_link">Article</a>
                                            </li>
                                            <li class="menu-item ">
                                                <a href="#"><i class="fa fa-align-justify"></i></a>
                                                <ul class="sub-menu">
                                                    @if (Auth::check())

                                                        <li class="menu-item ">
                                                            <a href="{{route('get.user.dashboard')}}">Manage Account</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Cart</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="{{route('get.logout.user')}}">Thoat</a>
                                                        </li>
                                                    @else
                                                        <li class="menu-item">
                                                            <a href="{{route('get.register')}}">Dang ky</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="{{route('get.login')}}">Dang nhap</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{route('get.list.shopping.cart')}}"
                                                   class="nav__mobile_link"><i class="fa fa-shopping-cart"
                                                                               aria-hidden="true"
                                                                               style="color: #2dbcbc;font-size: 22px;vertical-align: sub;"></i></a>
                                                <a href="{{route('get.list.shopping.cart')}}"><span>{{\Cart::count()}}</span></a>

                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                                <!-- End Mobile -->
                            </div>
                        </div>
                    </div>
                    <!-- Responsive -->
                </div>
            </div>
        </div>
</section>



