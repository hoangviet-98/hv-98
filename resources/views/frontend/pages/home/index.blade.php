@extends('layouts.master_frontend')
@section('title')
    <title>Trang chủ | Hana Spa</title>
@endsection
@section('js')
    @parent
    {{--<script src="admins/js/product/jquery.elevateZoom-3.0.8.min.js"></script>--}}
    {{-- <script src="admins/js/product/modernizr-2.8.3.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--    <script>--}}
    {{--        function addToCart(event) {--}}
    {{--            event.preventDefault();--}}
    {{--            let urlCart = $(this).data('url');--}}
    {{--            $.ajax({--}}
    {{--                type: "GET",--}}
    {{--                url: urlCart,--}}
    {{--                dataType: 'json',--}}
    {{--                success: function (data) {--}}
    {{--                    if (data.code === 200) {--}}
    {{--                        alert('Add Product Success');--}}
    {{--                    }--}}
    {{--                },--}}
    {{--                errors: function () {--}}
    {{--                }--}}
    {{--            });--}}
    {{--        }--}}

    {{--        $(function () {--}}
    {{--            $('.add_to_cart').on('click', addToCart);--}}
    {{--        })--}}
    {{--    </script>--}}

    
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="customer/css/productindex.css">
    <link rel="stylesheet" href="customer/css/media.css">

@endsection
@section('content')
    <div class="hv">
        <div class="slide">
            <div class="slide-image">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img
                                src="https://www.alfalaval.com/globalassets/images/microsites/pureballast/pureballast-hero5-1920x480.jpg"
                                class="img-fluid" alt="Responsive image">
                            <div class="item">
                                <div class="carousel-caption">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.happyskinspa.vn/wp-content/uploads/2019/06/1920x480-1.jpg"
                                 class="img-fluid" alt="Responsive image">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.happyskinspa.vn/wp-content/uploads/2019/06/1920x480-3.jpg"
                                 class="img-fluid" alt="Responsive image">
                            <div class="carousel-caption">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="product" style="text-align: center; margin-top: 50px; font-family: Open Sans, sans-serif;">
            @if (isset($productsNew))
                <div class="container" style="border-top: 1px solid #e4e4e4">
                    <h2>New Products</h2>
                    {{--                    <div class="area-title">--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="all-singlepost">
                            <!-- single latestpost start -->
                            @include('frontend.components.product_new')
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="product" style="text-align: center; font-family: Open Sans, sans-serif;;margin-top: 50px">
            @if (isset($productHot))
                <div class="container" style="border-top: 1px solid #e4e4e4" >
{{--                    <div class="area-title">--}}
                        <h2>Hot Products</h2>
{{--                    </div>--}}
                    <div class="row">
                        <div class="all-singlepost">
                            <!-- single latestpost start -->
                            @include('frontend.components.product_hot')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <section class="hv-label" style="margin-top: 30px">
        <div class="card bg-dark text-white" style="text-align: center">
            <img src="image/label.jpg" alt="..."
                 class="img-fluid" alt="Responsive image" style="height: 500px"
            >
            <div class="card-img-overlay">
                <h5 class="card-title"
                    style="margin-top: 30px; font-size: 60px; font-weight: 600 ;text-transform: uppercase;">Van Anh
                    Beauty &
                    Academy</h5>
                <p class="card-text" style="font-size: 20px; margin-top: 40px">Tự hào là hệ thống chăm sóc da mụn và
                    sau mụn
                    hiệu quả, an toàn với đội ngũ chuyên gia</p>
                <p style="font-size: 20px">
                    <span> “Tận tâm – Chuyên nghiệp – Hiệu quả rõ rệt ngay sau 1 liệu trình”</span>
                </p>
                <p style="font-size: 20px">
                    <span> “là những gì mà chúng tôi luôn muốn mang đến cho khách hàng.”</span>
                </p>
                <img src="image/logo-hsspa_web.png" class="img-fluid" alt="Responsive image"
                     style="height: 100px; width: auto">
            </div>
        </div>
    </section>

    <div class="1" style="text-align: center; font-family: Open Sans, sans-serif; ;margin-top: 50px">
        @if (isset($articleNews))
            <div class="container" style="border-top: 1px solid #e4e4e4">
{{--                <div class="area-title">--}}
                    <h2>News Post</h2>
{{--                </div>--}}
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @include('frontend.components.article_hot')
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
@endsection
