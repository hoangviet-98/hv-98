@extends('layouts.master_admin')

@section('title')
    <title>Create Content</title>
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <div class="back-home">
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.article') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách
                </a></p>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            @csrf
                            <div class="form-group">
                                <label>Article :</label>
                                <input type="text" class="form-control" name="a_name" value="{{old('a_name')}}"
                                       placeholder="Please input a_name"
                                >
                                @if($errors->has('a_name'))
                                    <span class="error-text">
                                {{$errors->first('a_name')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <input type="text" class="form-control"
                                       name="a_description"
                                       value="{{old('a_description')}}"
                                       placeholder="Please input cont description"
                                >
                                @if($errors->has('a_description'))
                                    <span class="error-text">
                                {{$errors->first('a_description')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Content:</label>
                                <textarea name="a_content" class="form-control my-editor" rows="8"></textarea>

                                @if($errors->has('a_content'))
                                    <span class="error-text">
                                {{$errors->first('a_content')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Description Seo:</label>
                                <input type="text" class="form-control"
                                       name="a_description_seo"
                                       value="{{old('a_description_seo')}}"
                                       placeholder="Please input a_description_seo"
                                >
                                @if($errors->has('a_description_seo'))
                                    <span class="error-text">
                                {{$errors->first('a_description_seo')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Title Seo:</label>
                                <input type="text" class="form-control"
                                       name="a_title_seo"
                                       value="{{old('a_title_seo')}}"
                                       placeholder="Please input a_title_seo"
                                >
                                @if($errors->has('a_title_seo'))
                                    <span class="error-text">
                                {{$errors->first('a_title_seo')}}
                                    </span>
                                @endif
                                <div class="form-group">
                                    <img
                                        src="https://www.globe2.net/wp-content/plugins/accelerated-mobile-pages/images/SD-default-image.png"
                                        id="out_img" style="height: 150px; width: auto; margin-top: 30px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" id="input_img" class="form-control-file" name="a_avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-left: 45%">
                        <button type="submit" class="btn btn-primary">Add Content</button>
                    </div>
                </div>
            </section>
        </form>
    </div>


@endsection

