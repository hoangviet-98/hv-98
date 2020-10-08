@extends('layouts.master_admin')

@section('title')
    <title>List User</title>
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
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h1 class="display-3">Update a category</h1>
                    <form method="post" action="{{ route('admin.get.update.category', $hv_categories->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <label for="cat_name">Name:</label>
                            <input type="text" class="form-control" name="cat_name"
                                   value="{{ $hv_categories->cat_name }}"/>
                        </div>

                        <div class="form-group">
                            <label for="cat_description">Slug:</label>
                            <input type="text" class="form-control" name="cat_description"
                                   value="{{ $hv_categories->cat_description}}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

