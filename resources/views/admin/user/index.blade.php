@extends('layouts.master_admin')

@section('title')
    <title>List User</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="admincontrol/js/logInAdmin/js/list_product.js">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
            <a style="margin: 19px"
               href="{{ route('admin.get.create.user')}}" class="">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                New User</a>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
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
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th colspan=3>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th>{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                               href="{{ route('admin.get.edit.user',$user->id)}}"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                            <a href=""
                                               style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                               data-url="{{ route('admin.get.delete.user', $user->id)}}"
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
