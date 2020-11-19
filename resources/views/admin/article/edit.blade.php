@extends('layouts.master_admin')

@section('title')
    <title>Edit Content</title>
@endsection

@section('js')
    @parent
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="admincontrol/js/file_manage/file.js"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection

@section('css')
    @parent
@endsection

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="back-home">
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.article') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Back</a></p>
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
                            <label>Category</label>
                            <select class="form-control" name="a_menu_id">
                                <option value="">---Please choose Menu---</option>
                                @foreach ($hv_menu as $menu_id)
                                    <option value="{{ $menu_id->id}}">{{$menu_id->mu_name}} </option>
                                @endforeach
                            </select>
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
