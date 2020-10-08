@extends('layouts.master_admin')

@section('title')
    <title>List Service</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>

@endsection

@section('css')
    @parent
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <div class="back-home">
            <a style="margin: 19px;"
               href="{{ route('admin.get.create.service')}}"> <i
                    class="fa fa-plus-circle"> </i> New Service
            </a>
        </div>
        <form class="form-inline" action="" style="margin: 20px; margin-left: 50px">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search Name Article ..." name="name"
                       value="{{ \Request::get('name') }}">
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form>
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Name Service</th>
                                    <th>Spa_id</th>
                                    <th>Status</th>
                                    <th colspan=3>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hv_service as $service)
                                <tr>
                                        <th>{{$service->id}}</th>
                                        <th>{{$service->se_name}}</th>
                                        <th>{{$service->spa->spa_name}}</th>
                                        <th>{{$service->se_status}}</th>
                                         <td>
                                            <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                               href="{{ route('admin.get.edit.service',$service->id)}}"> <i
                                                    class="fa fa-pencil"> </i></a>

                                            <a href=""
                                               style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                               data-url="{{ route('admin.get.delete.service', $service->id)}}"
                                               class="fa fa-trash-o action_delete"> </a>
                                         @csrf 
                                        </td> 
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection


