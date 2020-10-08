@extends('layouts.master_admin')

@section('title')
    <title>List Employee</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="admincontrol/js/logInAdmin/js/list_product.js">
    <link href="{{ asset('admincontrol/css/content.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
{{--            @include('admin.partial.content-header', ['name' => 'Employee', 'key' => 'List'])--}}
        </section>
        <div class="back-home">
            <a style="margin: 19px"
               href="{{ route('admin.get.create.employee')}}" class="">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                New Employee</a>
        </div>
        <section class="content">
        <div class="row">
            <div class="col-sm-11">
                <table class="table table-bordered" style="text-align: center; margin-left: 50px">
                    <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Card</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Spa Name</th>
                        <th colspan=3>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hv_employee as $employee)
                        <tr>
                            <th>{{$employee->id}}</th>
                            <td>{{$employee->emp_name}}</td>
                            <td>{{$employee->emp_address}}</td>
                            <td><img src="{{pare_url_file($employee->emp_card)}}" alt="" class="responsive"></td>
                            <td>{{$employee->emp_phone}}</td>
                            <td>{{number_format($employee->emp_salary)}}</td>
{{--                            <td>{{$employee->emp_spa_id->spa_name}}</td>--}}
                            <td>{{isset($employee->spa->spa_name) ? $employee->spa->spa_name : 'N\A'}}</td>
                            <td>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                   href="{{ route('admin.get.edit.employee',$employee->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href=""
                                   style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                   data-url="{{ route('admin.get.delete.employee', $employee->id)}}"
                                   class="fa fa-trash-o action_delete"> </a>
                                @csrf
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </section>
    </div>
@endsection
