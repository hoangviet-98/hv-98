@extends('layouts.master_admin')

@section('title')
    <title>List Content</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>

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
            <a style="margin: 19px;"
               href="{{ route('admin.get.create.article')}}"> <i
                    class="fa fa-plus-circle"> </i> New Article
            </a>
        </div>
        <form class="form-inline" action="" style="margin: 20px; margin-left: 50px">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search Name Article ..." name="name"
                       value="{{ \Request::get('name') }}">
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form>
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Article Title</th>
                                    <th>Description</th>
                                    <th>Content</th>
                                    <th>Title seo</th>
                                    <th>Avatar</th>
                                    <th colspan=3>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hv_article as $article)
                                    <tr>
                                        <th>{{$article->id}}</th>
                                        <th>{{$article->a_name}}</th>
                                        <td>{{$article->a_description}}</td>
                                        <td>{{$article->a_content}}</td>
                                        <td>{{$article->a_title_seo}}</td>
                                        <td>
                                            <img src="{{pare_url_file($article->a_avatar)}}" alt="" class="responsive">
                                        </td>

                                        <td>
                                            <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px"
                                               href="{{ route('admin.get.edit.article',$article->id)}}"> <i
                                                    class="fa fa-pencil"> </i></a>

                                            <a href=""
                                               style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                                               data-url="{{ route('admin.get.delete.article', $article->id)}}"
                                               class="fa fa-trash-o action_delete"> </a>
                                            @csrf
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {!! $hv_article->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection


