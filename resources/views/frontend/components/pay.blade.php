@extends('layouts.master_frontend')

@section('title')
    <title>Pay</title>
@endsection

@section('js')
    @parent
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AQBp2XSSk-pK2OyGN3hFEAox5r8k1hA8M3X9jYXohGn6Q02RTSqG2vDIQGej3LROq1G-f64yOUZDYRin&disable-funding=credit,card"></script>

    <script>

        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        let routeCheckout = '{{ route('post.checkout') }}';
        let routeIndex = '{{ route('get.home') }}';
        let totalPrice = '{{ \Cart::subtotal() }}';
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: totalPrice,
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    let information = details.purchase_units[0].shipping.address;
                    let address = information.address_line_1 + ', ' + information.admin_area_2 + ', ' + information.country_code;
                    let email = 'hoangviet180498@gmail.com';
                    let phone = '0998888888';
                        let spa = 2;
                    $.ajax({
                        method: 'POST',
                        url: routeCheckout,
                        data: {
                            tr_address: address,
                            tr_email:   email,
                            tr_phone: phone,
                            tr_spa_id: spa,
                        },
                        success: function (response) {
                            window.location.replace(routeIndex);
                        }
                    });

                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>


@endsection

@section('css')
    @parent
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@endsection

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-inner">
                            <ul>
                                <li class="home">
                                    <a href="/">Home</a>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <a>Pay</a>
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
                                            <h6>{{($item->price * $item->qty)}} $</h6>

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
                                        <div class="pull-right"><span>{{\Cart::subtotal()}} $ </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Billing Information</div>
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
                            </div><div class="form-group" style="margin-left: 0px;">
                                <div class="col-md-12"><strong>Note<span class="cRed">(*)</span></strong></div>
                                <div class="col-md-12">
                                    <textarea name="tr_note" cols="67,8" required="" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 20px">Spa<span class="cRed">(*)</span></label>
                                <div class="col-md-12"><select class="form-control" name="tr_spa_id" required="">
                                <option value="">---Select a Spa branch---</option>
                                @foreach ($spa as $spa_id)
                                    <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}}</option>
                                @endforeach
                            </select></div>
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
                            <div class="pay" style="display: flex">
                                <div class="form-group">
                                <div class="col-md-12">
                                    <button style="height: 36px; border-radius: 22px; margin-left: 73px" type="submit" class="btn-danger">Order confirmation</button>
                                </div>
                            </div>
                              <div id="paypal-button-container" style="margin-left: 30px">
                                  
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
