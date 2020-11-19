@extends('layouts.master_admin')

@section('title')
    <title>Spa List</title>
@stop

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
@endsection

@section('css')
    @parent
@endsection
@section('content')

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
               href="{{ route('admin.get.create.spa')}}" class=""> <i
                    class="fa fa-plus-circle"> </i> New Spa</a>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <div class="box-header">
                            <h3 class="box-title"></h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Spa Name</th>
                                        <th>Spa Address</th>
                                        <th>Spa Phone</th>
                                        <th colspan=3>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hv_spa as $spa)
                                        <tr>
                                            <th>{{$spa->id}}</th>
                                            <td>{{$spa->spa_name}}</td>
                                            <td>{{$spa->spa_address}}</td>
                                            <td>{{$spa->spa_phone}}</td>
                                            <td>
                                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                                   href="{{ route('admin.get.edit.spa',$spa->id)}}"> <i
                                                            class="fa fa-pencil"> </i></a>

                                                <a href=""
                                                   style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                                   data-url="{{ route('admin.get.delete.spa', $spa->id)}}"
                                                   class="fa fa-trash-o action_delete"> </a>
                                                @csrf
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
