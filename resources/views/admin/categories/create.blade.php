@extends('layouts.master_admin')

@section('title')
    <title>Add Category</title>
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
                  href="{{ route('admin.get.list.category') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Back</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>

                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <label for="cat_name">Name:</label>
                                <input type="text" class="form-control" name="cat_name" value="{{old('cat_name')}}"/>
                                @if($errors->has('cat_name'))
                                    <span class="error-text">
                  {{$errors->first('cat_name')}}
                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="cat_slug">Name:</label>
                                <input type="text" class="form-control" name="cat_slug" value="{{old('cat_slug')}}"/>
                                @if($errors->has('cat_slug'))
                                    <span class="error-text">
                  {{$errors->first('cat_slug')}}
                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="cat_description">Description:</label>
                                <input type="text" class="form-control" name="cat_description"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
