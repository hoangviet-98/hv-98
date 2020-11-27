
@extends('layouts.master_admin')

@section('title')
<title>Home</title>
@endsection

@section('js')
@parent
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        let dataTransaction = $("#container").attr('data-json');
        dataTransaction = JSON.parse(dataTransaction);

        let listday = $("#container2").attr("data-list-day")
        listday = JSON.parse(listday);

        let listMoneyMonth = $("#container2").attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);

        let listMoneyMonthDefault = $("#container2").attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Order status statistics'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransaction,
                showInLegend: true
            }]
        });
    </script>

    <script>
        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Sales chart of days of the month'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Complete the transactions',
                marker: {
                    symbol: 'square'
                },
                data: listMoneyMonth,

            },
                {
                    name: 'Receive the transactions',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonthDefault,

                }]
        });
    </script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
{{--                <small style="font-size: 50px">role : {{Auth::guard('admins')->user()->role_id}}--}}
{{--                 </small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
                    @if (Auth::guard('admins')->user()->role_id===1)
                <div class="row">
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Transactions</span>
                            <span class="info-box-number">{{$totalTransactions}} <small><a href="{{route('admin.get.list.transactions')}}">(View Detail)</a></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Article</span>
                            <span class="info-box-number">{{$totalArticles}} <small><a href="{{route('admin.get.list.article')}}">(View Detail)</a></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Evaluate</span>
                            <span class="info-box-number">{{$totalRevenueSpa}}$ </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->

                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">{{$totalUsers}} <small><a href="{{route('admin.get.list.user')}}">(View Detail)</a></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

                <div class="row">
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Revenue NK</span>
                                <span class="info-box-number">{{$revenueSpaNK}} $</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-heart-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Revenue TX</span>
                                <span class="info-box-number">{{$revenueSpaTX}} $</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-anchor"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Product</span>
                                <span class="info-box-number">{{$totalProduct}} <small><a href="{{route('admin.get.list.product')}}">(View Detail)</a></small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->

                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><i class="ion ion-ios-albums"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total category</span>
                                <span class="info-box-number">{{$totalUsers}} <small><a href="{{route('admin.get.list.category')}}">(View Detail)</a></small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            @endif
            <!-- /.row -->
            <!-- Admin -->
            <!-- Info boxes -->
            @if (Auth::guard('admins')->user()->role_id===2)
                <div class="row">
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Transactions</span>
                                <span class="info-box-number">{{$totalTransactionsAdmin}} <small><a href="{{route('admin.get.list.transactions')}}">(View Detail)</a></small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Schedule</span>
                                <span class="info-box-number">{{$totalSchedules}} <small><a href="{{route('admin.get.list.schedule')}}">(View Detail)</a></small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Revenue</span>
                                <span class="info-box-number">{{$revenueSpa}} $
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->

                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">{{$totalUsers}} <small><a href="{{route('admin.get.list.user')}}">(View Detail)</a></small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            @endif

            <div class="row" style="margin-bottom: 30px">
                <div class="col-sm-8">
                    <figure class="highcharts-figure">
                        <div id="container2" data-list-day="{{$listDay}}"
                             data-money-default={{$arrRevenueTransactionMonthDefault}}
                             data-money={{$arrRevenueTransactionMonth}}>
                </div>
                    </figure>
                </div>
                <div class="col-sm-4">
                    <figure class="highcharts-figure">
                        <div id="container" data-json="{{$statusTransaction}}">

                        </div>

                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <!-- /.box -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- DIRECT CHAT -->
                            <!--/.direct-chat -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <!-- USERS LIST -->
                            <!--/.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Orders</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px"> Order ID</th>
                                        <th>Info</th>
                                        <th>Total price</th>
                                        <th>Day Create</th>
                                        <th>Spa Name</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    @if (Auth::guard('admins')->user()->role_id===1)
                                    <tbody>
                                    @foreach($transactions as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <td>
                                                <ul style="text-align: left">
                                                    <li>
                                                        Name: {{isset($item->users->name) ? $item->users->name : '[N\A]'}}</li>
                                                    <li>
                                                        Email: {{isset($item->tr_email) ? $item->tr_email : '[N\A]'}}</li>
                                                    <li>Address: {{$item->tr_address}}</li>
                                                    <li>Phone:{{$item->tr_phone}}</li>
                                                </ul>
                                            </td>
                                            <td>{{number_format($item->tr_total)}} $</td>
                                            <td>{{$item->created_at}}</td>

                                            <td>{{isset($item->spa->spa_name) ? $item->spa->spa_name : '[N\A]'}}</td>
                                            <td>
                                                <a href="{{ route('admin.get.action.transactions', ['active', $item->id]) }}"
                                                   class="label {{$item->getStatus($item->tr_status ) ['class'] }} ">

                                                    {{$item->getStatus($item->tr_status) ['name'] }}

                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                        @endif

                                    @if (Auth::guard('admins')->user()->role_id===2)
                                        <tbody>
                                        @foreach($transactionsAdmin as $item)
                                            <tr>
                                                <th>{{$item->id}}</th>
                                                <td>
                                                    <ul style="text-align: left">
                                                        <li>
                                                            Name: {{isset($item->users->name) ? $item->users->name : '[N\A]'}}</li>
                                                        <li>
                                                            Email: {{isset($item->tr_email) ? $item->tr_email : '[N\A]'}}</li>
                                                        <li>Address: {{$item->tr_address}}</li>
                                                        <li>Phone:{{$item->tr_phone}}</li>
                                                    </ul>
                                                </td>
                                                <td>{{number_format($item->tr_total)}} $</td>
                                                <td>{{$item->created_at}}</td>

                                                <td>{{isset($item->spa->spa_name) ? $item->spa->spa_name : '[N\A]'}}</td>
                                                <td>
                                                    <a href="{{ route('admin.get.action.transactions', ['active', $item->id]) }}"
                                                       class="label {{$item->getStatus($item->tr_status ) ['class'] }} ">

                                                        {{$item->getStatus($item->tr_status) ['name'] }}

                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @endif
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{route('admin.get.list.transactions')}}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <!-- /.box -->
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Top View Product</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($topProduct as $top)
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{pare_url_file($top->pro_avatar)}}" alt=""
                                             class="responsive">
                                    </div>
                                    <div class="product-info">
                                        <a class="product-title"> {{$top->pro_name}}
                                            <span class="label label-warning pull-right">{{$top->pro_price}}đ</span></a>
                                        <span class="product-description">
                                {{$top->pro_description}}
                                </span>
                                        <span class="product-view">
                               <i class="fa fa-eye" style="color: #bd5a7a;"></i>    {{$top->pro_view}}
                                </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            </ul>
                            @endforeach
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection



