@extends('layouts.master_frontend')

@section('title')
    <title>Product Detail</title>
@endsection

@section('js')
    @parent
    <!-- <script src="customer/js/product/jquery.elevateZoom-3.0.8.min.js"></script> -->
    <!-- <script src="customer/js/product/jquery.scrollUp.min.js"></script> -->
    <!-- <script src="customer/js/product/modernizr-2.8.3.min.js"></script> -->
{{--    <script src="customer/js/product/main.js"></script>--}}
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">

    <script type="text/javascript">
        $.ajaxSetup({
           headers: {
               'x-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
        });
        $(function (){
           let listStart = $(".list-start .fa");

            listRatingText = {
                1: 'Khong thich',
                2: 'Tam dc',
                3: 'Binh thuong',
                4: 'Rat tot',
                5: 'Qua tuyet voi',
            };

           listStart.mouseover(function (){
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active');

                $(".number_rating").val(number);
                $.each(listStart, function (key, value){
                   if (key + 1 <= number)
                   {
                       $(this).addClass('rating_active')
                   }
                });
                $(".list-text").text('').text(listRatingText[number]).show();
           });

           $(".js_rating_action").click(function (event) {
              event.preventDefault();
              $(".form_rating").slideToggle('slow')

              if ($(".form_rating").hasClass('hide'))
              {
                  $(".form_rating").addClass('active').removeClass('hide');
              }else {
                  $(".form_rating").addClass('hide').removeClass('active');
              }
           });
           $(".js_rating_product").click(function (event){
              event.preventDefault();
              let content = $("#ra_content").val();
              let number  = $(".number_rating").val();
              let url = $(this).attr('href');
                if(content && number)
                {
                    $.ajax({
                        url: url,
                        type : "POST",
                        data : {
                            number  : number,
                            r_content : content
                        }
                    }).done(function(result) {
                        if(result.code == 1)
                        {
                            alert("Send review successfully !!!");
                            location.reload();
                        }
                    });
                }
           });
        });

        function relocate_home()
        {
            location.href = "{{route('add.shopping.cart', $productDetail->id)}}";
        }
    </script>
@endsection
@section('css')
    @parent
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="customer/css/productindex.css">
{{--    <link rel="stylesheet" href="customer/css/product-detail.css">--}}
    <link rel="stylesheet" href="customer/css/media.css">
    <link rel="stylesheet" href="customer/css/product_detail.css">

    <style>
        .list-start i:hover {
            cursor: pointer;
        }

        .list-text {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }

        .list-text:after {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgb(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }

        .list-start .rating_active, .pro-rating .active {
            color: #ff9705;
        }

         .rating .active {
             color: #ff9705 !important;
         }
    </style>

{{--Image Slide--}}
    <style>
        #myCarousel .list-inline {
            white-space:nowrap;
            overflow-x:auto;
        }

        #myCarousel .carousel-indicators {
            position: static;
            left: initial;
            width: initial;
            margin-left: initial;
        }

        #myCarousel .carousel-indicators > li {
            width: initial;
            height: initial;
            text-indent: initial;
        }

        #myCarousel .carousel-indicators > li.active img {
            opacity: 0.7;
        }
    </style>
@endsection
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner" style="margin: 10px 0 20px 0">
                        <ul>
                            <li class="home">
                                <a href="index.html">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Shop List</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <!-- Main -->--}}
    <div class="product-details-area">
        <div id="sticky-banner-target">
        </div>
                <div class="Container-itwfbd-0 jFkAwY">
                    <div
                        itemscope=""
                        itemtype="https://schema.org/Product"
                        class="indexstyle__Wrapper-qd1z2k-0 gQLVSm"
                    >
                        <meta
                            itemprop="url"
                            content="https://tiki.vn/ban-phim-co-day-dell-kb216-den-hang-chinh-hang-p646020.html"
                        />
                        <meta
                            itemprop="image"
                            content="https://salt.tikicdn.com/cache/w390/media/catalog/product/2/3/23884_ban_phim_dell_kb216b_01.u2409.d20170517.t091608.808367.jpg"
                        />
                        <div class="indexstyle__ProductImages-qd1z2k-1 kQvKqX">
                            <div class="group-images">
                                <div class="thumbnail">
                                    <div class="ImageLens__Wrapper-uaw433-0 jcyqbC">
                                        <div class="container">
                                            <img
                                                style="width: 390px; height: 390px"
                                                src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt=""/>
                                        </div>
                                    </div>
                                    <p>
                                        <svg
                                            fill="currentColor"
                                            preserveAspectRatio="xMidYMid meet"
                                            height="1em"
                                            width="1em"
                                            viewBox="0 0 40 40"
                                            style="vertical-align: middle"
                                        >
                                            <g>
                                                <path
                                                    d="m24.4 17.9v1.4q0 0.3-0.3 0.5t-0.5 0.2h-5v5q0 0.3-0.2 0.5t-0.5 0.2h-1.4q-0.3 0-0.5-0.2t-0.2-0.5v-5h-5q-0.3 0-0.5-0.2t-0.2-0.5v-1.4q0-0.3 0.2-0.5t0.5-0.3h5v-5q0-0.2 0.2-0.5t0.5-0.2h1.4q0.3 0 0.5 0.2t0.2 0.5v5h5q0.3 0 0.5 0.3t0.3 0.5z m2.8 0.7q0-4.2-2.9-7.1t-7.1-2.9-7 2.9-3 7.1 2.9 7 7.1 3 7.1-3 2.9-7z m11.4 18.5q0 1.2-0.8 2.1t-2 0.8q-1.2 0-2-0.8l-7.7-7.7q-4 2.8-8.9 2.8-3.2 0-6.1-1.3t-5-3.3-3.4-5-1.2-6.1 1.2-6.1 3.4-5.1 5-3.3 6.1-1.2 6.1 1.2 5 3.3 3.4 5.1 1.2 6.1q0 4.9-2.7 8.9l7.6 7.6q0.8 0.9 0.8 2z"
                                                ></path>
                                            </g>
                                        </svg>
                                        Rê chuột lên hình để phóng to
                                    </p>
                                </div>
                            </div>

                            <div
                                id="ants-banner-1601363965391"
                                class="9945386740"
                                data-tiki-zone-id="9945386740"
                                style="
                            display: flex;
                            flex-direction: column;
                            -webkit-box-pack: center;
                            justify-content: center;
                            -webkit-box-align: center;
                            align-items: center;
                            margin: 40px 0px;
                        "
                            ></div>
                        </div>
                        <div class="indexstyle__ProductContent-qd1z2k-2 hyGdiA">
                            <div class="header border-bottom">
                                <h1 class="title" itemprop="name">

                                    {{$productDetail->pro_name}}
                                </h1>
                                <div
                                    itemprop="aggregateRating"
                                    itemscope=""
                                    itemtype="http://schema.org/AggregateRating"
                                >
                                    <meta itemprop="ratingValue" content="4.6" />
                                    <meta itemprop="ratingCount" content="747" />
                                    <meta itemprop="bestRating" content="5" />
                                    <meta itemprop="worstRating" content="1" />
                                </div>
                                <div class="indexstyle__Review-qd1z2k-3 kYNzX">
                                    <p
                                        class="carousel-inner"style="font-size: 17px"
                                        class="Stars__Wrapper-sc-1t6kjxa-0 iQZcjJ">
                                        <?php
                                        $age = 0;
                                        if($productDetail->pro_total_rating)
                                        {
                                            $age = round($productDetail->pro_total_number / $productDetail->pro_total_rating, 2);
                                        }
                                        ?>
                                            <span class="rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fa fa-star {{$i <= $age ? 'active' : ''}}" style="color: #999"></i>
                                                @endfor
                                                    </span>
{{--                                            <span>{{$age}}</span>--}}
                                    </p>
                                    <a class="number"> Total Review: {{$productDetail->pro_total_rating}}</a>
                                </div>

                                <div class="brand">
                                    <div
                                        itemprop="brand"
                                        itemscope=""
                                        itemtype="http://schema.org/Brand"
                                    >
                                        <meta itemprop="name" content="Dell" />
                                        <meta
                                            itemprop="url"
                                            content="/thuong-hieu/dell.html"
                                        />
                                    </div>
                                    <h6>
                                        Category:
                                        <a href="">{{$productDetail->category->cat_name}}</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="body">
                                <div class="summary">
                                    <div
                                        class="left"
                                        itemprop="offers"
                                        itemscope=""
                                        itemtype="http://schema.org/Offer"
                                    >
                                        <link
                                            itemprop="availability"
                                            href="http://schema.org/InStock"
                                        />
                                        <meta itemprop="priceCurrency" content="VND" />
                                        <meta itemprop="price" content="140000" />
                                        <meta
                                            itemprop="url"
                                            content="https://tiki.vn/ban-phim-co-day-dell-kb216-den-hang-chinh-hang-p646020.html"
                                        />

                                        <div class="group">
                                            <div class="price-and-icon">
                                                <p class="price">
                                                   {{number_format($productDetail->pro_price)}}<!-- -->
                                                    VNĐ
                                                </p>
                                            </div>
                                            <p class="original-price first-child">
                                                Tiết kiệm:
                                                <span> 44<!-- -->% </span>
                                                (<!-- -->110.000<!-- -->
                                                ₫)
                                            </p>
                                            <p class="original-price">
                                                Giá thị trường:
                                                <!-- -->250.000<!-- -->
                                                ₫
                                            </p>
                                            <div
                                                class="DealCountDown__Wrapper-sc-5xee5y-0 dbKVuT"
                                            >
                                                <p class="timer">
                                                    Khuyến mãi kết thúc sau<span>
                                                0 </span
                                                    >ngày<span> 01 </span
                                                    ><span> : </span><span> 28 </span
                                                    ><span> : </span><span> 20 </span>
                                                </p>
                                                <div class="ordered">
                                                    <p class="text">Đã bán 5</p>
                                                    <div class="process-bar">
                                                        <div
                                                            class="process"
                                                            style="width: 25%"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="group border-top">
                                            <ul class="list">
                                                <li>{{$productDetail->pro_description}}</li>
                                                <li>{{$productDetail->pro_description_seo}}</li>
                                            </ul>
                                        </div>
                                        <div class="group border-top">
                                            <div
                                                class="indexstyle__AddToCart-qd1z2k-8 dJbIjB"
                                            >
                                                <div class="group-button">
{{--                                                    <button class="btn btn-add-to-cart add_to_cart"--}}
{{--                                                            href="{{route('add.shopping.cart', $productDetail->id)}}"--}}
{{--                                                            style="width: 20px">--}}
{{--                                                        Add To Cart--}}
{{--                                                    </button>--}}

                                                    <input type="button" class="btn btn-add-to-cart"
                                                           href="{{route('add.shopping.cart', $productDetail->id)}}"
                                                           value="Add To Cart" onclick=" relocate_home()">

                                                </div>
                                            <span class="iconoon iconoon-heart-o"></span>
                                                    <span class="tooltip">Thêm vào yêu thích</span>
                                                <i class="fa fa-heart-o" style="margin: 5px 0 0 8px;font-size: 25px;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="ProductReport__Wrapper-sc-1pdz2xs-0 beLPHp"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--Product Main--}}
    <div class="container-fluid">
            <div class="col-md-12"
            style="display: block;
            overflow: hidden;
            border-top: 1px solid #e4e4e4;
            margin-top: 15px;">
                <div class="single-product-tab">
                                <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content" style="text-align: center;">
                                {!! $productDetail->pro_content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    {{--Form Review--}}

    <div class="component-rating" style="margin: 160px 350px 20px 250px; border-top: 1px solid #e4e4e4">
        <h3 style="text-align: center">Review Product :</h3>
{{--        <b>{{$productDetail->pro_total_rating}}</b>--}}
        <b>{{$productDetail->pro_name}}</b>
        <div class="component-rating_content" style="display: flex; align-items: center; border: 1px solid #ddd">
            <div class="rating-item" style="width: 20%; position: relative;">
                <?php
                $age = 0;
                if ($productDetail->pro_total_rating)
                $age = $productDetail->pro_total_number / $productDetail->pro_total_rating;
                ?>

                 <span class="fa fa-star" style="font-size: 100px; display:  block; color: #ff9705;margin: 0 auto; text-align: center">

                    <center>

                       <b style="position: absolute;top: 38%;margin-left: 5% ;transform: translateX(-50%) translateX(-50%);color: white;font-size: 20px;">{{round($age, 1)}}</b>
                   </center>

                       
                 </span>
              
             
            </div>
                <div class="list-rating" style="width: 60%; font-size: 14px" >
                    @foreach ($ratingDefault as $key => $item)
                    <div class="item-rating" style="display: flex;align-items: center">
                            <div style="width: 10%">
                                {{$key}} <span class="fa fa-star" style="color: grey"></span>
                            </div>
                            <div style="width: 70%; margin: 0 20px;">
                                <span style="width:100%;
                                    height: 8px;display: block; border: 1px solid #dedede; border-radius: 5px; background-color: #dedede">
                                    @php
                                    $ageItem = 0;
                                    if($productDetail->pro_total_rating)
                                        $ageItem = ($item['count_number']/ $productDetail->pro_total_rating) * 100;
                                    @endphp
                                    <b style="width:{{$ageItem}}%; ;background-color: #f25800; display: block; height: 100%; border-radius: 5px; ">
                                    </b></span>
                            </div>
                            <div style="width: 20%">
                                <span class="item_review-count" style="color: rgb(0, 127, 240);">
                                    <b>{{$item['count_number']}}</b>
                                    Review
                                </span>
                            </div>
                    </div>
                    @endforeach
                </div>
            <div class="rating_btn" style="width: 20%">
                <a href="javascript:;void(0)" class=" {{Auth::id() ? "js_rating_action" : "js-show-login"}}"
                   style="width: 200px; background-color: #288ad6;padding: 10px;color: white;border-radius: 5px"
                    title="Send Review">Send Review</a>
            </div>
        </div>

        <?php
        $listRatingText = [
            1 => 'Khong thich',
            2 => 'Tam dc',
            3 => 'Binh thuong',
            4 => 'Rat tot',
            5 => 'Qua tuy voi',
        ];
        ?>
        <div class="form_rating hide  ">
                <div style="display: flex; margin-top: 15px;">
                    <span>Please choose review </span>
                    <span style="margin: 0 15px" class="list-start">
                @for ($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star" data-key="{{$i}}" ></i>
                        @endfor
                    </span>
                    <span class="list-text"></span>
                    <input type="hidden" value="" class="number_rating">
                </div>
            <div style="margin-top: 15px">
                <textarea name="" class="form-control" id="ra_content" cols="30" rows="3 "></textarea>
            </div>
            <div style="margin-top: 15px">
                <a href="{{route('post.rating.product', $productDetail)}}" class="js_rating_product" style="width: 200px; background: #288ad6; padding: 5px 10px; color: white; border-radius: 5px">Send Review</a>
            </div>
        </div>
    </div>

{{--Review--}}
    <div class="component-list-rating" style="margin: 0 350px 20px 250px;">
            @if ( isset($ratings))
                @foreach($ratings as $rating)
            <div class="rating_item">
                <div>
                    <span style="color: #333; font-weight: bold;text-transform: capitalize;">{{$rating->users->name}}</span>
                    <a href="" style="color: #2ba832;"><i class="fa fa-check-circle-o" style="margin-right: 0"></i>Da mua hang tai HanaSpa</a>
                </div>
                <p>
                    <span class="pro-rating">
                        @for ($i = 1; $i <= 5; $i++)
                           <i class="fa fa-star {{$i <= $rating->ra_number ? 'active' : ''}}" style="margin-right: 0"></i>
                        @endfor
                    </span>
                    <span>{{$rating->ra_content}}</span>
                </p>
                <div>
                    <span><i class="fa fa-clock-o"></i>{{$rating->created_at}}</span>
                </div>
            </div>
                @endforeach
                <a href="" class="btn-load-rating" style="padding: 7px 20px; color: #288ad6; border: solid 1px #288ad6;border-radius: 3px; text-align: center;box-sizing:border-box;margin: 10px 0 10px; display: inline-block; ">View all review <i class="fa fa-"></i></a>
                @endif
    </div>

{{--    Same PRODUCTY --}}
            <div class="product" style="text-align: center; font-family: Open Sans, sans-serif;">
                @if (isset($productSuggests))
                    <div class="container">
                        <div class="area" style="border-top: 1px solid #e4e4e4; overflow: hidden">
                            <h2>The same product.
                            </h2>
                        </div>
                        <div class="row">
                            <div class="all-singlepost">
                                <!-- single latestpost start -->
                                @foreach($productSuggests as $suggests)
                                    <div class="col-md-3 col-sm-4">
                                        <div class="single-post" style="margin-bottom: 40px">
                                            <div class="post-thumb">
                                                <a href="{{route('get.detail.product', [$suggests->pro_slug, $suggests->id])}}">
                                                    <img style="width: 250px; height: auto"
                                                         src="{{ asset(pare_url_file($suggests->pro_avatar)) }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="post-thumb-info">
                                                <div class="post-time">
                                                    <a href="#">Beauty</a>
                                                    <span>/</span>
                                                    <span>Post by</span>
                                                    <span>BootExperts</span>
                                                </div>
                                                <div class="postexcerpt">
                                                    <p style="height: 40px;  text-overflow: ellipsis;">{{$suggests->pro_name}}</p>
                                                    <hr>
                                                    <a href="{{route('add.shopping.cart', $suggests->id)}}"
                                                       class="add_to_cart">ADD TO CART</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
    <!-- product section start -->
@endsection
