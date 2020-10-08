@extends('layouts.master_admin')

@section('title')
    <title>List Booking</title>
@endsection

@section('js')
    @parent

    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>

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

        <div class="back-home">
            <a style="margin: 19px;"
               href="{{ route('admin.get.create.booking')}}" class=""> <i
                    class="fa fa-plus-circle"> </i> New Booking</a>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline" action="">
                                <input type="text" class="form-control" value="{{\Request::get('id')}}" name="id"
                                       placeholder="ID">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Customer Name</th>
                        <th>Spa Name</th>
                        <th>Date and Time</th>
                        <th>Content</th>
                        <th>Note</th>
                        <th colspan=3>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booking as $bok)
                        <tr>
                            <th>{{$bok->id}}</th>
                            <td>{{$bok->customer_name}}</td>
                            <td>{{$bok->spa->spa_name}}</td>
                            <td>{{$bok->date_time}}</td>
                            <td>{{$bok->b_content}}</td>
                            <td>{{$bok->note}}</td>
                            <td>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                   href="{{ route('admin.get.edit.booking',$bok->id)}}"> <i class="fa fa-pencil"> </i></a>

                                <a href=""
                                   style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                   data-url="{{ route('admin.get.delete.booking', $bok->id)}}"
                                   class="fa fa-trash-o action_delete"> </a>
                                @csrf
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <!-- Modal -->
@endsection

