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
                                <h6>Categories</h6>
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
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Availability</h6>
                            </div>
                            <ul>
                                <li><a href="#">Not available</a><span> (1)</span></li>
                                <li><a href="#">In stock</a><span> (2)</span></li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="area-title">
                        <h2>Product</h2>
                    </div>
                    <div class="tab-content">
                        {{--    <section class="hv-content" style="margin-top: 60px; margin-bottom: 30px ;text-align: center; ">--}}
                        {{--        <div class="container-fluid" style="background-color: #f1dede ">--}}
                        {{--                        @if (isset($products))--}}
                        {{--                            <div class="row">--}}
                        {{--                                @foreach($products as $product)--}}
                        {{--                                        <div class="col-lg-4 col-md-4 col-sm-4"--}}
                        {{--                                             style=" margin-top: 30px; ">--}}
                        {{--                                            <ul class="homeproduct" style="border: 1px solid #d7dadd">--}}
                        {{--                                                <li style="list-style: none;">--}}
                        {{--                                                    <a href="{{route('get.detail.product', [$product->pro_slug, $product->id])}}">--}}
                        {{--                                                        <img src="{{pare_url_file($product->pro_avatar)}}"--}}
                        {{--                                                             class="op_section_pro">--}}
                        {{--                                                        <h5>{{$product->pro_name}}</h5>--}}
                        {{--                                                        <p style="color: red; font-weight: bold">{{$product->pro_price}}</p>--}}
                        {{--                                                        <p style="text-align: center; font-size: 12px;color: #a3a3a3;">--}}
                        {{--                                                            {{$product->pro_description}}--}}
                        {{--                                                        </p>--}}
                        {{--                                                    </a>--}}
                        {{--                                                </li>--}}
                        {{--                                            </ul>--}}
                        {{--                                        </div>--}}
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
                                                <div class="postexcerpt">
                                                    <p style="">{{$product->pro_name}}</p>
                                                    <a href="#" class="buy">Mua ngay</a>
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
