@extends('layouts.master_admin')

@section('title')
    <title>Edit Content</title>
@endsection

@section('js')
    @parent
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="admincontrol/js/create_content/js/create.js"></script>
@endsection

@section('css')
    @parent
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
{{--            @include('admin.partial.content-header', ['name' => 'Content', ' ' ,'key' => 'Edit'])--}}
        </section>
        <div class="back-home">
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.article') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-3">Update a Article</h1>
                    <form method="post" action="" enctype="multipart/form-data">

                    @csrf
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="text" class="form-control" name="a_name"
                                   placeholder="Please input a_name"
                                   value="{{$hv_article->a_name}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" class="form-control"
                                   name="a_description" value="{{$hv_article->a_description}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Content:</label>
                            <textarea name="a_content" rows="8" class="form-control my-editor" >{{$hv_article->a_content}}</textarea>

                        </div>
                        <div class="form-group">
                            <label>Des seo:</label>
                            <input type="text" class="form-control"
                                   name="a_description_seo" value="{{$hv_article->a_description_seo}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Title seo:</label>
                            <input type="text" class="form-control"
                                   name="a_title_seo" value="{{$hv_article->a_title_seo}}"
                            >
                        </div>

                        <div class="form-group">
                            <img
                                src="https://www.globe2.net/wp-content/plugins/accelerated-mobile-pages/images/SD-default-image.png"
                                id="out_img" style="height: 150px; width: auto; margin-top: 30px">
                        </div>
                        <div class="col-md-11" style="margin: auto" ;>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" id="input_img" class="form-control-file"
                                       name="a_avatar" value="{{$hv_article->a_avatar}}"
                                >
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection
