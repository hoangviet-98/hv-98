@extends('layouts.master_menu')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <base href="{{asset('')}}">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
{{--                Data Tables--}}
{{--                <small>advanced tables</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content" style="padding: 100px">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Update Information</h3>
                        </div>
                        <div class="box-header">
                            <h3 class="box-title"></h3>

                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Enter email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="Enter phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->address}}" placeholder="Enter address" name="address">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
