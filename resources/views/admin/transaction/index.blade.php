@extends('layouts.master_admin')

@section('title')
    <title>List Transaction</title>
@endsection
@section('js')
    @parent

    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
{{--        <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>--}}
    {{--    <script src="admincontrol/js/table/dataTables.bootstrap.min.js"></script>--}}
    {{--    <script src="admincontrol/js/table/jquery.dataTables.min.js"></script>--}}
    {{--    <script src="admincontrol/js/table/table.js"></script>--}}

@endsection

@section('css')
    @parent
    {{--    <link rel="stylesheet" href="admincontrol/css/bootstrap-table/dataTables.bootstrap.min.css">--}}

@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12"><br>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <div class="box-header">
                            <h3 class="box-title"></h3>

{{--                            <div class="box-tools">--}}
{{--                                <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                                    <input type="text" name="table_search" class="form-control pull-right"--}}
{{--                                           placeholder="Search">--}}

{{--                                    <div class="input-group-btn">--}}
{{--                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <form class="form-inline" action="">
                                <input type="text" class="form-control" value="{{\Request::get('id')}}" name="id"
                                       placeholder="ID">
                                <input type="text" class="form-control" value="{{\Request::get('email')}}" name="email"
                                       placeholder="Email ...">
                                <select name="status" class="form-control">
                                    <option>Status</option>
                                    <option>Xy ly</option>
                                    <option>Tiep Nhan</option>
                                    <option>Dang van chuyen</option>
                                    <option>Da ban giao</option>
                                    <option>Huy bo</option>
                                </select>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                <button type="submit" name="export" value="truae"
                                        class="btn btn-success"
                                        style="width: 100px;"
                                        ><i class="fa fa-save"></i><span style="margin-left: 5px;">Export</span>
                                </button>
                            </form>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Info</th>
                                    <th>Total price</th>
                                    <th>Day Create</th>
                                    <th>Spa Name</th>
                                    <th>Status</th>
                                    <th colspan=3>Actions</th>
                                </tr>
                                </thead>
                                @if (Auth::guard('admins')->user()->role_id===1)
                                    <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <th>{{$transaction->id}}</th>
                                        <td>
                                            <ul style="text-align: left">
                                                <li>
                                                    Name: {{isset($transaction->users->name) ? $transaction->users->name : '[N\A]'}}</li>
                                                <li>
                                                    Email: {{isset($transaction->tr_email) ? $transaction->tr_email : '[N\A]'}}</li>
                                                <li>Address: {{$transaction->tr_address}}</li>
                                                <li>Phone:{{$transaction->tr_phone}}</li>
                                            </ul>
                                        </td>
                                        <td>{{number_format($transaction->tr_total)}} VND</td>
                                        <td>{{$transaction->created_at}}</td>

                                        <td>{{isset($transaction->spa->spa_name) ? $transaction->spa->spa_name : '[N\A]'}}</td>
                                        <td>
                                            <a href="{{ route('admin.get.action.transactions', ['active', $transaction->id]) }}"
                                               class="label {{$transaction->getStatus($transaction->tr_status ) ['class'] }} ">

                                                {{$transaction->getStatus($transaction->tr_status) ['name'] }}

                                            </a>
                                        </td>
                                        <td>
                                            <a data-id="{{$transaction->id}}"
                                                href="{{route('ajax.admin.transactions.detail', $transaction->id)}}" class="js-preview-transaction"
                                               style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px;"
                                            ><i class="fa fa-eye"></i></a>

                                            <div class="btn-group" style="">
                                                <button type="button" class="btn btn-success btn-xs">Action</button>
                                                <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toogle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href=""
                                                           style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                                           data-url="{{ route('admin.get.delete.transactions', $transaction->id)}}"
                                                           class="fa fa-trash-o action_delete">Delete </a></li>
                                                    <li>
                                                        <a href="{{route('admin.get.action.transactions', ['process', $transaction->id])}}">
                                                            <i class="fa fa-ban"></i> Dang giao hang
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('admin.get.action.transactions', ['success', $transaction->id])}}">
                                                            <i class="fa fa-ban"></i> Da giao hang
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('admin.get.action.transactions', ['cancel', $transaction->id])}}">
                                                            <i class="fa fa-ban"></i> Da huy
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @csrf
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
                                            <td>{{number_format($item->tr_total)}} VND</td>
                                            <td>{{$item->created_at}}</td>

                                            <td>{{isset($item->spa->spa_name) ? $item->spa->spa_name : '[N\A]'}}</td>
                                            <td>
                                                <a href="{{ route('admin.get.action.transactions', ['active', $item->id]) }}"
                                                   class="label {{$item->getStatus($item->tr_status ) ['class'] }} ">

                                                    {{$item->getStatus($item->tr_status) ['name'] }}

                                                </a>
                                            </td>
                                            <td>
                                                <a data-id="{{$item->id}}"
                                                   href="{{route('ajax.admin.transactions.detail', $item->id)}}" class="js-preview-transaction"
                                                   style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px;"
                                                ><i class="fa fa-eye"></i></a>

                                                <div class="btn-group" style="">
                                                    <button type="button" class="btn btn-success btn-xs">Action</button>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toogle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href=""
                                                               style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                                               data-url="{{ route('admin.get.delete.transactions', $item->id)}}"
                                                               class="fa fa-trash-o action_delete">Delete </a></li>
                                                        <li>
                                                            <a href="{{route('admin.get.action.transactions', ['process', $item->id])}}">
                                                                <i class="fa fa-ban"></i> Dang giao hang
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('admin.get.action.transactions', ['success', $item->id])}}">
                                                                <i class="fa fa-ban"></i> Da giao hang
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('admin.get.action.transactions', ['cancel', $item->id])}}">
                                                                <i class="fa fa-ban"></i> Da huy
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @csrf
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                            <div style="text-align: center">
                                {!! $transactions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade fade" id="modal-preview-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng <b id="transaction_id"></b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
    <h1>heheheh</h1>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

