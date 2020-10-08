@extends('layouts.master_admin')

@section('title')
    <title>Add Menu </title>
@endsection

@section('js')
    @parent
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
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.menu') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>

                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <label for="mu_name">Name:</label>
                                <input type="text" class="form-control" name="mu_name" value="{{old('mu_name')}}"/>
                                @if($errors->has('mu_name'))
                                    <span class="error-text">
                  {{$errors->first('mu_name')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mu_slug">Slug:</label>
                                <input type="text" class="form-control" name="mu_slug"/>
                                @if($errors->has('mu_slug'))
                                    <span class="error-text">
                  {{$errors->first('mu_slug')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mu_description">Description:</label>
                                <input type="text" class="form-control" name="mu_description"/>
                                @if($errors->has('mu_description'))
                                    <span class="error-text">
                  {{$errors->first('mu_description')}}
                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
