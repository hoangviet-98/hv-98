@extends('layouts.master_frontend')

@section('title')
    <title>PRODUCT</title>
@endsection

@section('js')
    @parent

@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="customer/css/productindex.css">

@endsection

@section('content')

    <div class="shop-with-sidebar">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-inner">
                            <ul>
                                <li class="home">
                                    <a href="/">Home</a>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <a>List Product</a>
                                </li>
                                {{--                                <li class="category3"><span>{{$cateProduct->cat_name}}</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <div class="sidebar-title" style="margin-top: 50px ">
                                <h6 style="font-weight: bolder;">Categories</h6>
                            </div>
                            <ul class="sidebar-tags">
                                @if (isset($categories))
                                    @foreach($categories as $cat)
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1182">
                                            <a href="{{route('get.list.product',[$cat->cat_slug, $cat->id]) }}">{{$cat -> cat_name}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="area-title">
                        <h2>Product</h2>
                    </div>
                    <div class="tab-content">
                        @if (isset($products))
                            <div class="container">
                                <div class="row">
                                {{-- <div class="all-singlepost"> --}}
                                <!-- single latestpost start -->
                                    @foreach($products as $product)
                                        <div class="col-sm-4" style=" margin-bottom: 30px;text-align: center;">
                                            {{-- <div class="single-post" > --}}
                                            <div class="post-thumb">
                                                <a href="{{route('get.detail.product', [$product->pro_slug, $product->id])}}">
                                                    <img style="width: 100%; height: auto"
                                                         src="{{pare_url_file($product->pro_avatar)}}"
                                                         class="op_section_pro"> </a>
                                            </div>
                                            <div class="post-thumb-info">
                                                <div class="post-time">
                                                    <a href="#">Beauty</a>
                                                    <span>/</span>
                                                    <span>Post by</span>
                                                    <span>Hoang Viet</span>
                                                </div>
                                                <div class="postexcerpt">
                                                    <p style="height: 25px;width: 200px;
                                                       white-space: nowrap;
                                                       overflow: hidden;text-overflow: ellipsis;">{{$product->pro_name}}
                                                    <p style="color: red;"> <span>Price: </span>{{number_format($product->pro_price)}} $</p>
                                                    <a href="#" class="buy">Add to Cart</a>
                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                        </div>
                                    @endforeach
                                    {{-- </div> --}}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
