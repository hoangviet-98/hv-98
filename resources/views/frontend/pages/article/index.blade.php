@extends('layouts.master_frontend')

@section('title')
    <title>Schedule</title>
@endsection

@section('js')
    @parent

@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="customer/css/productindex.css">
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Article List</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @if (isset($articles))
                        @foreach ($articles as $article)
                            <div class="article" style="padding-bottom: 10px ; margin-bottom: 10px ; border-bottom: 1px solid #f2f2f2; display: flex">
                                <div class="article_avatar">
                                    <a href="{{route('get.detail.article', [$article->a_slug, $article->id])}}">
                                        <img style="width: 200px; height: 120px"
                                             src="{{ asset(pare_url_file($article->a_avatar)) }}"  alt=""/>
                                    </a>
                                </div>
                                <div class="article_info" style="width: 80%; margin-left: 20px">
                                    <h1 style="font-size: 14px; "><a style="font-size: 20px" href="">{{$article->a_name}}</a></h1>
                                    <p style="font-size: 13px">{{$article->a_description}}</p>
                                    <p>admin <span style="color: red; font-size: 10px">{{$article->created_at}}</span></p>
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>
                <div class="col-sm-4">
                    <div class="title"></div>
                </div>

            </div>
        </div>
    </div>
@endsection
