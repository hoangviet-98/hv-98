@extends('layouts.master_frontend')

@section('title')
    <title>Article Detail</title>
@endsection

@section('js')
    @parent

    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">

@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="customer/css/media.css">
@endsection
@section('content')

    <div class="breadcrumbs">
        <div class="container" style="display: flex">
                    <div class="container-inner" style="margin: 10px 0 20px 0">
                                <a href="index.html">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span><b>Article Detail</b></span>
                    </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <h1 style="text-align: center">{{$articleDetail->a_name}}</h1>
            {!! $articleDetail->a_content !!}
        </div>
    </div>
@endsection
