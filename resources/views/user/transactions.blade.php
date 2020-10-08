@extends('layouts.master_menu')

@section('title')
    <title>List Transaction</title>
@endsection
@section('js')
    @parent
@endsection

@section('css')
    @parent
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
                            <form class="form-inline">
                                <div class="form-group mx-sm-2 mb-2" ;>
                                    <input type="text" class="form-control" name="id" placeholder="ID">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <select name="status" class="form-control">
                                        <option value="">Status</option>
                                        <option value="0" {{Request::get('status') == 1 ? "selected='selected'" : ""}}>Tiep Nhan</option>
                                        <option value="1" {{Request::get('status') == 1 ? "selected='selected'" : ""}}>Dang van chuyen</option>
                                        <option value="2" {{Request::get('status') == 1 ? "selected='selected'" : ""}}>Da ban giao</option>
                                        <option value="-1" {{Request::get('status') == 1 ? "selected='selected'" : ""}}>Huy</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
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
                                        <td>{{$transaction->tr_total}}</td>
                                        <td>{{$transaction->created_at}}</td>

                                        <td>{{isset($transaction->spa->spa_name) ? $transaction->spa->spa_name : '[N\A]'}}</td>
                                        <td>
                                            {{$transaction->getStatus($transaction->tr_status) ['name'] }}
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
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

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

