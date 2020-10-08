@extends('layouts.master_admin')

@section('title')
    <title>List Product</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
@endsection

@section('css')
    @parent
    <style>
        .rating .active {
            color: #ff9705 !important;
        }
    </style>
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
            <a style="margin: 19px;"
               href="{{ route('admin.get.create.product')}}" class=""> <i
                    class="fa fa-plus-circle"> </i> New Product</a>
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
                                <form class="form-inline" action="" style="margin-bottom: 30px">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search Name Product ..."
                                               name="name"
                                               value="{{ \Request::get('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <select name="cat" id="" class="form-control">
                                            <option value=""> Category</option>
                                            @if (isset($hv_category))
                                                @foreach($hv_category as $category)
                                                    <option
                                                        value="{{ $category->id }}" {{\Request::get('cat') ==$category->id ? "selected='selected'" : "" }} > {{$category->cat_name}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Hot</th>
                                    <th colspan=3>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hv_product as $product)
                                    <?php
                                        $age = 0;
                                        if($product->pro_total_rating)
                                            {
                                                $age = round($product->pro_total_number / $product->pro_total_rating, 2);
                                            }
                                    ?>
                                    <tr>
                                        <th>{{$product->id}}</th>
                                        <td style="text-align: left">
                                            <ul>
                                                <li><b>Name: </b>{{$product->pro_name}}</li>
                                                <li><b>Amount: </b>{{$product->pro_number}}</li>
                                                <li><b>Price: </b>{{number_format($product->pro_price)}} VNĐ</li>
                                                <li><span>Review:</span>
                                                    <span class="rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="fa fa-star {{$i <= $age ? 'active' : ''}}" style="color: #999"></i>
                                                        @endfor
                                                    </span>
                                                    <span>{{$age}}</span>
                                                </li>
                                            </ul>
                                        </td>


                                        <td>{{$product->category->cat_name}}</td>

                                        <td>
                                            <img src="{{pare_url_file($product->pro_avatar)}}" alt=""
                                                 class="responsive">
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.get.action.product', ['active', $product->id]) }}"
                                               class="label {{$product->getStatus($product->pro_active ) ['class'] }} ">

                                                {{$product->getStatus($product->pro_active) ['name'] }}

                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.get.action.product', ['hot', $product->id]) }}"
                                               class="label {{$product->getHot($product->pro_hot ) ['class'] }} ">

                                                {{$product->getHot($product->pro_hot) ['name'] }}

                                            </a>
                                        </td>
                                        <td>

                                            <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                               href="{{ route('admin.get.edit.product',$product->id)}}"> <i
                                                    class="fa fa-pencil"> </i></a>

                                            <a href=""
                                               style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                               data-url="{{ route('admin.get.delete.product', $product->id)}}"
                                               class="fa fa-trash-o action_delete"> </a>
                                            @csrf
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {!! $hv_product->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

