@extends('layouts.master_frontend')

@section('title')
    <title>Pay</title>
@endsection

@section('js')
    @parent
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


@endsection

@section('css')
    @parent
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@endsection

@section('content')
    <div class="container">
        {{-- <div class="row">--}}
        {{-- <div class="col-md-12">--}}
        {{-- <div class="container-inner">--}}
        {{-- <ul>--}}
        {{-- <li class="home">--}}
        {{-- <a href="">Home</a>--}}
        {{-- <span><i class="fa fa-angle-right"></i></span>--}}
        {{-- </li>--}}
        {{-- <li class="home">--}}
        {{-- <a href="">Gio hang</a>--}}
        {{-- <span><i class="fa fa-angle-right"></i></span>--}}
        {{-- </li>--}}
        {{-- <li class="category"><span>Thanh toan</span></li>--}}
        {{-- </ul>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
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

                                {{-- <li class="category3"><span>{{$cateProduct->cat_name}}</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Review Order
                                <div class="pull-right"><small><a class="afix-1"
                                                                  href="{{route('get.list.shopping.cart')}}">Edit
                                            Cart</a></small></div>
                            </div>
                            <div class="panel-body">

                                @foreach($products as $item)
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" style="width: 150px; height: 100px"
                                                 src="{{asset(pare_url_file($item->options->avatar))}}"></div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{$item->name}}</div>
                                            <div class="col-xs-12">
                                                <small>Quantity:<span>{{$item->qty}}</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
{{--                                            <h6>{{number_format($item->price)}} VNĐ</h6>--}}
                                            <h6>{{number_format($item->price * $item->qty)}} VNĐ</h6>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <hr/>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <hr/>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Order Total</strong>
                                        <div class="pull-right"><span>{{\Cart::subtotal()}} VNĐ </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Thong tin thanh toan</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Name<span class="cRed">(*)</span></strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="tr_name" required="" class="form-control" value="{{get_data_user('web','name')}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Address<span class="cRed">(*)</span></strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="tr_address" required="" class="form-control" value="{{get_data_user('web','address')}}"/>
                                    </div>
                                </div>
                            </div><div class="form-group">
                                <div class="col-md-12"><strong>Note<span class="cRed">(*)</span></strong></div>
                                <div class="col-md-12">
                                    <textarea name="tr_note" cols="67,8" required="" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Spa<span class="cRed">(*)</span></label>
                                <select class="form-control" name="tr_spa_id" required="">
                                <option value="">---Chọn chi nhánh spa---</option>
                                @foreach ($spa as $spa_id)
                                    <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number<span class="cRed">(*)</span></strong></div>
                                <div class="col-md-12"><input type="text" required="" name="tr_phone" class="form-control"
                                                              value="{{get_data_user('web','phone')}}"/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address<span class="cRed">(*)</span></strong></div>
                                <div class="col-md-12"><input type="text" required="" name="tr_email" class="form-control"
                                                              value="{{get_data_user('web','email')}}"/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn-danger">Xac nhan thong tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <!--CREDIT CART PAYMENT END-->
                </form>
            </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
    </div>
@endsection
