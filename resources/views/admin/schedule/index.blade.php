@extends('layouts.master_admin')

@section('title')
    <title>List Schedule</title>
@endsection

@section('js')
    @parent

    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>
    <script src="admincontrol/js/table/dataTables.bootstrap.min.js"></script>
    <script src="admincontrol/js/table/jquery.dataTables.min.js"></script>
    <script src="admincontrol/js/table/table.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>

@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="admincontrol/css/bootstrap-table/dataTables.bootstrap.min.css">

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
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">
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
                        <th>Service</th>
                        <th>Spa Name</th>
                        <th>Status</th>
                        <th colspan=3>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules  as $schedule)
                        <tr>
                            <th>{{$schedule->id}}</th>
                            <td>
                                <ul style="text-align: left">
                                    <li>
                                        <b>NAME: </b>{{isset($schedule->users->name) ? $schedule->users->name : '[N\A]'}}
                                    </li>
                                    <li>
                                        <b>Email: </b>{{isset($schedule->users->email) ? $schedule->users->email : '[N\A]'}}
                                    </li>
                                    <li>
                                        <b>DATE-TIME: </b> {{isset($schedule->s_dateTime) ? $schedule->s_dateTime : '[N\A]'}}
                                    </li>
                                    <li><b>PHONE: </b>{{isset($schedule->s_phone) ? $schedule->s_phone : '[N\A]'}}
                                    </li>
                                </ul>
                            </td>
                            <td>{{isset($schedule->s_service) ? $schedule->s_service : '[N\A]'}}</td>
                            <td>{{isset($schedule->spa->spa_name) ? $schedule->spa->spa_name : '[N\A]'}}</td>
                            <td>
                                <a href="{{ route('admin.get.action.schedule', ['active', $schedule->id]) }}"
                                   class="label {{$schedule->getStatus($schedule->s_status ) ['class'] }} ">

                                    {{$schedule->getStatus($schedule->s_status) ['name'] }}

                                </a>
                            </td>
                            <td>
                                <a href=""
                                   data-url="{{ route('admin.get.delete.schedule', $schedule->id)}}"
                                   style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                   class="fa fa-trash-o action_delete"> </a>
                                <div class="btn-group" style="">
                                    <button type="button" class="btn btn-success btn-xs">Action</button>
                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toogle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{route('admin.get.action.schedule', ['process', $schedule->id])}}">
                                                <i class="fa fa-ban"></i> Da tiep nhan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.get.action.schedule', ['cancel', $schedule->id])}}">
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
                </table>
            </div>
        </section>
    </div>
    <!-- Modal -->
@endsection

