

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
                                <ul id="menu-spa-menu-1">
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-1147">
                                        <a href="/" aria-current="page">
                                            <i class="fa fa-home" aria-hidden="true"
                                               style="color: #DA263B;font-size: 22px;vertical-align: sub;"></i>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1992">
                                        <a href="">Danh mục sản phẩm</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('get.all.product')}}">All Product</a></li>
                                            @if (isset($categories))
                                                @foreach($categories as $cat)
                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1182">
                                                        <a href="{{route('get.list.product',[$cat->cat_slug, $cat->id]) }}">{{$cat -> cat_name}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    {{-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1991">--}}
                                    {{-- <a href="{{route('get.list.product')}}">Product</a>--}}
                                    {{-- </li>--}}
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1991">
                                        <a href="#">Giới thiệu</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1992">
                                        <a href="{{route('get.schedule')}}">Đặt Lịch</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1994">
                                        <a href="#">Khuyến mãi</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1994">
                                        <a href="{{route('get.list.article')}}">Bài viêt</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1995">
                                        <a href="#"><i class="fa fa-align-justify"></i></a>
                                        <ul class="sub-menu">
                                            @if (Auth::check())

{{--                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1203">--}}
{{--                                                    <a href="#">Hello {{Auth::user()->name}}</a>--}}
{{--                                                </li>--}}
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1203">
                                                    <a href="{{route('get.user.dashboard')}}">Manage Account</a>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1203">
                                                    <a href="#">Cart</a>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1203">
                                                    <a href="{{route('get.logout.user')}}">Thoat</a>
                                                </li>
                                            @else
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1203">
                                                    <a href="{{route('get.register')}}">Dang ky</a>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1203">
                                                    <a href="{{route('get.login')}}">Dang nhap</a>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive -->
            </div>
        </div>
    </div>
</section>
